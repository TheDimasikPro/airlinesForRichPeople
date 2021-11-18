<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function sendReview(Request $request)
    {
        $rules = [
            "name_user" => [
                "required",
                "string"
            ],
            "text_review" => [
                "required",
                "string"
            ],
        ];

        $message = [
            "name_user.required" => "Поле name_user обязательно к заполнению",
            "text_review.required" => "Поле text_review обязательно к заполнению"
        ];
        $validationFileds = Validator::make($request->only('name_user','text_review'),$rules,$message);
        if ($validationFileds->fails()) {
            $response = [
                "status" => false,
                "message" => "Проверьте поля на пустоту"
            ];
            return json_encode($response);
        }

        $new_review_id = Review::insertGetId([
            "name_user" => $request["name_user"],
            "text_review" => $request["text_review"],
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        if ($new_review_id > 0) {
            $response = [
                "status" => true,
                "message" => "Ваш отзыв записан. Большое спасибо"
            ];
            return json_encode($response);
        }
    }

    public function moreReview(Request $request)
    {
        $last_review_id = $request["last_review_id"];
        if ($last_review_id > 0) {
            $convert = DB::raw("DATE_FORMAT(created_at, '%d.%m.%Y') as create_date_review");
            $new_review = Review::select('id','name_user','text_review',$convert)->whereBetween('id',[$last_review_id, $last_review_id + 8])->get();
            $response = [
                "status" => true,
                "new_reviews" => $new_review
            ];
            return json_encode($response);
        }
    }
}

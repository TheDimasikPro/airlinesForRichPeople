<aside class="aside_bar_user">
    <div class="aside_bar_user__mobile_short_info non_view">
        <img src="/assets/images/icons/no_user_photo.png" class="aside_bar_user__mobile_short_info__img" alt="user">
        <p class="aside_bar_user__mobile_short_info__username">
            {{ $auth_user["full_name"] }}
            <a href="" class="exit_profile_link upper">выйти</a> 
                <!-- /.aside_user__list__item__short_name__exit_block__link_exit -->
        </p>
        <!-- /.aside_bar_user__mobile_short_info__username -->
    </div>
    <!-- /.aside_bar_user__mobile_short_info -->
    <ul class="aside_user__list">
        <li class="aside_user__list__item df_jcspb_aic">
            <div class="aside_user__list__item__img_block">
                <img src="/assets/images/icons/no_user_photo.png" alt="user" class="aside_user__list__item__img_block__img">
            </div>
            <!-- /.aside_user__list__item__img_block -->
            <div class="aside_user__list__item__short_name__exit_block">
                <p class="aside_user__list__item__short_name__exit_block__text upper">{{ $auth_user["full_name"] }}</p>
                <a href="{{ route('logout') }}" class="exit_profile_link upper">выйти</a> 
                <!-- /.aside_user__list__item__short_name__exit_block__link_exit -->
            </div>
            <!-- /.aside_user__list__item__short_name_exit_block -->
        </li>
        <li class="aside_user__list__item aside_user__list__item_active">
            <button class="aside_user__list__item__btn upper" id="profile_btn_control_panel" aria-label="profile_btn_control_panel">Панель управления</button> 
            <!-- /.aside_user__list__item__btn -->
        </li>
        @if ($auth_user["id_role"] == 2)
        <li class="aside_user__list__item">
            <button class="aside_user__list__item__btn upper" id="profile_btn_operator_panel" aria-label="profile_btn_control_panel">Оператор</button> 
            <!-- /.aside_user__list__item__btn -->
        </li>
        @endif
        <li class="aside_user__list__item">
            <button class="aside_user__list__item__btn upper" id="profile_btn_personal_data" aria-label="profile_btn_personal_data">Личные данные</button> 
            <!-- /.aside_user__list__item__btn -->
        </li>
        <li class="aside_user__list__item">
            <button class="aside_user__list__item__btn upper" id="profile_btn_my_travel" aria-label="profile_btn_my_travel">Мои поездки</button> 
            <!-- /.aside_user__list__item__btn -->
        </li>
        <li class="aside_user__list__item">
            <button class="aside_user__list__item__btn upper" id="profile_btn_update_password" aria-label="profile_btn_update_password">Обновить пароль</button> 
            <!-- /.aside_user__list__item__btn -->
        </li>
        {{-- <li class="aside_user__list__item">
            <button class="aside_user__list__item__btn aside_user__list__item_non_click upper" id="profile_btn_full_history_travel" aria-label="profile_btn_full_history_travel">Полная история поездок</button> 
            <!-- /.aside_user__list__item__btn -->
        </li> --}}
    </ul>
</aside>
<!-- /.aside_bar_user -->
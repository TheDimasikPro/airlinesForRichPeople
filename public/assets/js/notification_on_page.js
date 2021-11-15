$(document).ready(function(){

    idleTime = 0;
 
    //Increment the idle time counter every second.
    var time = 60000 * 5;
    setInterval(timerIncrement, time);
    
    function timerIncrement()
    {
      idleTime++;
      if (idleTime > 2)
      {
        idleTime = 0;
        doPreload();
      }
    }
    
    //Zero the idle timer on mouse movement.
    $(this).mousemove(function(e){
       idleTime = 0;
    });
    $(this).click(function(e){
        idleTime = 0;
     });
    
    function doPreload()
    {
        alert();
      //Preload images, etc.
    }
    
 })
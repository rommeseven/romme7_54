<?php

/*
|--------------------------------------------------------------------------
| TEST Routes - TODO: Clean test routes
|--------------------------------------------------------------------------

 */

use App\Mail\TestEmail;
//use App\Notifications\TestPageVisited;

/*Route::get("/atest", function ()
{
    $arr = config("building_blocks");
    $arr = array_pluck($arr, "validation", "key");

    dd($arr);
});*/
Route::get("/mailtest", function ()
{
      // dump(Mail::to("laszlotakacs.95+emailtest@gmail.com")->send(new TestEmail));
      // dd('Mail Send Successfully?');
   // Mail::to("laszlotakacs.95@gmail.com")->send(new TestEmail);
    // auth()->user()->notify(new TestPageVisited);
    // 
    // 
     Mail::raw('Was sagst du zu diesem email? richtig angezeigt? kein spam, oder?', function ($message){
            $message->to('chrisiilps@gmail.com');
 });
return "check logs";

});
/*
Route::get("/qtest", function ()
{
    // Mail::to("laszlotakacs.95+emailtest@gmail.com")->send(new TestEmail);
    auth()->user()->notify(new TestPageVisited);

    return "Wait for it...";
});*/

Route::get("/quicktest", function ()
{

    return "Wait for it...";
});

<?php

/*
|--------------------------------------------------------------------------
| LOCAL Routes
|--------------------------------------------------------------------------
 */

if (App::environment('local'))
{
    Route::get('storage/{filename}', function ($filename)
    {
        $path = storage_path('app/'.$filename);

        if (!File::exists($path))
        {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    });
}
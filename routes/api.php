<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

Route::get('service/image/{name?}', function($name = 'shadow.jpg'){

    $photo = Storage::disk('local')->get("$name");
    
    return new Response($photo, 200);
});
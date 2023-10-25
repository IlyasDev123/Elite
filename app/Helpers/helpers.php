<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('storeFiles')) {
    function storeFiles($folder, $file)
    {
        return Storage::disk(env('STORAGE_TYPE'))->put($folder, $file, 'public');
    }
}

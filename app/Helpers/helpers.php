<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('storeFiles')) {
    function storeFiles($folder, $file)
    {
        return Storage::disk(env('STORAGE_TYPE'))->put($folder, $file, 'public');
    }
}

if (!function_exists('successResponse')) {
    function successResponse($message, $data = null, $code = 200)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}

if (!function_exists('errorResponse')) {
    function errorResponse($message, $data = null, $code = 400)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}

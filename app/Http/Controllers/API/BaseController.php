<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($data, $message = "", $code = "200") {
        $response = [
            "message" => $message,
            "data" => $data
        ];

        return response()->json($response, $code);
    }

    public function sendError($error, $code = "500") {
        $response = [
            'message' => $error
        ];

        return response()->json($response, $code);
    }
}

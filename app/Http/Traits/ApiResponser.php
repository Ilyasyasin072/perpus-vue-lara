<?php

namespace App\Http\Traits;

trait ApiResponser {

    public function responseSuccess($message, $result, $code) {

        $data = [
            'message' => $message,
            'result' => $result,
            'code' => $code
        ];

        return response()->json($data, 200);
    }

    public function responseError($message, $code) {
        $error = [
            'error' => $message,
            'code' => $code,
        ];

        return response()->json($error, 500);
    }
}

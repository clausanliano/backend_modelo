<?php

namespace App\Traits;

use Exception;

trait ApiResponseTrait
{
    public function success($mensagem, $data)
    {
        return response()->json([
            'success' => true,
            'message' => $mensagem,
            'data'  =>  $data,
        ], 200);
    }

    public function error(Exception $excecao, $data, $statusCode = 500)
    {
        return response()->json([
            'success' => false,
            'message' => $excecao->getMessage(),
            'error' => $excecao,
            'data'  =>  $data,
        ], $statusCode);
    }
}
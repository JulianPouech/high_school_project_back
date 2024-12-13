<?php

namespace App\Trait;

trait JsonResponseTrait
{
    /*
    * define default json response
    */
    public function jsonResponseWithStatus(string $status = "ok",int $responseCode = 200): array {
        return [
            "status" => $status,
            "response"=> $responseCode,
        ];
    }
}

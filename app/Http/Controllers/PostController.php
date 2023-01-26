<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function getTransactionsByRib(Request $request)
    {
        $firstDate = Carbon::parse($request['minDate']);
        $secondDate = Carbon::parse($request['maxDate']);

        if ($secondDate->isAfter($firstDate)) {
            if (is_numeric($request["rib"])) {
                $response = Http::get("http://localhost:3000/api/operations/".$request["rib"]);

                return Response([
                    "status" => 200,
                    "data" => $response->json()
                ]);
            } else {
                return Response([
                    "status" => 403,
                    "error" => ["password"=> "RIB Incorrect"]
                ]);
            }
        } else {
            return Response([
                "status" => 403,
                "error" => ["password"=> "Il est impossible de mettre une date inférieure à la première ({$request['minDate']})"]
            ]);
        }
    }
}

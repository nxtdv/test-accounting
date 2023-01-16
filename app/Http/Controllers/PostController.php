<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function getTransactionsByRib($rib)
    {
        $result = Http::get("http://localhost:3000/api/operations/".$rib);
        $api_data = $result -> json();

        return $api_data;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function getTransactionsByRib($rib)
    {
        $response = Http::get("http://localhost:3000/api/operations/".$rib);
        return $response->json();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function create(): JsonResponse
    {
        return response()->json(["status" => "ok"]);
    }

    public function index(): JsonResponse {
        return response()->json(Product::all());
    }

    public function upload(Request $request)
    {
        $validate = $request->validate([
            'name' => ['string','max:255'],
            'price' => ['integer'],
            'description' => ['string','max:526']
        ]);
        return response()->json($validate);
    }

}

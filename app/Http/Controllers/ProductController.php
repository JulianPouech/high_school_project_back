<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Trait\JsonResponseTrait;
use Illuminate\Http\JsonResponse;


class ProductController extends Controller
{
    use JsonResponseTrait;

    public function __construct() {
    }

    public function index(): JsonResponse {
        $products = Product::all();

        $jsonResponse = $this->jsonResponseWithStatus();
        $jsonResponse["products"] = $products;

        return response()->json($jsonResponse);
    }

    public function store(ProductRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $product = new Product();
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->description = $validated['description'] ?? null;
        $product->save();

        $jsonResponse = $this->jsonResponseWithStatus();

        return response()->json($jsonResponse);
    }

    public function show(string $id): JsonResponse {
        $product = Product::find($id);
        $jsonResponse = $this->jsonResponseWithStatus();
        $jsonResponse['product'] = $product;

        return response()->json($jsonResponse);
    }

    public function destroy(string $id) {
        /** @var Product */
        $product = Product::find($id);

        if(!$product instanceof Product){
            return $this->jsonResponseWithStatus("not found",404);
        }

        $product->delete();

        return $this->jsonResponseWithStatus();

    }

    public function update(ProductRequest $request,string $id): JsonResponse
    {
        $product = Product::find($id);
        $validated = $request->validated();

        $product->update($validated);
        $product->save();

        return $this->jsonResponseWithStatus();
    }

}

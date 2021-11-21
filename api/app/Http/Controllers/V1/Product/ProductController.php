<?php

namespace App\Http\Controllers\V1\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Repositories\ProductRepository;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\Product\ProductResource;

class ProductController extends ApiController
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->all();

        $response = [
            'products'  => ProductResource::collection($products)
        ];

        return $this->successResponse($response);
    }


    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $product = $this->productRepository->create($data);
        
        $response = [
            'product' => new ProductResource($product)
        ];

        return $this->successResponse($response);
    }

    public function show(Product $product)
    {
        $response = [
            'product'  => new ProductResource($product)
        ];

        return $this->successResponse($response);
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        $isUpdate = $this->productRepository->update($data, $product);
        
        if($isUpdate)
        {
            $response = [
                'product' => $product
            ];
    
            return $this->successResponse($response);
        }
        
        return $this->errorResponse('Not Update Product', 400);
    }

    public function destroy(Product $product)
    {
        $isDestroyProduct = $this->productRepository->delete($product);

        if($isDestroyProduct)
        {
            return $this->successResponse('Delete success');
        };

        return $this->errorResponse('Not Delete Product', 400);
    }
}

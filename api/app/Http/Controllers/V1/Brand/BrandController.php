<?php

namespace App\Http\Controllers\V1\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;
use App\Repositories\BrandRepository;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brands;
use Illuminate\Support\Str;
use App\Http\Resources\Brand\BrandResource;

class BrandController extends ApiController
{
    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    
    public function index()
    {
        $brands = $this->brandRepository->all();

        $response = [
            'brands' => BrandResource::collection($brands)
        ];

        return $this->successResponse($response);
    }
    
    public function store(BrandRequest $request)
    {
        $data = $request->validated();

        $brand = $this->brandRepository->create($data);

        $response = [
            'brand' => new BrandResource($brand)
        ];

        return $this->successResponse($response);
    }

    public function show(Brand $brand)
    {
        $response = [
            'brand' => new BrandResource($brand)
        ];

        return $this->successResponse($response);
    }

    public function update(BrandUpdateRequest $request, Brands $brand)
    {
        $data = $request->validated();

        $isUpdateBrand = $this->brandRepository->update($data, $brand->id);

        if($isUpdateBrand)
        {
            $response = [
                'brand' => $this->brandRepository->find($brand->id)
            ];
    
            return $this->successResponse($response);
        }

        return $this->errorResponse('Not Update Brand', 400);
    }

    public function destroy(Brands $brand)
    {
        $isDestroyBrand = $this->brandRepository->delete($brand);

        if($isDestroyBrand)
        {
            return $this->successResponse('Delete success');
        }

        return $this->errorResponse('Not Delete Product', 400);
    }
}

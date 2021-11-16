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
            'brands' => $brands
        ];

        return $this->successResponse($response);
    }
    
    public function store(BrandRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);

        $brand = $this->brandRepository->create($data);

        $response = [
            'brand' => $brand
        ];

        return $this->successResponse($response);
    }

    public function show($id)
    {
        $brand = $this->brandRepository->find($id);

        if(empty($brand)) {
            return $this->errorResponse('Not find', 404);
        }

        $response = [
            'brand' => $brand
        ];

        return $this->successResponse($response);
    }

    public function update(BrandUpdateRequest $request, Brands $brand)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);

        $this->brandRepository->update($data, $brand->id);

        $response = [
            'brand' => $this->brandRepository->find($brand->id)
        ];

        return $this->successResponse($response);
    }

    public function destroy($id)
    {
        $this->brandRepository->delete($id);

        return $this->successResponse();
    }
}

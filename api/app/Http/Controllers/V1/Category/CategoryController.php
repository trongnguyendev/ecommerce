<?php

namespace App\Http\Controllers\V1\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Categories;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use Illuminate\Support\Str;
use App\Http\Resources\Category\Category as CategoryCollection;
use App\Http\Resources\Category\CategoryResource;

class CategoryController extends ApiController
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->all();

        $response = [
            'categories'    => CategoryResource::collection($categories)
        ];

        return $this->successResponse($response);
    }
    
    public function store(CategoryStoreRequest $request)
    {
        $data = $request->validated();

        $category = $this->categoryRepository->create($data);

        $response = [
            'category' =>  new CategoryResource($category)
        ];

        return $this->successResponse($response);
    }

    public function show(Categories $category)
    {
        $response = [
            'category'  => new CategoryResource($category)
        ];

        return $this->successResponse($response);
    }

    public function update(CategoryUpdateRequest $request, Categories $category)
    {
        $data = $request->validated();

        $isUpdateCategory = $this->categoryRepository->update($data, $category);
        
        if($isUpdateCategory)
        {
            $response = [
                'category'  => new CategoryResource($category)
            ];
    
            return $this->successResponse($response);
        }
        
        return $this->errorResponse('Not Update Product', 400);
    }

    public function destroy(Categories $category)
    {
        $isDestroyCategory = $this->categoryRepository->delete($category);

        if($isDestroyCategory)
        {
            return $this->successResponse('Delete success');
        }

        return $this->errorResponse('Not Delete Category', 400);
    }
}

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
            'categories'    => $categories
        ];

        return $this->successResponse($response);
    }
    
    public function store(CategoryStoreRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);

        $category = $this->categoryRepository->create($data);

        $response = [
            'category' => $category
        ];

        return $this->successResponse($response);
    }

    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        if(empty($category))
        {
            return $this->errorResponse('Not find', 404);
        }

        $response = [
            'category'  => $category
        ];

        return $this->successResponse($response);
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);

        $category = $this->categoryRepository->update($data, $id);
        
        $response = [
            'category'  => $this->categoryRepository->find($id)
        ];

        return $this->successResponse($response);

    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        if(empty($category))
        {
            return $this->errorResponse('Not find', 404);
        }

        $this->categoryRepository->delete($id);

        return $this->successResponse('Delete success');
    }
}

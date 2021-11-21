<?php

namespace App\Http\Controllers\Example;

use Illuminate\Http\Request;
use App\Repositories\ExampleRepository;
use App\Http\Controllers\ApiController;

class ExampleController extends ApiController
{
    protected $exampleRepository;

    public function __connstruct(ExampleRepository $exampleRepository)
    {
        $this->exampleRepository = $exampleRepository;
    }
    
    public function index()
    {
        $example = $this->exampleRepository->all();

        $message = $this->response_message('category_not_of_product');

        return $this->successResponse($example, $message);
    }

    public function destroy(Example $example)
    {
        if (!$this->exampleRepository->find($example->id)) {
            
            $message = $this->response_message('category_not_of_product');

            $code = $this->response_code('NOT_FOUND');

            return $this->errorResponse($message, $code);
        }

        $this->exampleRepository->delete($example->id);

        $data = $this->exampleRepository->all();

        return $this->successResponse($data);
    }

    public function test()
    {
        $message = $this->response_message;
        
        echo $message['category_not_of_product'];
    }
}

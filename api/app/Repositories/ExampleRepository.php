<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

Class ExampleRepository extends Repository
{
    function model()
    {
        return 'App\Model\Example...';
    }

    public function findActive($id)
    {
        return $this->model->where('status', '1')->findOrFail($id);
    }

    public function getRecentExample()
    {
        return $this->model->OrderBy('created_at', 'desc')->where('active', '1')->limit(6)->get();
    }


}
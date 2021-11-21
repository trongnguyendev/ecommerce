<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

Class ProductRepository extends Repository
{
    function model()
    {
        return 'App\Models\Product';
    } 
}
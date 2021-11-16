<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

Class BrandRepository extends Repository
{
    function model()
    {
        return 'App\Models\Brands';
    }
}
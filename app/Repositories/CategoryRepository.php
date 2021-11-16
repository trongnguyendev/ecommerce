<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

Class CategoryRepository extends Repository
{
    function model()
    {
        return 'App\Models\Categories';
    }
}
<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

Class AuthRepository extends Repository
{
    function model()
    {
        return 'App\Models\User';
    }
}
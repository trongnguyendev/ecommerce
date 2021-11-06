<?php

namespace App\Repositories\Eloquent;

use App\Repositores\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->makeModel();
    }

    abstract function model();

    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model->newQuery();
    }

    public function all($columns = array('*'))
    {
        return $this->model->orderBy('created_at','desc')->get($columns);
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->orderBy('created_at','desc')->paginate($perPage, $columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id, $attribute = "id")
    {
        return $this->model->where($attribute, '=', $id)->first()->update($data);
    }

    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    public function findOrFail($id, $columns = array('*'))
    {
        return $this->model->findOrFail($id, $columns);
    }

    public function findBy($attribute, $value, $columns = array('*'))
    {
        // can custom where with where has, where or, where like
        // ...
        //
        return $this->model->where($attribute, '=', $value)->first($columns);
    }


}
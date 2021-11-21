<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        $model = app()->make($this->model());

        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model->newQuery();
    }

    public function all($columns = array('*'))
    {
        $query = $this->model->orderBy('created_at','asc')->where('status', true);
        
        return $query->get($columns);        
    }

    public function allWith($with = '', $columns = array('*'))
    {
        if(!empty($with))
        {
            return $this->model->orderBy('created_at','asc')->where('status', true)->with($with)->get($columns);
        }
        return false;
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->orderBy('created_at','desc')->paginate($perPage, $columns);
    }

    public function create(array $data)
    {
        if(empty($data)) {
            return false;
        }

        if(!empty($data['title']) && empty($data['slug']))
        {
            $data['slug'] = Str::slug($data['title']);
        }

        return $this->model->create($data);
    }

    public function update(array $data, $_model, $attribute = "id")
    {
        if(empty($data))
        {
            return false;
        }

        if(!empty($data['title']) && empty($data['slug']))
        {
            $data['slug'] = Str::slug($data['title']);
        }

        if(gettype($_model) == 'object')
        {
            return $_model->update($data);
        }
        
        
        return $this->model->where($attribute, '=', $_model)->first()->update($data);
    }

    public function delete($_model)
    {
        return $_model->delete();
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

    public function active()
    {
        return $this->model->where('status', true)->get();
    }

}
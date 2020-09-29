<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductRepository
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;

    }

    public function getAll()
    {

        $result = $this->model->select()->orderBy('id', 'DESC');

        return $result->get();
    }



    public function get($id = '')
    {

        $result = $this->model->find($id);

        return $result;
    }



}

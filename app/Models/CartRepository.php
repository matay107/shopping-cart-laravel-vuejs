<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CartRepository
{
    protected $model;

    public function __construct(Cart $model)
    {
        $this->model = $model;

    }

    public function modify(Request $request)
    {
        $this->model->name = $request->name;
        $this->model->product_id = $request->id;
        $this->model->image = $request->image;
        $this->model->color = $request->color;
        $this->model->size = $request->size;
        $this->model->qty = $request->qty;
        $this->model->save();

        if ($this->model->id) {
            return $this->model->id;
        } else {
            return false;
        }
    }

    public function getAll()
    {

        $result = $this->model->select('id', 'product_id', 'name', 'image', 'color', 'size', DB::raw('SUM(qty) AS qty'))->groupBy('product_id')->get();

        return $result;
    }

    public function sumCart()
    {
        $result = $this->model->sum('qty');
        return $result;
    }

}

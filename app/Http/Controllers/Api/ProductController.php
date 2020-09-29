<?php

namespace App\Http\Controllers\Api;


use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class ProductController extends Controller
{

    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        $result = $this->productRepo->getAll();

        if($result){
            return Helper::responseRequestSuccess($result);
        }else{
            return Helper::responseRequestError();
        }

    }

    public function get($id='')
    {
        $result = $this->productRepo->get($id);
        if($result){
            return Helper::responseRequestSuccess($result);
        }else{
            return Helper::responseRequestError();
        }

    }




}

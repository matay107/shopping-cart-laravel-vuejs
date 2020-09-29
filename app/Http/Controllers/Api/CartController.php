<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CartRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{

    protected $cartRepo;

    public function __construct(CartRepository $cartRepo)
    {
        $this->cartRepo = $cartRepo;
    }

    public function getAll()
    {
        $result = $this->cartRepo->getAll();

        if($result){
            return Helper::responseRequestSuccess($result);
        }else{
            return Helper::responseRequestError();
        }

    }

    public function add(Request $request)
    {
        $result = $this->cartRepo->modify($request);

        if($result){
            return Helper::responseRequestSuccess($result);
        }else{
            return Helper::responseRequestError();
        }
    }

    public function sumCart()
    {
        $result = $this->cartRepo->sumCart();
        if($result){
            return Helper::responseRequestSuccess($result);
        }else{
            return Helper::responseRequestError();
        }
    }
}

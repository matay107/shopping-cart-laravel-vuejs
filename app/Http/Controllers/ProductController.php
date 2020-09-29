<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function book()
    {
        return view('book');
    }

    public function viewProduct($id='')
    {
        $data['id'] = $id;
        return view('view',$data);
    }
}

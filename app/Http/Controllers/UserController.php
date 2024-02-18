<?php

namespace App\Http\Controllers;

use App\Models\ProductLine;
use App\Models\Product;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {

        $products = Product::with('category')->get();
        foreach ($products as $product) {

            echo $product->category->productLine . '<br>';
        }
    }
}

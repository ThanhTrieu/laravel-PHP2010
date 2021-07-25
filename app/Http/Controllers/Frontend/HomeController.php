<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController as Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\View;
class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $products = Product::paginate(2);
        return view('frontend.home.index',[
            'products' => $products
        ]);
    }
}

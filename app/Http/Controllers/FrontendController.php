<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function __construct()
    {
        $categories = $this->getDataCategory();
        // share data categories cho moi view dung duoc
        View::share('categories', $categories);
    }

    protected function getDataCategory()
    {
        return Category::all();
    }
}

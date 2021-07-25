<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController as Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    public function index(Request $request)
    {
        // lay toan to thong tin san pham trong gio hang
        $cart = \Cart::content();

        return view('frontend.cart.index',[
            'cart' => $cart
        ]);
    }

    public function addCart(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        //$info = Product::findOrFail($id);
        $info = Product::find($id);
        if($info !== null) {
            // add product to cart
            \Cart::add([
                'id' => $id,
                'name' => $info->name,
                'qty' => 1,
                'price' => $info->price,
                'weight' => 1,
                'options' => [
                    'image' => $info->image,
                    'description' => $info->description
                ]
            ]);
            // quay ve trang xem thong tin gio hang
            return redirect()->route('fr.cart');
        } else {
            return redirect()->route('fr.home')->withErrors('Can not add to cart');
        }
    }
}

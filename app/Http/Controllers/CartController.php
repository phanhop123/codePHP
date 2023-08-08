<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Models\Product;
class CartController extends Controller
{
    //
    public function getAddCart($id){
        $product = Product::find($id);
       
      //   Cart::add(['id' => $id,
      //   'name' => $product->prod_name,
      //   'price' => $product->prod_price,
      //   'quantity' => 1,
      //   'options' => ['img'=> $product->prod_img]]);
      //   return redirect('cart/show');
      $cartCollection = Cart::getContent();
      Cart::add(array(
         'id' => $id, // inique row ID
         'name' => $product->prod_name,
         'price' => $product->prod_price,
         'quantity' => 1,
         'attributes' => array('img'=> $product->prod_img)
        

        
     ));
     return redirect('cart/show');
        }


     public function getShowCart(){
        $cartCollection['items'] = Cart::getContent();
        return view('frontend.cart',$cartCollection);
     }
}

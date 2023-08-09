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
      Cart::add(array(
         'id' => $id, // inique row ID
         'name' => $product->prod_name,
         'price' => $product->prod_price,
         'quantity' => 1,
         'attributes'=>['img' => $product->prod_img]    
     ));
     return redirect('cart/show');

     
      }


   public function getShowCart(){
   $cartCollection['items'] = Cart::getcontent();
   return view('frontend.cart',$cartCollection);
      
   }
     
}

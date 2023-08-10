<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Models\Product;
use Mail;
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
    $cartCollection['total'] = Cart::getTotal();
    
   $cartCollection['items'] = Cart::getContent();
   return view('frontend.cart',$cartCollection);
      
   }


   public function getDeleteCart($id)
   

   {
    if($id=='all'){
        Cart::clear();
    }else{
        Cart::remove($id);
    }
    return back();
   }
     
   public function getUpdateCart(Request $request){
    Cart::update($request->rowId,$request->quantity);
   }
   public function postComplete(Request $request){
    $cartCollection['info'] = $request->all();
    $email = $request->email;
 
    $cartCollection['total'] = Cart::getTotal();
    $cartCollection['cart'] = Cart::getContent();
    Mail::send('frontend.email',$cartCollection , function($message) use ($email){
        $message->from('www.phop8542@gmail.com','phanhop');

        $message->to($email, $email);

        $message->cc('phanhop20033@gmail.com','phanhop123');

        $message->subject('xác nhận đơn mua hàng');
    });

    return redirect('complete');
   }

   public function getComplete(){
    return view ('frontend.complete');
   }
}

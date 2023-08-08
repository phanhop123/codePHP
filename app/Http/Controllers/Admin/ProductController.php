<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\Models\Product;
use App\Models\Models\Category;
use Illuminate\Support\Str;

use DB;


class ProductController extends Controller
{
   public function getProduct(){
      $data['productlist']= DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')->orderBy('prod_id','desc')->get();
    return view('product',$data);
   }

   public function getAddProduct(){
    $data['caselist'] = Category::all();
    return view('addproduct',$data);
   }

   public function postAddProduct(AddProductRequest $request){
    $filename = $request->img->getClientOriginalName();
    $product = new Product;
    $product->prod_name = $request->name;
    $product->prod_slug = $slug = Str::slug('Your String Here');
    $product->prod_img = $filename;
    $product->prod_accessories = $request->accessories;
    $product->prod_price = $request->price;
    $product->prod_warranty = $request->warranty;
    $product->prod_promotion = $request->promotion;
    $product->prod_condition = $request->condition;
    $product->prod_status = $request->status;
    $product->prod_description = $request->description;
    $product->prod_cate = $request->cate;
    $product->prod_featured = $request->featured;
    $product->save();
    $request->img->storeAs('public/storage/avatar',$filename);
    return back();
    



   }

   public function getEditProduct($id){
      $data['product'] = Product::find($id);
      $data['listcate'] = Category::all();
    return view('editproduct',$data);
   }

   public function postEditProduct(Request $request,$id)
{
    $product = Product::find($id);
    $arr['prod_name'] = $request->name;
    $arr['prod_slug'] = Str::slug($request->name);
    $arr['prod_accessories'] = $request->accessories;
    $arr['prod_warranty'] = $request->warranty;
    $arr['prod_promotion'] = $request->promotion;
    $arr['prod_condition'] = $request->condition;
    $arr['prod_status'] = $request->status;
    $arr['prod_description'] = $request->description;
    $arr['prod_cate'] = $request->cate;
    $arr['prod_featured'] = $request->featured;

    if ($request->hasFile('img')) {
        // Nếu người dùng chọn ảnh mới
        $img = $request->file('img')->getClientOriginalName();
        $arr['prod_img'] = $img;
        $request->file('img')->storeAs('public/storage/avatar', $img);
    } else {
        // Người dùng không chọn ảnh mới, giữ nguyên ảnh cũ
        $arr['prod_img'] = $product->prod_img;
    }

    $product->update($arr);

    return redirect('admin/product');
}

   public function getDeleteProduct($id){
    Product::destroy($id);
    return back();

   }
}

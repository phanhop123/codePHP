<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Product;
use App\Models\Models\Category;
use App\Models\Models\Commet;

class FrontendController extends Controller
{
    public function getHome(){
        $data['featured'] = Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
        $data['new'] = Product::orderBy('prod_id','desc')->take(8)->get();
        
        return view('frontend.home',$data);
    }

    public function getDetail($id){
        $data['item'] = Product::find($id);
        $data['commets'] = Commet::where('com_product',$id)->get();
        return view('frontend.details',$data);
    }

    public function getCategory($id){
        $data['cateName'] = Category::find($id);
        $data['items'] = Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(1);
        return view('frontend.category',$data);
    }

    public function postCommet(request $request,$id){
        $commet = new Commet;
        $commet->com_name = $request->name;
        $commet->com_email = $request->email;
        $commet->com_content = $request->content;
        $commet->com_product = $id;
        $commet->save();
        return back();
    }

    public function getSearch(Request $request){
        $result = $request->result;
        $data['keyword'] = $result;
        $result = str_replace('', '%', $result);
        $data['items'] = Product::where('prod_name','like','%'.$result.'%')->get();
        return view('frontend.search',$data);
       
    }
}

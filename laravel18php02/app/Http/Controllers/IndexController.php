<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\User;
use Hash;
use App\Products;
use App\type_products;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Myquery\Myquery;
use File;
use Cart;
use App\Customer;
use App\Bills;
use App\bill_detail;
use App\Banner;

class IndexController extends Controller
{
   public function getIndex(){
    	$datanew =  Products::orderBy('id','DESC')->paginate(4);
        $data    =  Products::orderBy('id','DESC')->paginate(8);
        $banner  =  Banner::orderByDesc('id')->get();
        $cate    =  Category::all();
    	return view('common.index.trangchu',compact('data','datanew','cate','banner'));
    }
    public function getCategory($category){

    	$category      =   Category::where('alias', $category)->first();    	
    	$type_products =   Products::where('id_category',$category->id)->distinct()->pluck('id_typeproducts')->toArray();    
    	$type 	       =   Type_Products::whereIn('id', $type_products)->get(); 
    	$cate          =   Products::where(
    	[
    		['id_category', '=', $category->id],
            ['status', '=', 1]
    		
    	])->orderByDesc('id')->paginate(9);
        return view('common.index.category',compact('cate','category','type'));
    }

    public function getProductByType($category, $type){
    	$category          = Category::where('alias', $category)->first();
    	$type_product      = Type_Products::where('alias', $type)->first();    	
    	$type_products     = Products::where('id_category', $category->id)->distinct()->pluck('id_typeproducts');    
    	$type 	           =	Type_Products::whereIn('id', $type_products)->get();
    	$cate              = Products::where(
    	[
    		['id_category', '=', $category->id],
    		['id_typeproducts', '=', $type_product->id],
            ['status','=', 1]
    	])->paginate(6);   	
        return view('common.index.category-type',compact('cate','category','type','type_product'));
    }
    public function getProduct($id){
    	$data  = Products::where('id', $id)->first();
        $match = Products::where(
            [
                ['id_typeproducts', $data->id_typeproducts],
                ['status','=', 1]
            ])->paginate(3);
        $type_product   = Products::where(
            [
                ['id_category','=', $data->id_category],
                ['status','=',1]
            ])->orderByDesc('id')->take(6)->get();
        $category       = Category::where('id', $data->id_category)->first();

        //dd($type_product);
    	return view('common.index.type-product-index',compact('data','match','type_product','category'));
    }

    //Shopping Cart
    public function getBuyProduct($id){
        $product_buy    = Products::where('id',$id)->first();
        Cart::add(array('id'=>$id, 'name'=>$product_buy->name, 'qty'=>1, 'price'=>$product_buy->unit_price,'options'=>array('color'=>$product_buy->color,'size'=>$product_buy->size,'promotion_price'=>$product_buy->promotion_price,'img'=>$product_buy->image)));
        $content        = Cart::content();
        return redirect()->back();
    }
    public function getShopping(){
       
        $content    = Cart::content()->toArray();
        $total      = Cart::subtotal();
        return view('common.index.shopping-cart',compact('content','total'));
    }
    public function getDeleteShopping($id){
        Cart::remove($id);
        return redirect()->back();

    }
    public function getEditShopping(Request $req,$id){
        $qty = $req->quantity;
        dd($qty);
        //Cart::update($id, $req->quantity);
        return redirect()->back();
    }
    public function getSearch(Request $req){
        $product = Products::where('name','like','%'.$req->key.'%')->orWhere('unit_price',$req->key)->orWhere('promotion_price',$req->key)->paginate(12);
        return view('common.index.search',compact('product'));
    }
    public function getCheckOut(){
        $content    = Cart::content()->toArray();
        $total      = Cart::subtotal();
        //dd($content);
        return view('common.index.checkout',compact('content','total'));
    }
    public function postOrder(Request $req){
        $content    = Cart::content()->toArray();
        $total      = Cart::subtotal();
        //dd($total);
        $this->validate($req,[
            'name'      =>   'required',
            'email'     =>  'required',
            'phone'     =>  'required',
            'address'   =>  'required'            
        ],
        [
            'name.required'     =>  'Bạn Chưa Nhập Tên',
            'email.required'    =>  'Bạn Chưa Nhập Email',
            'phone.required'    =>  'Bạn Chưa Nhập Số Điện Thoại',
            'address.required'  =>  'Bạn Chưa Nhập Địa Chỉ'
        ]);
        $customer           = new Customer();
        $customer->name     = $req->name;
        $customer->email    = $req->email;
        $customer->phone    = $req->phone;
        $customer->address  = $req->address;
        $customer->save();

        $bill               = new Bills();
        $bill->id_customer  =   $customer->id;
        $bill->date_order   =   date('Y-m-d');
        $bill->total        =   $total;
        $bill->save();

        foreach ($content as $items){
            $bill_detail                = new bill_detail();
            $bill_detail->id_bills      =  $bill->id;
            $bill_detail->id_products   =   $items['id'];
            $bill_detail->quanity       =  $items['qty'];
            if ($items['options']['promotion_price'] == 0){
            $bill_detail->unit_price    = $items['price'];
            }else{
            $bill_detail->unit_price    = $items['options']['promotion_price'];
            }
            $bill_detail->save();     
        }

        return redirect()->back()->with('success','Bạn Đã Đặt Hàng Thành Công');   
    }
    public function getProductIndex(){
        $product = Products::orderByDesc('id')->paginate(20);
        return view('common.index.product',compact('product'));
    }
}
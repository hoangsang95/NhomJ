<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cate;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\View;

class MyController extends Controller
{
    // Danh sách chuyên mục (menu)
   
   
    // Tìm kiếm với từ khóa
    public function search(Request $request) {
        $tukhoa = $request->get('tukhoa');
        $product = Product::where('Product_Name','like','%'.$tukhoa.'%')->orWhere('Product_Description','like',"%$tukhoa%")->paginate(3)->appends(['tukhoa' =>$tukhoa]);
      
        return view('layouts.search', ['product' => $product , 'tukhoa'=>$tukhoa]);
           
    }
    // Danh sách sản phẩm của chuyên mục
    public function product_list($id)
    {
        $cate = DB::table('cat')
                ->where('Cat_ID', $id)
                ->get()
                ->toArray();
        $product = DB::table('product')
                ->select('product.*','cat.*')
                ->join('cat','Product_Cat','=','cat.CAT_ID')
                ->where('Product_Cat', $id)
                ->paginate(3);
         $slide = DB::table('slide')->where('Slide_Cat','=',$id)
                ->get();
        // Tag/ Từ khóa cho chuyên mục
        $keywords = explode(',',$cate[0]->Cat_Keywords);
        return view('layouts.product_list',['cate'=>$cate, 'product'=>$product, 'keywords'=>$keywords, 'slide' => $slide]);
        
    }
    // Chi tiết sản phẩm
    public function detail($id)
    {
        // Lấy thông tin sản phẩm
        $product = DB::table('product')
                ->join('cat','Product_Cat','=','cat.CAT_ID')
                ->where('product.Product_ID',$id)
                ->select('product.*','cat.*')->get();
        // Danh sách sản phẩm cùng chuyên mục
        $relate_product = DB::table('Product')
                         ->where('Product_Cat', $product[0]->Product_Cat)
                         ->where('Product_ID','!=', $product[0]->Product_ID)
                          ->get();
        
        // Xử lý, lấy ra danh sách hình ảnh sản phẩm
        $product_image = $product[0]->Product_Image;
        $product_image = explode(',', $product_image);

        // Lấy danh sách kích thước sản phẩm
        $product_size = $product[0]->Product_Size;
        $product_size = explode(',', $product_size);
        
        // Cập nhật lượt xem
        $countView = $product[0]->Product_CountView+1;
        Product::where('Product_ID', $id)
                ->update(['Product_CountView'=> $countView]);
        // Lấy ngẫu nhiên sản phẩm
       $random = Product::orderBy(DB::raw('RAND()'))->take(5)->get();
        return view('layouts.product',[
            'product'=>$product[0],
            'product_image'=>$product_image,
            'product_size'=>$product_size,
            'relate_product'=> $relate_product
        ]);
    }
    
    public function product_compare($id)
    {
        return view('layouts.product_compare');
    }
    
     public function product_compare1()
    {
        return view('layouts.product_cart');
    }
    
    
    
}

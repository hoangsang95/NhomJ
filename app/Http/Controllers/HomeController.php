<?php

namespace App\Http\Controllers;

use DB;
use App\CatParent;
use App\Cate;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function index() {
        $slide = DB::table('slide')->where('Slide_Cat', '=', 0)
                ->get();
        $cateparent = Cate::where('Cate_Parent', 0);
        $cate1 = Cate::where('Cat_Parent', 8)->get();
        $cate2 = Cate::where('Cat_Parent', 9)->get();

        /* -------------------- Fashion ----------------------------- */
        
        $product_latest_fashion = DB::table('product')
                        ->join('cat', 'Product_Cat', '=', 'cat.CAT_ID')
                        ->where('cat.Cat_Parent', 8)
                        ->orderBy('Product_Datetime', 'DESC')->take(6)->get();

        $product_review_fashion = DB::table('product')
                        ->join('cat', 'Product_Cat', '=', 'cat.CAT_ID')
                        ->where('cat.Cat_Parent', 8)
                        ->orderBy('Product_CountView', 'DESC')->orderBy('Product_Datetime', 'DESC')->take(6)->get();

        $product_onsales_fashion = DB::table('product')
                        ->join('cat', 'Product_Cat', '=', 'cat.CAT_ID')
                        ->where('cat.Cat_Parent', 8)
                        ->where('Product_PriceMarket', '>', 0)->orderBy('Product_Datetime', 'DESC')->take(6)->get();
        /* -------------------- Sport ----------------------------- */
        $product_latest_sport = DB::table('product')
                        ->join('cat', 'Product_Cat', '=', 'cat.CAT_ID')
                        ->where('cat.Cat_Parent', 9)
                        ->orderBy('Product_Datetime', 'DESC')->take(6)->get();

        $product_review_sport = DB::table('product')
                        ->join('cat', 'Product_Cat', '=', 'cat.CAT_ID')
                        ->where('cat.Cat_Parent', 9)
                        ->orderBy('Product_CountView', 'DESC')->orderBy('Product_Datetime', 'DESC')->take(6)->get();

        $product_onsales_sport = DB::table('product')
                        ->join('cat', 'Product_Cat', '=', 'cat.CAT_ID')
                        ->where('cat.Cat_Parent', 9)
                        ->where('Product_PriceMarket', '>', 0)->orderBy('Product_Datetime', 'DESC')->take(6)->get();


        return view('layouts.index', ['cateparent' => $cateparent, 'cate1' => $cate1, 'cate2' => $cate2, 'slide' => $slide,
            'product_latest_fashion' => $product_latest_fashion, 'product_review_fashion' => $product_review_fashion, 'product_onsales_fashion' => $product_onsales_fashion,
            'product_latest_sport' => $product_latest_sport, 'product_review_sport' => $product_review_sport, 'product_onsales_sport' => $product_onsales_sport]);
    }

}

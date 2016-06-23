<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StoreController extends Controller
{
    /**
     * 
     * @return \Illuminate\Http\Response
     */
    public function home() {
        $promos = \App\Promo::with('Product')->orderBy('created_at', 'ASC')->paginate(4);
        return view('welcome', ['promos' => $promos]);
    }
    
    /**
     * 
     * @return \Illuminate\Http\Response
     */
    public function ShowLatest() {
        
    }
    
    /**
     * 
     * @return \Illuminate\Http\Response
     */
    public function ShowPromo() {
        
    }
    
    /**
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLatest() {
        
    }
    
    /**
     * Display Products With Details
     * 
     * @param $productId
     * @return \Illuminate\Http\Response
     */
    public function showProductDetails(int $productId) {
        
    }
    
    /**
     * Display Product List According To Brand
     * 
     * @param $vendorId 
     * @return \Illuminate\Http\Response
     */
    public function showProductByBrand(int $vendorId) {
        
    }
}

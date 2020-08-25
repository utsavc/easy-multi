<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetailerController extends Controller
{
    function transfer(){
        return view('retailer.retailerproducttransfer');
    
    }
                                
    function productreport(){
    return view('retailer.retailerproductreport');

}
function commission(){
    return view('retailer.retailercommission');

}
function stock(){
    return view('retailer.retailerstock');

}


}

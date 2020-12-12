<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductStocks;
use App\Dealer;
use App\DealerStock;
use Illuminate\Http\Request;

class ProductController extends Controller
{


	function createProductForm(){		
		$products=Product::all();
		return view('product.create',['products'=>$products]);
	}



	function createProduct(Request $request){

		$validated=$request->validate([
			'productname' => 'required|String|unique:products',
			'mrp' => 'required|integer',
			'dealerComission' => 'required|integer',
			'retailerComission' => 'required|integer',
			'customerComission' => 'required|integer',
		]);

		Product::create($validated);
		return back()->with('success','Product created successfully!');

	}



	function addProductStockForm(){

		$products=Product::all();
		return view('product.add',['products'=>$products]);

	}	


	function addProductStock(Request $request){
		$validated=$request->validate([
			'product_id' => 'required|integer|exists:products,id',
			'qty' => 'required|integer',
		]);


		ProductStocks::create($validated);
		return back()->with('success','Quantity added to stock successfully!');

	}



	function stockinReport($id, Request $request){
		$product=Product::findOrFail($id);
		return view('product.stock',['product'=>$product]);

	}
	

	function outStockReport($id, Request $request){
		/*$product=Product::findOrFail($id);
		return view('product.outstock',['product'=>$product]);*/

		
		$dealerStocks=DealerStock::where('product_id',$id)->get();

		//dd($dealerStocks);
		
		//$singleDataForProductName=DealerStock::where('product_id',$id)->limit(1)->get();

		$singleDataForProductName=Product::findOrFail($id);
		//dd($singleDataForProductName);
		return view('product.outstock',['dealerStocks'=>$dealerStocks,'singleDataForProductName'=>$singleDataForProductName]);

	}


	function dealerTransferForm(){
		$products=Product::all();
		$dealers=Dealer::orderBy('id','DESC')->get();
		$dealerStocks=DealerStock::orderBy('id','DESC')->get();
		return view('product.transfer',['dealers'=>$dealers,'products'=>$products,'dealerStocks'=>$dealerStocks]);
	}



	function dealerTransfer(Request $request){

		$validated=$request->validate([
			'product_id' => 'required|integer|exists:products,id',
			'qty' => 'required|integer',
			'dealer_id'=>'required|integer|exists:dealers,id',
		]);


		$productStock=ProductStocks::where('product_id',$request->product_id)->sum('qty');
		$dealerStock=DealerStock::where('product_id',$request->product_id)->sum('qty');
		$activeStock=$productStock-$dealerStock;

		if ($request->qty <= $activeStock) {
			DealerStock::create($validated);
			return back()->with('success','Product Transferred to Dealers stock successfully!');
		}else{			
			return back()->with('error','You are trying to enter maximum value than available stock');
		}

	}


	function stock(){

		$products=Product::all();
		return view('product.reportsearch',['products'=>$products]);
	}


	function stockReport(Request $request){
		$product_id=$request->product_id;
		$totalStock=ProductStocks::where('product_id',$product_id)->get();
		$dealerStock=DealerStock::where('product_id',$product_id)->get();


		return view('product.report',['totalStock'=>$totalStock,'dealerStock'=>$dealerStock,'product_id'=>$product_id]);

	}



}

<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductStocks;
use App\Dealer;
use App\DealerStock;
use App\RetailerStock;
use App\CustomerPurchase;
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

		$products=Product::where('status','active')->get();
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




	public function editProduct($id, Request $request){
		$product=Product::firstWhere('id', $id);
		return view('product.editproduct',['product'=>$product]);
	}



	public function updateProduct($id, Request $request){

		$product=Product::findOrFail($id);
		$validated=$request->validate([
			'productname' => 'required|String',
			'mrp' => 'required|integer',
			'dealerComission' => 'required|integer',
			'retailerComission' => 'required|integer',
			'customerComission' => 'required|integer',
		]);
		$product->update($validated);
		return redirect()->route('creaeteProductForm')->with('success','Updated successfully!');

	}



	function deleteProduct($id){
		$product=Product::findOrFail($id);
		$status=$product->status;
		if ($status=="active") {
			$product->status="inactive";

		}else{
			$product->status="active";

		}
		$product->save();
		return redirect()->route('creaeteProductForm')->with('success','Disabled successfully!');
	}


	public function editStock($id, Request $request){
		$productStocks=ProductStocks::firstWhere('id', $id);
		$products=Product::all();
		return view('product.editstock',['products'=>$products,'productStocks'=>$productStocks]);
	}



	public function updateStock($id, Request $request){

		$product=ProductStocks::findOrFail($id);
		$validated=$request->validate([
			'product_id' => 'required|String',
			'qty' => 'required|integer',
		]);


		$product->update($validated);
		return redirect()->route('stock')->with('success','Updated successfully!');

	}



	function deleteStock($id){
		$product=Product::findOrFail($id);
		$status=$product->status;
		if ($status=="active") {
			$product->status="inactive";

		}else{
			$product->status="active";

		}
		$product->save();
		return redirect()->route('creaeteProductForm')->with('success','Disabled successfully!');
	}


	function dealerStock(Request $request){
		$products=Product::all();
		return view('dealer.stockreport',['products'=>$products]);

	}


	function dealerstockReport(Request $request){
		$product_id=$request->product_id;
		$totalStock=DealerStock::where('product_id',$product_id)->get();
		$dealerStock=RetailerStock::where('product_id',$product_id)->get();

		//retailer Stock
		return view('dealer.dealerstockreport',['totalStock'=>$totalStock,'dealerStock'=>$dealerStock,'product_id'=>$product_id]);
	}


	function dealerStockIn($id, Request $request){
		$products=DealerStock::where('product_id',$id)->get();
		return view('dealer.stock',['products'=>$products]);	
	}


	function dealerStockOut($id, Request $request){

		$products=RetailerStock::where('product_id',$id)->where('dealer_id',session('session_id'))->get();
		return view('dealer.dealeroutstock',['retailerStocks'=>$products]);		
		
	}


//


	function retailerStock(Request $request){
		$products=Product::all();
		return view('retailer.stockreport',['products'=>$products]);

	}


	function retailerstockReport(Request $request){
		$product_id=$request->product_id;
		$retailerStock=RetailerStock::where('product_id',$product_id)->get();
		$customerPurchase=CustomerPurchase::where('product_id',$product_id)->where('retailer_id',session('session_id'))->get();


		//retailer Stock
		return view('retailer.retailerstockreport',['retailerStock'=>$retailerStock,'customerPurchase'=>$customerPurchase,'product_id'=>$product_id]);
	}


	function retailerStockIn($id, Request $request){
		$products=RetailerStock::where('product_id',$id)->get();
		return view('retailer.stock',['products'=>$products]);	
	}


	function retailerStockOut($id, Request $request){

		$products=CustomerPurchase::where('product_id',$id)->where('retailer_id',session('session_id'))->get();
		return view('retailer.retaileroutstock',['products'=>$products]);		
		
	}






}

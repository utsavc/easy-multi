@extends('retailer.sidebar')
<?php
$y = date('Y', time()); //Getting Year
$m = date('m', time()); //Getting Month
$d = date('d', time()); //Getting Day
include(app_path().'/includes/nepali-date.php'); //Including library
$date = new nepali_date;
$date = $date->get_nepali_date($y, $m, $d);
$currentdate= $date['y'].'-'.$date['m'].'-'.$date['d']; //Formatting Date
?>

@section('bodycontent')
<div class="container-fluid mt-2">


	<div class="col-lg-8">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Transfer Product</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" method="GET" action="transfertocustomer">
				<div class="card-body">
					{{csrf_field()}}


					<div class="form-group">
						<label for="exampleInputPassword1">Customer Id</label>
						
						<select name="customerid" class="form-control" required id="exampleInputPassword1">
							@if (count($products[1]) > 0)
								@foreach ($products[1] as $customer)
									<option value="{{ $customer->id }}">{{ $customer->id." - ".$customer->name }}</option>
								@endforeach
							@endif
						</select>
					</div>

					
					<div class="form-group">
						<label for="exampleInputPassword1">Product Name</label>
						
						<select name="name" class="form-control" required id="exampleInputPassword1">
						@if (count($products[0]) > 0)
							@foreach ($products[0] as $stock)
								<option value="{{ $stock->name }}">{{ $stock->name }}</option>
							@endforeach
						@endif
						</select>
					</div>


					<div class="form-group">
						<label for="exampleInputPassword1">Quantity</label>
						<input type="text" name="quantity" class="form-control" required id="exampleInputPassword1" placeholder="Eg. 12345">
					</div>

					
					<button type="submit" class="btn btn-primary">Transfer</button>

					<button type="reset" class="btn btn-warning">Reset</button>

				</div>
				<!-- /.card-body -->

			</form>
		</div>
	</div>



    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Showing List of Products</h3>
        </div>
        <div class="card-body">
            <div class="datatable-dashv1-list custom-datatable-overright">
                <div id="toolbar">
                    <select class="form-control dt-tb">
                        <option value="">Export Basic</option>
                        <option value="all">Export All</option>
                        <option value="selected">Export Selected</option>
                    </select>
                </div>
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
				data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
				<thead>
					<tr>
						<th data-field="id">SN</th>
						<th data-field="name" >Product Name</th>
						<th data-field="quantity" >Quantity</th>
						<th data-field="report" >Report</th>
						<th data-field="remarks">Remarks</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php $countdata = 0 ?>
						@if (count($products[2]) > 0)
							@foreach ($products[2] as $product)
								<?php $countdata++ ?>
								@if (!($countdata % 2 == 0))
									<tr role="row" class="odd">
										<td tabindex="0" class="sorting_1">{{ $countdata }}</td>
										<td>{{ $product->name }}</td>
										<td>{{ $product->quantity }}</td>
										<td><a href="dealer/productreport/{{ $product->id }}"><button class="btn btn-primary">View Report</button></a></td>
										<td>
											<a href="{{ route('transferproductEdit', ['id' => $product->id]) }}" class="btn btn-success btn-sm">Edit</a>
				
											<form class="form-inline d-inline" method="post" action="{{ route('transferproductDelete', $product->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
												@csrf
												<button type="submit" class="btn btn-danger btn-sm">Delete</button>
											</form>
										</td>
									</tr>
								@else
									<tr role="row" class="even">
										<td tabindex="0" class="sorting_1">{{ $countdata }}</td>
										<td>{{ $product->name }}</td>
										<td>{{ $product->quantity }}</td>
										<td><a href="dealer/productreport/{{ $product->id }}"><button class="btn btn-primary">View Report</button></a></td>
										<td>
											<a href="{{ route('transferproductEdit', ['id' => $product->id]) }}" class="btn btn-success btn-sm">Edit</a>
				
											<form class="form-inline d-inline" method="post" action="{{ route('transferproductDelete', $product->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
												@csrf
												<button type="submit" class="btn btn-danger btn-sm">Delete</button>
											</form>
										</td>
									</tr>
								@endif											
							@endforeach
						@endif
						
					</tr>
				</tbody>
			</table>
        </div>
    </div>
</div>


@endsection

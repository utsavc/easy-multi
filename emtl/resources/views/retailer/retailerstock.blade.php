@extends('retailer.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
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
								<th>SN</th>
								<th>PRODUCT NAME</th>
								<th>QTY</th>
								<th>REPORT</th>
							</tr>
						</thead>
			
						<tbody>
							<?php $countdata = 0 ?>
							@if (count($products) > 0)
								@foreach ($products as $product)
									<?php $countdata++ ?>
									@if (!($countdata%2 == 0))
										<tr role="row" class="odd">
											<td tabindex="0" class="sorting_1">{{ $countdata }}</td>
											<td>{{ $product->name }}</td>
											<td>{{ $product->quantity }}</td>
											<td><a href="dealer/productreport/{{ $product->id }}"><button class="btn btn-primary">View Report</button></a></td>
										</tr>
									@else
										<tr role="row" class="even">
											<td tabindex="0" class="sorting_1">{{ $countdata }}</td>
											<td>{{ $product->name }}</td>
											<td>{{ $product->quantity }}</td>
											<td><a href="dealer/productreport/{{ $product->id }}"><button class="btn btn-primary">View Report</button></a></td>
										</tr>
									@endif											
								@endforeach
							@endif
							
						</tbody>
					</table>
                </div>
            </div>
        </div>    
    </div>
</div>





@endsection
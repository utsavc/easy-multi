@extends('dealer.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid ">
	<div class="row">
		<div class="col-lg-12">

			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Showing List of Products</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="dataTables_length" id="example1_length">
									<label>
										Show 
										<select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
											<option value="10">10</option>
											<option value="25">25</option>
											<option value="50">50</option>
											<option value="100">100</option>
										</select>
										entries
									</label>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">SN</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Product Name</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Quantity</th>
											<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Report</th>
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
									<tfoot>
										<tr>
											<th rowspan="1" colspan="1">SN</th>
											<th rowspan="1" colspan="1">Product Name</th>
											<th rowspan="1" colspan="1">Quantiy</th>
											<th rowspan="1" colspan="1">Report</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-5">
								<div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of <?php echo count($products); ?> entries</div>
							</div>
							<div class="col-sm-12 col-md-7">
								{{-- @if (count($products)>0) {{ $products->links() }} @endif --}}
							</div>
						</div>
					</div>
				</div>
				<!-- /.card-body -->
			</div>


			{{-- <div class="card">
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
							<tr>
								<td> 1 </td>
								<td> Product XYZ </td>
								<td> 50 </td>
								<td> <a href="dealer/productreport"><button class="btn btn-primary">View Report</button></a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div> --}}
		</div>	
	</div>
</div>


@endsection
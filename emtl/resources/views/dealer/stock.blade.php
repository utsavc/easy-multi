@extends('dealer.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid ">
	<div class="row">
		<div class="col-lg-12">

			<div class="card">
				<div class="card-header">
					<h3 class="card-title font-weight-bold">Stock Report</h3>
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
							</tr>
						</thead>

						<tbody>
							@foreach ($products  as $product)
							<tr role="row" class="odd">
								<td tabindex="0" class="sorting_1">{{$loop->iteration}}</td>
								<td>{{ $product->product->productname }}</td>
								<td>{{ $product->qty }}</td>
								
							</tr>									
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>	
	</div>
</div>


@endsection

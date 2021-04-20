@extends('retailer.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">		

			<div class="card">
				<div class="card-header">
					<h3 class="card-title font-weight-bold">Sales Report of Retailer 
						<span class="text-info"> 
							
						</span>
					</h3>
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
								<th data-field="date" >Date</th>
								<th data-field="name" >Customer</th>
								<th data-field="email" >Quanity</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($products as $product)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>

									@php
									$dt = new DateTime($product->created_at);
									echo $dt->format('Y-m-d');
									@endphp
								</td>
								<td>{{$product->customer->name}}</td>
								<td>{{$product->qty}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>


	</div>


</div>










</div>





@endsection
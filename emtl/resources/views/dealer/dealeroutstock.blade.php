@extends('dealer.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">		

			<div class="card">
				<div class="card-header">
					<h3 class="card-title font-weight-bold">Showing Transfer Reports of  
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
								<th data-field="name" >Date</th>
								<th>Retailer Name</th>
								<th data-field="email" >Quanity</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($retailerStocks as $retailerStock)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>

									@php
									$dt = new DateTime($retailerStock->created_at);
									echo $dt->format('Y-m-d');
									@endphp
								</td>
								<td>{{$retailerStock->retailer->name}}</td>
								<td>{{$retailerStock->qty}}</td>
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
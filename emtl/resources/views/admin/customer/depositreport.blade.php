@extends('admin.sidebar')

@section('bodycontent')

<div class="container-fluid mt-2">
	<div class="row">
		<div class="col-lg-10">



			<div class="card">
				<div class="card-header">
					<h3 class="card-title font-weight-bold">Customer Deposit Report</h3>
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
								<th data-field="email" >Customer</th>
								<th data-field="phone" >Amount</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Utsav</td>
								<td>12344</td>
								<td>2</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>


	</div>


</div>










</div>





@endsection
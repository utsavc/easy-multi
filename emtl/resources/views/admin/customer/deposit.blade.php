@extends('admin.sidebar')

@section('bodycontent')

<div class="container-fluid mt-2">

	<div class="row">

		<div class="col-lg-8">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Add Dealer</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form">
					<div class="card-body">

						<div class="form-group">
							<label for="exampleInputPassword1">Product Name</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Eg. ABC Traders">
						</div>


						<div class="form-group">
							<label for="exampleInputPassword1">Qty</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Eg. 1002345">
						</div>





						<div class="form-group">
							<label for="exampleInputPassword1">Date</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Eg. Bharatpur">
						</div>


						<button type="submit" class="btn btn-primary">Create</button>

						<button type="submit" class="btn btn-warning">Reset</button>

					</div>
					<!-- /.card-body -->

				</form>
			</div>
		</div>

		<div class="col-lg-4"></div>

	</div>




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
						<th data-field="id">SN</th>
						<th data-field="name" >Product Name</th>
						<th data-field="email" >MRP</th>
						<th data-field="phone" >Dealer Comission</th>
						<th data-field="complete">Retailer Comission</th>
						<th data-field="completes">Customer Comission</th>
						<th data-field="completess">Remarks</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Utsav</td>
						<td>12344</td>
						<td>2</td>
						<td>2</td>
						<td>2</td>
						<td>
							<a href="" class="btn btn-success btn-sm">Edit</a>
							<a href="" class="btn btn-danger btn-sm">Delete</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>




</div>





@endsection
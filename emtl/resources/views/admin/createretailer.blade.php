@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">


	@include('messages.messages')
	<div class="row">
		<div class="col-sm-5">

			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Add Retailer</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->


				<div class="card-body">	

					<form role="form" method="post" action="{{ url('admin/user/add-retailer') }}">

						{{ csrf_field() }}					
						<div class="form-group ">
							<label >Retailer Name</label>
							<input type="text" name="name" class="form-control ml-2" placeholder="Eg. ABC Traders" value="{{old('name')}}">
						</div>

						<div class="form-group ">
							<label >Retailer Id</label>
							<input type="text" name="retailerid" class="form-control ml-2" placeholder="Eg. 1002345"  value="{{old('retailerid')}}">
						</div>



						<div class="form-group ">
							<div class="form-group">
								<label for="exampleDropdown">Select Dealer</label>
								<select data-live-search="true" title="Please select Dealer" data-live-search-placeholder="Search Product" class="form-control selectpicker" name="dealer_id">
									@foreach ($dealers as $dealer)
									<option value="{{$dealer->id}}">{{$dealer->name }} -{{$dealer->dealerid}}  </option>
									@endforeach
								</select>
							</div>



						</div>




						<div class="form-group ">
							<label >Address</label>
							<input type="text" name="address" class="form-control ml-2" placeholder="Eg. Bharatpur" value="{{old('address')}}">
						</div>



						<div class="form-group ">
							<label >Phone Number</label>
							<input type="text" name="phone" class="form-control ml-2" placeholder="Eg. 900010001" value="{{old('phone')}}">
						</div>			


						<button type="submit" class="btn btn-primary">Add</button>


					</form>

				</div>
				<!-- /.card-body -->

			</div>

		</div>
	</div>





	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title font-weight-bold">List of Retailers</h3>
		</div>
		<div class="card-body">
			<div class="datatable-dashv1-list custom-datatable-overright">
				<div id="toolbar">
					<select class="form-control ml-2 dt-tb">
						<option value="">Export Basic</option>
						<option value="all">Export All</option>
						<option value="selected">Export Selected</option>
					</select>
				</div>
				<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true"  data-resizable="true" data-cookie="true"
				data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">

				<thead>
					<tr>
						<th>SN</th>
						<th>Retailer Name</th>
						<th>Dealer Id</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Remarks</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($retailers as $retailer)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $retailer->name }}</td>
						<td>{{ $retailer->dealer->name }}</td>
						<td>{{ $retailer->address }}</td>
						<td>{{ $retailer->phone }}</td>
						
						<td>
							<a href="{{ route('retailerEdit',['id' => $retailer->id]) }}" class="btn btn-success btn-sm">Edit</a>

							<form class="form-inline d-inline" method="post" action="{{ route('retailerDelete', $retailer->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
								@csrf
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>



</div>





@endsection
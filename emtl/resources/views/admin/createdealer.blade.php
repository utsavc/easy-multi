@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">



	@include('messages.messages')


	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Add Dealer</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->


		<div class="card-body">
			<form role="form" class="form-inline" action="{{ url('admin/user/add-dealer') }}" method="post">
				
				{{csrf_field()}}


				<div class="input-group mr-2">
					<label >Dealer Name</label>
					<input type="text" name="name" class="form-control ml-2" placeholder="Eg. ABC Traders" value="{{old('name')}}">
				</div>


				<div class="input-group mr-2">
					<label >Dealer Id</label>
					<input type="text" name="dealerid" class="form-control ml-2" placeholder="Eg. 1002345" value="{{old('dealerid')}}">
				</div>

				<div class="input-group mr-2">
					<label >Address</label>
					<input type="text" name="address" class="form-control ml-2" placeholder="Eg. Bharatpur" value="{{old('address')}}">
				</div>

				<div class="m-5"></div>



				<div class="form-group mr-2">
					<label >Phone Number</label>
					<input type="text" name="phone" class="form-control ml-2" placeholder="Eg. 900010001" value="{{old('phone')}}">
				</div>		


				<div class="form-group mr-2">
					<label >Email</label>
					<input type="email" name="email" class="form-control ml-2" placeholder="Eg. abc@mail.com" value="{{old('email')}}">
				</div>



				<div>

					<button type="submit" class="btn btn-primary">Create</button>

					<button type="submit" class="btn btn-warning">Reset</button>
				</div>

			</form>

		</div>
		<!-- /.card-body -->

	</div>



	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title font-weight-bold">List of Dealers</h3>
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

				<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true"  data-resizable="true" data-cookie="true"
				data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
				<div>
					<button class="btn btn-danger">Disabled</button>
					<button class="btn btn-success">Enabled</button>
				</div>

				<thead>
					<tr>
						<th>SN</th>
						<th>Dealer Name</th>
						<th>Dealer Id</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Remarks</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($dealers as $dealer)
					<tr class="{{ $dealer->status =='inactive' ? 'bg-danger': ' '}}">
						<td>{{ $loop->iteration }}</td>
						<td>{{ $dealer->name }}</td>
						<td>{{ $dealer->dealerid }}</td>
						<td>{{ $dealer->address }}</td>
						<td>{{ $dealer->phone }}</td>
						<td>{{ $dealer->email }}</td>
						<td>
							<a href="{{ route('dealerEdit',['id' => $dealer->id]) }}" class="btn btn-success btn-sm">Edit</a>

							<form class="form-inline d-inline" method="post" action="{{ route('dealerDelete', $dealer->id) }}" onclick="return confirm('Are you sure you want to delete this item?');"">
							@csrf
							<button type="submit" class="btn btn-danger btn-sm">{{ $dealer->status =='inactive' ? 'Enable': 'Disable'}}</button>
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
@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">

	@include('admin.messages')

	<div class="row">
		<div class="col-lg-4">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Withdraw Amount</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form" action="{{ route('withdraw') }}" method="post" autocomplete="off">

					@csrf
					<div class="card-body">

						<div class="form-group">
							<label for="exampleDropdown">Select Member</label>
							<select data-live-search="true" title="Select Member" data-live-search-placeholder="Search Username" class="form-control selectpicker" name="customer_id">		

								

								@foreach ($customer as $customers)
								<option value="{{$customers->id}}" >{{$customers->name}}</option>
								@endforeach						
								
							</select>
						</div>

						<div class="form-group">
							<label for="exampleDropdown">Amount</label>
							<input type="text" class="form-control" name="amount">
						</div>

						

						<!--
						<div class="form-group">
							<label >Date</label>
							<input type="text" class="form-control"  placeholder="">
						</div>-->

						
						<button type="submit" class="btn btn-primary">Withdraw</button>
						<button type="submit" class="btn btn-warning">Reset</button>
					</div>
					<!-- /.card-body -->
				</form>
			</div>
		</div>

	</div>
</div>



</div>



@endsection
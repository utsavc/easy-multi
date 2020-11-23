@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">


	<!-- Displaying Error Messages-->
	@if ($errors->any())
	<div class="alert alert-danger alert-dismissible fade show" role="alert">		
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</div>
	@endif

	
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">		
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>{{ $message }}</strong>
	</div>
	@endif


	<div class="row">
		<div class="col-lg-4">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Deposit Amount</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form" action="{{ route('addProductStock') }}" method="post" autocomplete="off">

					@csrf
					<div class="card-body">

						<div class="form-group">
							<label for="exampleDropdown">Select Member</label>
							<select data-live-search="true" title="Select Member" data-live-search-placeholder="Search Username" class="form-control selectpicker" name="user_id">							
								
							</select>
						</div>

						<div class="form-group">
							<label for="exampleDropdown">Amount</label>
							<input type="text" class="form-control" name="">
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
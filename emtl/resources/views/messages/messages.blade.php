

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


@if ($message = Session::get('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">		
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">		
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<strong>{{ $message }}</strong>
</div>
@endif
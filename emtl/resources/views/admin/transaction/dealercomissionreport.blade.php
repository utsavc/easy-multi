@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">

	@include('messages.messages')

	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Details</h3>
		</div>

		<div class="card-body">

			
			<div class="row">
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="nav-icon fas fa-money-bill-alt "></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Comission Amount</span>
							<span class="info-box-number">
								{{$report}}
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				

				
				
			</div>		
		</div>
	</div>
</div>




@endsection
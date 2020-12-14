@extends('admin.sidebar')

@section('bodycontent')
<br>
<div class="container-fluid">
	@include('messages.messages')

	<div class="row">

		<div class="col-lg-4">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Create User</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form">
					<div class="card-body">

						<div class="form-group">
							<label>Select User Type</label>
							<select id="userType" class="form-control" onchange="showUser()">
								<option value="retailer">Retailer</option>
								<option value="dealer">Dealer</option>
							</select>
						</div>


						<div  id="users">
							
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Username</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Re-type Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
</div>


<script type="text/javascript">

	var request=new XMLHttpRequest();

	function showUser(){  
		var x = document.getElementById("userType").value;
		var url;
		if (x==="retailer") {
			url="{{route('showRetailer')}}";
		}else if(x==="dealer"){
			url="{{route('showDealer')}}";
		}

		try{  
			request.onreadystatechange=function(){  
				if(request.readyState===4){  
					var users=request.responseText;  	
					document.getElementById('users').innerHTML=users;  
				}  
                }//end of function  
                request.open("GET",url,true);  
                request.send();  
            }catch(e){
            	alert(e);
            } 
        }



    </script>





    @endsection
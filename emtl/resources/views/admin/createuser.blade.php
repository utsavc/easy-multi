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
				<form role="form" method="post" action="{{route('createUser')}}">
					@csrf
					<div class="card-body">

						<div class="form-group">
							<label>Select User Type</label>
							<select id="userType" class="form-control" onchange="showUser()" name="userType">
								<option value="retailer">Retailer</option>
								<option value="dealer">Dealer</option>
							</select>
						</div>

						<div  id="users">
							
						</div>
					</div>
					<!-- /.card-body -->
				</form>
			</div>
		</div>

		<div class="col-lg-8">

			
		</div>
		




	</div>

</div>
</div>


<script type="text/javascript">

	var request=new XMLHttpRequest();

	function showForm(){

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


        




        function showUser(){  
        	showForm();
        }



    </script>





    @endsection
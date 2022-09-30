@extends('backend.layouts.master')

@section('main_content')
	<div class="container-fluid">
		 @if ($errors->any())
		     @foreach ($errors->all() as $error)
		         <div class="bg-danger">{{$error}}</div>
		     @endforeach
		 @endif
		<form action="{{route('save_user')}}" method="post">
			@csrf
			<input type="hidden" name="user_id" value="{{isset($user)?$user->id:old('user_id')}}">

			<div class="row">
				<div class=" col-sm-2">
					<label>User Name</label>
					<input type="text" name="username" class="form-control" value="{{isset($user)?$user->name:old('username')}}">	
				</div>
				<div class=" col-sm-3">
					<label>User Email</label>
					<input type="email" name="email" required  class="form-control" value="{{isset($user)?$user->email:old('email')}}">	
				</div>

				<div class=" col-sm-3">
					<label>{{isset($user)?'New':''}}Password</label>
					<input type="password" name="password" class="form-control" value="">	
				</div>

				<div class="col-sm-3">
					<label>Confirm {{isset($user)?'New':''}} Password</label>
					<input type="password" name="password_confirmation" class="form-control" value="">	
				</div>
				<div class="col-lg-1 pt-3">
					<label></label>
					<i class="fa fa-eye" id="show_password"></i>
				</div>
			</div>


			<label>Select Roles</label>
			<div class="row">
				
					@foreach($roles as $role)
					<div class="col-lg-3">
						<label>
						<input type="checkbox" @if(isset($user) && in_array($role,$user->getRoleNames()->toArray())) checked @endif  name="roles[]" value={{$role}} >{{$role}}
						</label>	
					</div>
					
					@endforeach
				
			</div>

			<label for="">Select Extra permissions</label>
			<div class="row">
				@foreach($permissions as $perm)
				<div class="col-lg-3">
					<label>
						<input @if(isset($user) && in_array($perm,$user->getPermissionNames()->toArray())) checked @endif type="checkbox" name="permissions[]" value="{{$perm}}">{{$perm}}
					</label>
				</div>
				@endforeach
			</div>


			
			<button type="submit" class="btn btn-success btn-sm mt-2">Submit</button>
		</form>
	</div>
@endsection

@section('script')

	<script type="text/javascript">
		$("document").ready(function(){
			$(":input[name=password_confirmation],:input[name=password]").attr("readonly","readonly");

			$(":input[name=password_confirmation],:input[name=password]").dblclick(function(){
				$(this).removeAttr('readonly');
			});

			$(":input[name=password_confirmation],:input[name=password]").blur(function(){
				$(this).attr('readonly','readonly');
			});

			$("#show_password").click(function(){

				var el=$(":input[name=password_confirmation]").attr('type');
				
				if(el==='text'){
					$(":input[name=password_confirmation],:input[name=password]").attr('type','password');
				}else if(el==='password'){
					$(":input[name=password_confirmation],:input[name=password]").attr('type','text');
				}
				
			})
		})
	</script>
@endsection
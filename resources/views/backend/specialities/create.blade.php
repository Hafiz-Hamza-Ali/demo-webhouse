@extends('backend.layouts.master')

@section('main_content')
	<div class="container-fluid">
		 @if ($errors->any())
		     @foreach ($errors->all() as $error)
		         <div class="bg-danger">{{$error}}</div>
		     @endforeach
		 @endif
		<form action="{{route('speciality_store')}}" method="post" enctype="multipart/form-data">
			@csrf
			@if(isset($speciality))
			<input type="hidden" name="speciality_id" value="{{$speciality->id}}">
			@endif

			<div class="row">
				<div class=" col-sm-4">
					<label>Speciality Title</label>
					<input type="text" name="title" class="form-control" value="{{isset($speciality)?$speciality->title:old('title')}}">	
				</div>
				<div class="col-sm-4">
					<label>Image</label>
					<input type="file" name="img" required  >	
				</div>

			
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
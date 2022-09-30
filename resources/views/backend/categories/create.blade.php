@extends('backend.layouts.master')

@section('main_content')

	<div class="container-fluid">
		<div>
			<form action="{{route('categories_store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-lg-3">
						<label>Title</label>
						<input type="text" name="title" class="form-control" value="{{isset($category)?$category->title:old('title')}}">
					</div>

					<div class="col-lg-3">
						<label>Slug</label>
						<input type="text" name="slug" value="{{isset($category)?$category->slug:old('slug')}}" class="form-control">
					</div>

					<div class="col-lg-3">
						<label>Choose Image</label>
						<input type="file" name="img">	
					</div>


					<div class="col-lg-3">
						<label>Choose Background Color</label>
						<input type="color" name="bg_clr" value="{{isset($category)?$category->bg_clr:old('bg_clr')}}">	
					</div>

					
				</div>
				<div class="row mt-3">
					
					<div class="col-lg-6">
						<label>Description</label>
						<textarea name="desp" class="form-control" rows="3">{{isset($category)?$category->description:old('desp')}}</textarea>
					</div>
					
					<div class="col-lg-2">
						<label>Choose Font Color</label>
						<input type="color" name="fnt_clr" value="{{isset($category)?$category->fnt_clr:old('fnt_clr')}}">	
					</div>
				</div>

				@if(isset($category))
					<input type="hidden" name="catid" value="{{$category->id}}">
				@endif

				<input type="submit" name="submit" value="Save" class="btn btn-success btn-sm mt-3">	
				

			</form>
		</div>
	</div>

@endsection
@section("script")
	<script type="text/javascript">
		$("document").ready(function(){

			$("input[name=title]").keyup(function(){
				$(":input[name=slug]").val($(this).val().replace(/ /g,"-"));
			})
		});
	</script>
@endsection
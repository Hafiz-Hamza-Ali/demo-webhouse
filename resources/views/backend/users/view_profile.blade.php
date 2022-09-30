@extends('backend.layouts.master')

@section('main_content')
	<div class="container-fluid">
		 @if ($errors->any())
		     @foreach ($errors->all() as $error)
		         <div class="bg-danger">{{$error}}</div>
		     @endforeach
		 @endif
        <div class="container">
    <form action="{{route('save_user_info',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div id="imgSection">
            <div style="height:300px;width:250px;border:1px solid grey;position:relative">
                @if($user->profile_img)
                <div id="u_p_img" style="z-index:1 !important" style="height:100%;width:100%">
                <img src="{{asset('uploads/users/'.$user->profile_img)}}" alt=""  style="width:100%;height:100%">
                </div>
                @else
                <div id="u_p_img" style="position:absolute;bottom:0;width:100%;height:100%; background-image: linear-gradient(to top, #A8A8A8 , #EFF2F5);z-index:0 !important">
                    <img src="" alt=""  style="width:100%;height:100%">
                </div>
                @endif
            </div>

            <button type="button" class="btn btn-success mt-2 btn-sm" id="get_pfileImg_btn">Choose profile image</button>
            <div style="height:0px;width:0px;overflow:hidden">
                <input type="file" name="profile_img" id="recev_pimg">
            </div>
        </div>
        <div class="row mt-5" id="user_info">
            
            <div class="col-lg-3  mb-3">
                <label for="">First Name</label>
                <input type="text" name="fname" class="form-control" value="{{$user->firstname}}">
                
            </div>
            <div class="col-lg-3  mb-3">
                <label for="">Last Name</label>
                <input type="text" name="lname" class="form-control" value="{{$user->lastname}}">
                
            </div>
            <div class="col-lg-3  mb-3">
                <label for="">Your Email</label>
                <input type="text" name="email" class="form-control" value="{{$user->email}}">
                
            </div>
            <div class="col-lg-3  mb-3">
                <label for="">Tag Line</label>
                <input type="text" name="tagline" class="form-control" value="{{$user->tag_line}}">
                
            </div>

            <div class="col-lg-3">
                <label>Categories</label>
                <select name="category" class="form-control">
                    <option>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($category->id==$user->category_id) selected @endif >{{$category->title}}</option>
                @endforeach
                </select>
            </div>


             <div class="col-lg-3 mb-3">
                <label>Upload Video</label>
                <input type="file" name="video">
            </div>

            <div class="col-lg-6 mb-3">
                <label>Add Specialities</label>
                
                <select name="specialities[]" id='myselect' multiple="multiple">
                    @foreach($specialities as $specs)
                        <option @if( gettype($user->specialities)=='array' && in_array($specs->id,$user->specialities)) selected @endif value="{{$specs->id}}">{{$specs->title}}</option>
                    @endforeach
                </select>
                
            </div>


            <div class="col-lg-3 mb-3">
                <label>Charges Per minute in USD($)(Chat)</label>
                <input type="number" name="amount_per_minute_chat" value="{{isset($user)?$user->amount_per_minute_sms:old('amount_per_minute_chat')}}" class="form-control">
            </div>
              <div class="col-lg-3 mb-3">
                <label>Charges Per minute in USD($)(Voice Call)</label>
                <input type="number" name="amount_per_minute_voice" value="{{isset($user)?$user->amount_per_minute_voice:old('amount_per_minute_voice')}}" class="form-control">
            </div>
              <div class="col-lg-3 mb-3">
                <label>Charges Per minute in USD($)(Video Call)</label>
                <input type="number" name="amount_per_minute_video" value="{{isset($user)?$user->amount_per_minute_video:old('amount_per_minute_video')}}" class="form-control">
            </div>

            <div class="col-lg-3 mb-3">
                
                <div>

                    <label>
                        <input name="role"  type="checkbox" @if(isset($user) && $user->role=="consultant") checked @endif value="consultant"> Is Consultant
                    </label>
                </div>
            </div>

               
            
        </div>

        <div class="row">
            <div class="col-lg-12">
                
                <label style="margin-bottom:5px" for="">About Your Self</label>
                <textarea name="about" id="user_about_sec" cols="30" rows="10" class="form-control">
                    {!!$user->about_user!!}
                </textarea>
                
            </div>
           

            <button type="submit" class="btn btn-success mt-3 btn-sm">Save</button>
        </div>

    </form>
  
</div>
	</div>
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
	<script type="text/javascript">
	 $(document).ready(function(){
        $("#get_pfileImg_btn").click(function(){
            $("#recev_pimg").click();
        });
        $("#recev_pimg").change(function(e){
            $("#u_p_img>img").attr('src',URL.createObjectURL(e.target.files[0]));
        });
        $(":input[name=video]").change(function(e){
            console.log(e.target.files[0]);
            if(e.target.files[0].type != 'video/mp4'){
                alert("Please pick a valid mp4 video");
                $(this).val('');
            }
        })

        CKEDITOR.replace("user_about_sec",{
            filebrowserUploadUrl: "{{route('uploadEditorImage', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    })


     $('#myselect').select2({
            width: '100%',
            placeholder: "Select an Option",
            tags:true
            
        });
	</script>
@endsection
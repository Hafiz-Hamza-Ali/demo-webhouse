@extends("backend.layouts.master")
@section("title","categories")
@section("main_content")
<style> 
    #show_message{
        display:none;
    }
    #show_message p{
        padding:0px;
        margin:0px;
    }
</style>

<div class="container">
    <div class="bg-danger p-1 text-capitalize mb-3" id="show_message"><span style="float:right"><i class="fa fa-times"></i> </span><p></p></div>
  
    <form method="post" action="{{route('save_role')}}" enctype="multipart/form-data">
        @csrf
        
    
        
        <div class="row">
          
            <div class="col-lg-3">
                <label>Role</label>
                <input required type="text" value="{{isset($role)?$role->name:old('role')}}"  name="role" class="form-control">
                <input type="hidden" value="{{isset($role)?$role->id:old('roleid')}}" name="roleid">
            </div>
        </div>

        <div class="row">
            @foreach($permissions as $permission)
            
            <div class="col-lg-3">
                <label>
                    <input name="perms[]" @if(isset($role) && in_array($permission->id,$allperms)) checked @endif type="checkbox" value="{{$permission->id}}">{{$permission->name}}
                </label>
            </div>
            @endforeach
        </div>
   

        <input type="submit" name="submit" value="Add" class="btn btn-success mt-2">
        
    </form>
  
    
</div>

    
    
@endsection
@section("scripts")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script>
    
 
</script>
@endsection
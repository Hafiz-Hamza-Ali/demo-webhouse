@extends("backend.layouts.master")
@section("title","categories")
@section("main_content")

    <div class="container">
        <a href="{{route('create_role')}}" class="btn btn-sm btn-success ml-1">Create New Role</a>
        <table id="roleTable" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                  
                    <th>Action</th>

                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    
    
@endsection
@section("script")
<script>
    $('document').ready(function(){
        $("#roleTable").DataTable({
            
            serverside:true,
            processing:true,

          


            ajax:{
                url:"{{route('show_all_roles')}}",
                data:function(d){
                    d.id=$("#getTempID").val();
                }
            },
           
            columns:[
                {data:'DT_RowIndex',name:'',orderable:false,searchable:false},
                {data:'rolename',name:'rolename'},
            
                
                {data:'action',name:'action'}
            ]
        });

       

    
     
     
        
    })
</script>
@endsection
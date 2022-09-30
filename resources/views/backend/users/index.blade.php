@extends('backend.layouts.master')

@section('main_content')
	
	<a class="m-1 btn btn-sm btn-primary" href="{{route('create_user')}}">Add New User</a>

	
	<div class="container">
        <!-- <button id="dtBack">Back</button> -->
        
        <table id="usersTable" class="table">
            <thead>
                <tr>
	                <th>#</th>
	                <th>username</th>
	                <th>email</th>
	               <th>status</th>
	                <th>Action</th>

                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    
    
@endsection
@section("script")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<script>
    $('document').ready(function(){
        $("#usersTable").DataTable({
            
            serverside:true,
            processing:true,
            ajax:{
                url:"{{route('users_all')}}",
                data:function(d){
                    d.role="{{$role}}"
                },
            },
           
            columns:[
                {
                data: 'id',
                name: 'id'
            },
            {
                data: 'name', 
                name: 'name'
            },
            {
                data: 'email', 
                name: 'email'
            },
            {
                data:'status',
                name:'status'
            },
          
            
            {   
                data:'action',
                name:'action', 
                orderable: false, 
                searchable: false
            },
            ]
        });

       


      
        
    })
    function deleteConfirmation(id) { 

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                showCancelButton:true,
                    showCloseButton:true,
                    cancelButtonText:'Cancel',
                    confirmButtonText:'Yes, Delete',
                    cancelButtonColor:'#d33',
                    confirmButtonColor:'#556ee6',
                    width:300,
                    allowOutsideClick:false
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({   
                        type: "get",
                        url: "delete/"+id,
                        dataType: 'JSON', 
                        success: function(response) {
                            var api = $("#blogTable").dataTable().api();
                            api.draw();
                        }
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
        } 
</script>

@endsection
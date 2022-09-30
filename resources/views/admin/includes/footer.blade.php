<footer class="row">
    <div id="copyright text-right">
        © Copyright 2022 Webhouse
    </div>
</footer>

<!-- javascript -->


<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/functions.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>

    $(document).ready( function () {
        var currentURL = window.location.href;
    var base_url = $('input[name="base_url"]').val();
var complete=base_url+"/admin/claims";
if(currentURL == complete)
{
    $('#available').removeClass('active');
    $('#available-li').removeClass('active');
    $('#accepted').addClass('active');
    $('#accepted-li').addClass('active');
}
//     $('#data-table').DataTable( {
//         searching: false,
//         paging:false
// } );
// $('#data-tables').DataTable( {
//         searching: false,
//         paging:false
// } );
// $('#data-table_length').hide();
// $('#data-table_info').hide();

// $('#data-table_paginate').hide();
// $('#data-tables_info').hide();

} );
   

</script>
@stack('scripts')

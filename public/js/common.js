$(document).ready(function(){
    load_table();

    $(".postbutton").click(function(){
       var urls = $('#add_gaji').attr('url');
        $.ajax({
            /* the route pointing to the post function */
            url: urls,
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: $('#add_gaji').serialize(),
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
                var messages = $('.messages');

                var successHtml = '<div class="alert alert-success">'+
                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></strong> '+ data.msg +
                '</div>';

                // $(messages).html(successHtml);
                // $(messages).fadeIn();
                $('#addGajiModal').modal('hide');
                location.reload();
            }
        }); 
    });
});    
var table;
function load_table(){
    var CSRF_TOKEN = $('[name="_token"]').val();
   
    
    // if ( $.fn.dataTable.isDataTable( '#the_table' ) ) {
    //     table = $('#the_table').DataTable( {
    //         retrieve: true,
    //         paging: false
    //     } );
    // }
    
        table = $('#the_table').DataTable({
            serverSide: true,
               "ajax":{
                   "url": '/get_gaji',
                   "dataType": "json",
                   "type": "POST",
                   "data":{ _token: CSRF_TOKEN}
                 },
                 columns: [
                   { data: 'nama' },
                   { data: 'gapok' },
                   { data: 'jamsostek' },
                   { data: 'telat' },
                   { data: 'pph21' },
                   { data: 'absen' },
                   { data: 'pensi' },
                   { data: 'bpjs' },
                   { data: 'button' }
               ]
           });
    
  
}
function edit_data(id,nama,gapok,telat, absen){
    $('#id').val(id);
    $('#nama').val(nama);
    $('#gapok').val(gapok);
    $('#telat').val(telat);
    $('#absen').val(absen);
    $('#addGajiModal').modal('show');
}


function add_data(){
    $('#id').val('');
    $('#nama').val('');
    $('#gapok').val('');
    $('#telat').val('');
    $('#absen').val('');
    $('#addGajiModal').modal('show');
}
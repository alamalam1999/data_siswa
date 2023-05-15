@extends('backend.layouts.app')

@section('title', app_name() . ' | Pricing Management')

@section('breadcrumb-links')

@endsection
@section('pagestyle')
@stop

@section('content')

<div class="card">
    <div class="card-header pt-7 pb-7">

        <div class="row">
            <div>
                <a href="{{ route('admin.pricing.export_excel') }}">
                <button id="btn-search" type="submit" class="testing2 btn btn-flex btn-primary">CHECK</button>
                </a>
            </div>
            <div class="col">
              
            </div>
          </div>      
    </div>
</div>

<div>
    
    
    <div class="card">
        <table id="myTable">
            <thead>
               <tr>
                    <th>NO</th>
                    <th>ID</th>        
                    <th>PPDB_ID</th>    
                    <th>PAYMENT_TYPE</th>
                    <th>PAYMENT_CODE</th>
                    <th>CONFIRMATION_STATUS</th>
                    <th>DATE_SEND</th>
                    <th>BANK_OWNER_NAME</th>
                    <th>BANK_CODE</th>
                    <th>ACCOUNT_NUMBER</th>
                    <th>COST</th>
                    <th>IMAGE_CONFIRMATION</th>
                    <th>CREATED_AT</th>
                    <th>UPDATED_AT</th>
                    <th>UPDATED_BY</th>                               
               </tr>
            </thead>
            <tbody>

           <?php
           $no = 1;

           
           ?>   
            @foreach($payment_reregistration as $payment_reregistrations)           
            <?php 

                $file_additionaldua = [];                       

            ?>
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $payment_reregistrations->id  }}</td>
                    <td>{{ $payment_reregistrations->ppdb_id   }}</td>
                    <td>{{ $payment_reregistrations->payment_type    }}</td>
                    <td>{{ $payment_reregistrations->payment_code   }}</td>
                    <td>{{ $payment_reregistrations->confirmation_status   }}</td>
                    <td>{{ $payment_reregistrations->date_send    }}</td>
                    <td>{{ $payment_reregistrations->bank_owner_name    }}</td>
                    <td>{{ $payment_reregistrations->bank_code }}</td>
                    <td>{{ $payment_reregistrations->account_number }}</td>
                    <td>{{ $payment_reregistrations->cost }}</td>
                    <td>{{ $payment_reregistrations->image_confirmation }}</td> 
                    <td>{{ $payment_reregistrations->created_at }}</td>
                    <td>{{ $payment_reregistrations->updated_at }}</td>
                    <td>{{ $payment_reregistrations->updated_by }}</td>
                    
                    
                </tr>  

            @endforeach
            </tbody>
        </table>        
    </div>  
</div>





@endsection

@section('pagescript')
<script> 

    $(document).ready(function() {
    var table = $('#myTable').DataTable( {
        scrollY:        "800px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            left: 3
        }
        } );
    } );


$(".testing").click(function(){
    $("#page-formulir").show();
    $("#gelombangkedua").hide();
  });

$(".testing2").click(function(){
    $("#gelombangkedua").show();
    $("#page-formulir").hide();
  });

$('#pricing-table2 thead tr').clone(true).addClass('filters').appendTo('#pricing-table2 thead');
 
    var table = $('#pricing-table2').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();
 
                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    });


</script>
@stop
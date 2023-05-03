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
                <a href="{{ route('admin.pricing.index') }}">
                <button id="btn-search" type="submit" class="testing btn btn-flex btn-primary">Pricing Gelombang 1</button>
                </a>
            </div>
            <div class="col">
              
            </div>
          </div>      
    </div>
</div>

<div id="gelombangkedua">
    
    
    <div class="card">
        <form action="{{ route('admin.pricing.upload') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Pricing</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">List Data Pembayaran</span>
                </h3>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <a href="#" class="btn btn-light-success"><i class="bi bi-file-earmark-spreadsheet fs-4 me-2"></i> Download Template</a>
                    <div class="d-flex align-items-center position-relative my-1 ms-15">
                        <input name="file_pricing" class="form-control" type="file" id="formFile">
                    </div>
                    <button id="btn-search" type="submit" class="btn btn-flex btn-primary ms-5">Upload Pricing<i class="bi bi-cloud-arrow-up fs-4 ms-4"></i>
                    </button>
                </div>
                <!--end::Toolbar-->
            </div>
        </form>
        
        <div class="card-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table id="pricing-table2" class="table table-striped gy-4 gs-2 border">
                            <thead id="page-formulir">
                                <!--begin::Table row-->
                                <tr  class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th style="width: 100px;">NO</th>	
                                    <th>PRICE_GROUP</th>	
                                    <th>PRICE_CODE</th>	
                                    <th>DISCOUNT_CODE</th>	
                                    <th>SCHOOL_CODE</th>	
                                    <th>SCHOOL_STAGE</th>	
                                    <th>SCHOOL_CLASS</th>	
                                    <th>PRICE_VALUE</th>	
                                    <th>PERCENTAGE_VALUE</th>	
                                    <th>DESCRIPTION</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <tbody>
                                @foreach($pricings_wave2 as $pricing)
                                <tr>
                                    <td>{{ $pricing->id }}</td>
                                    <td>{{ $pricing->price_group }}</td>
                                    <td>{{ $pricing->price_code }}</td>
                                    <td>{{ $pricing->discount_code }}</td>
                                    <td>{{ $pricing->school_code }}</td>
                                    <td>{{ $pricing->school_stage }}</td>
                                    <td>{{ $pricing->school_class }}</td>
                                    <td>{{ $pricing->price_value }}</td>
                                    <td>{{ $pricing->percentage_value }}</td>
                                    <td>{{ $pricing->description }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--col-->
            </div>
            <!--row-->

        </div>
        <!--card-body-->
    </div>  
</div>





@endsection

@section('pagescript')
<script>


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
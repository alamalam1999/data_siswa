@extends('backend.layouts.app')

@section('title', app_name() . ' | Pricing Management')

@section('breadcrumb-links')

@endsection
@section('pagestyle')
@stop

@section('content')

<div class="card">
    <div class="card-header pt-7 pb-7">
        <div>
            <div class="col">
                <label for=""> <strong style="font-size: 20px">Master Kelas</strong></label>
            </div>
            
            <div class="col">
                List Master Kelas
            </div>
            
        </div>   
        <div class="card-body">
            <div class="card-body" style="padding-top: 10px;
            padding-bottom: 5px;
            padding-left: 5px">
            
    
                <div class="btn-header">
                    <a href="{{ route('admin.masterstore.class') }}"> 
                    <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary btn-sm" style="padding-right: 10px;padding-top: 11px">
                        <span class="indicator-label">
                            Tambah
                            </span>
                            <span class="svg-icon svg-icon-primary svg-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Files/Folder-plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" style="margin-left: 5px;margin-bottom: 5px">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M11,13 L11,11 C11,10.4477153 11.4477153,10 12,10 C12.5522847,10 13,10.4477153 13,11 L13,13 L15,13 C15.5522847,13 16,13.4477153 16,14 C16,14.5522847 15.5522847,15 15,15 L13,15 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,15 L9,15 C8.44771525,15 8,14.5522847 8,14 C8,13.4477153 8.44771525,13 9,13 L11,13 Z" fill="#000000"/>
                                    </g>
                                </svg><!--end::Svg Icon-->
                            </span>
                    </button>  
                    </a>
                </div>
            </div>
            <div class="row mt-4">
                
                <div class="col">
                    
                    
                    <div class="table-responsive">
                        <table id="ppdb-table"
                            class="table table-rounded border gy-2 gs-4 align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            data-ajax_url="{{ route('admin.master.get') }}">
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-8 text-uppercase gs-0">
                                    <th class="min-w-80px w-100px sorting">Kelas Utama</th>
                                    <th class="min-w-80px w-100px sorting">Sub Kelas</th>
                                    <th class="min-w-80px w-80px sorting">Unit</th>
                                    <th class="min-w-80px w-100px sorting">Sekolah</th>
                                    <th class="min-w-80px w-150px sorting">Kepala Sekolah</th>
                                    <th class="min-w-80px w-150px sorting">Wali Kelas</th>
                            
                                    <th class="text-end min-w-80px w-100px sorting_disabled w-200px" rowspan="1" colspan="2"
                                        aria-label="Actions" style="width: 141.766px;padding-right: 100px">Action</th>
                                        
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <tbody>
                                
                                @foreach ($master as $item)
                                <tr>
                                    <td class="fs-7">{{ $item->kategori }}</td>
                                    <td class="fs-7">{{ $item->kelas }}</td>
                                    <td class="fs-7">{{ $item->unit }}</td>
                                    <td class="fs-7">{{ $item->sekolah }}</td>
                                    <td class="fs-7">{{ $item->kepala_sekolah }}</td>
                                    <td class="fs-7">{{ $item->wali_kelas }}</td>
                                    <td class="fs-7">            
                                         
                                        <a href="{{ route('admin.masterupdate.class', $item->id) }}"> 
                                        <button type="submit" data-kt-contacts-type="submit" class="btn btn-success btn-sm fs-9" style="padding-right: 5px">
                                            <span class="indicator-label">
                                                    
                                                </span>
                                                <span class="svg-icon svg-icon-primary svg-icon">                                                                  <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Design/Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="" y="0" width="24" height="24"/>
                                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                    </g>
                                                </svg><!--end::Svg Icon-->
                                            </span>
                                        </button>  
                                        </a>
                                    </td>

                                    <td class="fs-7">
                                        <form action="{{ route('admin.masterdelete.class') }}" method="POST" enctype="multipart/form-data" style="padding-right: 50px">
                                            {{ csrf_field() }}

                                            <input type="hidden" name="item_value" value="{{ $item->id }}">
                                                <button type="submit" data-kt-contacts-type="submit" class="btn btn-danger btn-sm fs-9" style="padding-right: 5px">
                                                    <span class="indicator-label">
                                                        
                                                            
                                                        </span>
                                                        <span class="svg-icon svg-icon-primary svg-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Files/Deleted-file.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="" y="0" width="24" height="24"/>
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                            </g>
                                                            </svg><!--end::Svg Icon-->
                                                        </span>
                                                </button>  

                                        </form>
                                    
                                    </td>
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
        
        <div>
            


            
        </div>
        
    </div>
    

    <div class="card">
    
    </div>  
</div>







@endsection


@section('pagescript')
    <script>
        


    </script>


@stop
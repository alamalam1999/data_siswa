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
                                    <th class="min-w-80px w-150px sorting" rowspan="1" colspan="3" style="padding-left: 36px">Action</th>
                                   
                                        
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
                                    <td>
                                        <a href="{{ route('admin.masterupdate.class', $item->id) }}">
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-40px h-40px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                            <i class="bi bi-pencil-fill fs-5" style="color: #2dbe05"><span class="path1"></span><span class="path2"></span></i>
                                            <!--begin::Inputs-->
                                            <!--end::Inputs-->
                                        </label>
                                        </a>
                                        <!--end::Label-->
                                    </td>

                                    <td> 
                                        <!--begin::Cancel-->
                                        <form action="{{ route('admin.masterdelete.class') }}" method="POST" enctype="multipart/form-data" style="margin-right: 60px">
                                            {{ csrf_field() }}
                                        <input type="hidden" name="item_value" value="{{ $item->id }}">
                                        <button type="submit" span class="btn btn-icon btn-circle btn-active-color-primary w-40px h-40px bg-body shadow" data-kt-contacts-type="submit" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                                        <i class="bi bi-trash-fill fs-5" style="color: #ed1014;padding-right: 1px;padding-top: 1px;"><span class="path1"></span></i>
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
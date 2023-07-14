<?php $__env->startSection('title', __('labels.backend.access.ppdb.management') . ' | ' . __('labels.backend.access.ppdb.edit')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
            <div class="card border shadow-sm">
                        <div class="card-header bg-light">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">HISTORY SISWA</span><span style="color:#5a595a">History perpindahan kelas siswa</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                                    <div class="card-body" >
                                        <table id="myTable" class="table table-rounded border gy-2 gs-4 align-middle table-row-dashed fs-7 gy-5 dataTable no-footer">
                                            <thead class="bg-secondary text-white">
                                            <tr class="text-start text-gray-400 fw-bolder fs-9 text-uppercase gs-0">
                                                <th scope="col">No</th>
                                                <th scope="col">Kode Registrasi</th>
                                                <th scope="col">Unit</th>
                                                <th scope="col">Sekolah</th>
                                                <th scope="col">Kelas Utama</th>
                                                <th scope="col">Sub Kelas</th>
                                                <th scope="col">Kepala Sekolah</th>
                                                <th scope="col">Wali Kelas</th>
                                                <th scope="col">Wali Kelas 2</th>
                                                <th scope="col">Nisn</th>
                                                <th scope="col">Nis</th>
                                                <th scope="col">Nik Siswa</th>
                                                <th scope="col">Status Siswa</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Show Table</th>
                                                <th scope="col">Action</th>                    
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no = 1 ?>
                                                @foreach($data_kelas_for as $item) 
                                            <tr>
                                                <form action="{{ route('admin.ppdb.showclasses') }}" method="POST">
                                                    <?php echo e(csrf_field()); ?>
                                                    <td scope="row">{{ $no++ }}</td>
                                                    <td><input type="text" name="kode_registrasi" size="20" value="{{ $item->kode_registrasi}}"></td>
                                                    <td><input type="text" name="unit" size="4" value="{{ $item->unit }}"></td>
                                                    <td><input type="text" name="sekolah" size="6" value="{{ $item->sekolah }}"></td>
                                                    <td><input type="text" name="kelas_utama" size="4" value="{{ $item->kelas_utama }}"></td>
                                                    <td><input type="text" name="sub_kelas" size="4" value="{{ $item->sub_kelas }}"></td>
                                                    <td><input type="text" name="nama_kepala_sekolah" size="20" value="{{ $item->nama_kepala_sekolah }}"></td>
                                                    <td><input type="text" name="nama_wali_kelas" size="20" value="{{ $item->nama_wali_kelas }}"></td>
                                                    <td><input type="text" name="nama_wali_kelas_2" size="20" value="{{ $item->nama_wali_kelas_2 }}"></td>
                                                    <td><input type="text" name="nisn" size="4" value="{{ $item->nisn }}"></td>
                                                    <td><input type="text" name="nis" size="4" value="{{ $item->nis }}"></td>
                                                    <td><input type="text" name="nik_siswa" size="4" value="{{ $item->nik_siswa }}"></td>
                                                    <td><input type="text" name="status_siswa" size="4" value="{{ $item->status_siswa }}"></td>
                                                    <td><input type="text" name="keterangan" size="4" value="{{ $item->keterangan }}"></td>
                                                    <td>
                                                        <input type="hidden" name="id_classes" value="{{ $item->id }}">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" name="aktivasi" id="flexSwitchCheckDefault" {{  $item->show_table == 1 ? "checked" : '' }}>
                                                            </div>
                                                    </td>
                                                    <td><Button class="submit">Show Up</Button></td>
                                                </form>
                                            </tr>
                                            @endforeach                                     
                                            </tbody>
                                        </table>                              
                                    </div>                             
              </div>     

   
<?php $__env->stopSection(); ?>




<?php $__env->startPush('after-scripts'); ?>

<script> 

    $(document).ready(function() {
    var table = $('#myTable').DataTable( {
        scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            left: 0
        }
        } );
    } );

    

</script>
@section('pagescript')


@stop

@endpush


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ppdb\resources\views/backend/ppdb/edit.blade.php ENDPATH**/ ?>

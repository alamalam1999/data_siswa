

<?php $__env->startSection('title', app_name() . ' | ' . __('navs.general.home')); ?>

<?php $__env->startSection('content'); ?>

<body class="dashboardawal" 
style="
background: linear-gradient(
    90deg,
    rgba(255, 255, 255, 1) 0%,
    rgba(243, 225, 244, 1) 100%
  );">
    

<!-- Header  ============================================= -->
<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-fixed dark no-background bootsnav">

        <div class="container">

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
           
        </div>

    </nav>
    <!-- End Navigation -->

</header>
<!-- End Header -->


<!-- Start Banner 
    ============================================= -->

<div style="margin-top: 0px">

                    <div class="row item-flex center">

                        <div class="col-md-7" style="padding-left: 130px;padding-bottom: 30px">
                          
                            <img src="{{ asset('assets/media/logos/background2.png') }}" width="520" height="520" style="vertical-align:middle;margin:-25px 0px">
                        </div>

                       
                        <div class="col-md-4" style="right:40px">
                            <form action="{{ route('frontend.auth.carisiswa') }}" method="post">
                                {{ csrf_field() }}
                            <h3 class="card-title">Pencarian Data Siswa</h3>
                                <div class="progress my-2" style="display: none">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        <span class="sr-only">100% Complete</span>
                                    </div>
                                </div>
                                <div class="card alert hidden">
                                    <label class="mt-1 small">
                                        <i class="mdi mdi-alert"></i>
                                        <b>Peringatan!</b>
                                        <span class="message"></span>
                                    </label>
                                </div>
   
                                <div class="form-group">
                                    <label>
                                        <b>Nama Siswa</b>
                                    </label>
                                    <input name="nama" maxlength="50" id="nopes" class="form-control" tabindex="1" placeholder="Tuliskan Nama Siswa" type="text" value="" autocomplete="false" required>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <b>Nomor NISN</b>
                                    </label>
                                    <input name="nisn" maxlength="50" id="nopes" class="form-control" tabindex="1" placeholder="Tuliskan NISN Siswa" type="text" value="" autocomplete="false" required>
                                </div>
    
                                <div class="form-group">
                                    <label>
                                        <b>Kode Siswa</b>
                                    </label>
                                    <input name="kode_siswa" maxlength="50" id="nopes" class="form-control" tabindex="1" placeholder="Tuliskan Kode Siswa" type="text" value="" autocomplete="false" required>
                                </div>

                                <!-- footer -->
                                <div class="row">
                                    <div class="col-5">
                                        <p class="large mt-5 text-center">
                                            <button type="submit">
                                                <b><u>Cari Siswa</u></b>
                                            </button>
                                        </p>
                                    </div>                        
                                </div>
                            </form>
                        </div>
                    </div>
                    <footer class="">
                        
                        <!-- Start Footer Bottom -->
                        <div class="footer-bottom">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <p>© Copyright 2022. All Rights Reserved by Dept. Transformasi Digital BPS YPAP</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Footer Bottom -->
                    </footer>
</div>
            


<!-- End Banner -->
</body>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ppdb\resources\views/frontend/index.blade.php ENDPATH**/ ?>
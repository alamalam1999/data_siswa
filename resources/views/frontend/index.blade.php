<?php $__env->startSection('title', app_name() . ' | ' . __('navs.general.home')); ?>

<?php $__env->startSection('content'); ?>
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
<div class="banner-area standard text-default bg-gray-hard" style="padding-top: 100px">

    
                    <div class="row item-flex center">

                        <div class="col-md-7" style="padding-left: 140px">
                          
                            <img src="{{ asset('assets/media/logos/pak tomz.png') }}" width="750" height="500" style="vertical-align:middle;margin:-50px 0px">
                        </div>

                       
                        <div class="col-md-4" style="right: 20px">
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

                            <form id="form1" name="form1" onsubmit="return false">
                                <div class="form-group">
                                    <label>
                                        <b>Nama Siswa</b>
                                    </label>
                                    <input name="keyword" maxlength="50" id="nopes" class="form-control" tabindex="1" placeholder="Tuliskan Nama Siswa" type="text" value="" autocomplete="false">
                                </div>

                                <form id="form1" name="form1" onsubmit="return false">
                                    <div class="form-group">
                                        <label>
                                            <b>Nomor NISN</b>
                                        </label>
                                        <input name="keyword" maxlength="50" id="nopes" class="form-control" tabindex="1" placeholder="Tuliskan NISN Siswa" type="text" value="" autocomplete="false">
                                    </div>
    
                                    <form id="form1" name="form1" onsubmit="return false">
                                        <div class="form-group">
                                            <label>
                                                <b>Kode Siswa</b>
                                            </label>
                                            <input name="keyword" maxlength="50" id="nopes" class="form-control" tabindex="1" placeholder="Tuliskan Kode Siswa" type="text" value="" autocomplete="false">
                                        </div>
    

                                <!-- footer -->
                                <div class="row">
                                    <div class="col-5">
                                        <p class="large mt-5 text-center">
                                            <a href="/" class="text-primary">
                                                <b>
                                                    <u>Cari Siswa</u>
                                                </b>
                                            </a>
                                        </p>
                                    </div>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner -->

<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="bottom: 50px";>
                <div class="text-center">
                    <b><p>© Copyright 2023. All Rights Reserved by <a href="https://sekolah-avicenna.sch.id/">Dept. Transformasi Digital BPS YPAP</a></p></b>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ppdb\resources\views/frontend/index.blade.php ENDPATH**/ ?>
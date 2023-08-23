@extends('frontend.layouts.layout')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
<!-- Header  ============================================= -->

<!-- End Header -->


<!-- Start Banner 
    ============================================= -->
<div class="banner-area  text-default bg-gray-hard">
    <div class="item">
        <div class="box-table">
            <div class="box-cell">
                <div class="container">
                    <div class="row item-flex center">
                        <div class="col-md-6">
                            <div class="content-box">
                                <img src="{{ asset('assets/media/logos/background2.png') }}" width="520" height="520" style="vertical-align:middle;margin:-25px 0px">

                            </div>
                        </div>
                        <div class="col-md-6">
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
                                        <b>Nomor Induk Sekolah Nasional (NISN)</b>
                                    </label>
                                    <input name="nisn" maxlength="50" id="nopes" class="form-control" tabindex="1" placeholder="Tuliskan NISN Siswa" type="text" value="" autocomplete="false" required>
                                </div>
    
                                <div class="form-group">
                                    <label>
                                        <b>Nomor Induk Sekolah (NIS)</b>
                                    </label>
                                    <input name="nis" maxlength="50" id="nopes" class="form-control" tabindex="1" placeholder="Tuliskan NIS Siswa" type="text" value="" autocomplete="false" required>
                                </div>

                                <div class="row form-group">
                                    <div class="{{ $errors->has('captcha') ? ' has-error' : '' }}">  
                                                <div class="col-md-6 captcha thumbs-up">       
                                                    <span class="spans-up">{!! captcha_img() !!}</span> 
                                                    <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>           
                                                </div>  
                                                <div class="col-md-6">     
                                                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">     
                                                </div>            
                                                @if ($errors->has('captcha'))        
                                                    <span class="help-block">          
                                                        <strong>{{ $errors->first('captcha') }}</strong>       
                                                    </span>       
                                                @endif               
                                    </div>
                                </div>
                                <div class="form-group">      
                                    <input type="submit" class="center-block" value="Cari Siswa">                     
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
        <div class="text-center">
            <p>© Copyright 2023. All Rights Reserved by Dept. Transformasi Digital BPS YPAP</p>
        </div>
    </div><!-- /.navbar-collapse -->
</div>
<!-- End Banner -->

    <script type="text/javascript">
    $(".btn-refresh").click(function(){  
      $.ajax({  
         type:'GET',
         url:'/refresh_captcha',
         success:function(data){
            $(".captcha span").html(data.captcha); 
         }    
      });     
    });
    </script>


@endsection
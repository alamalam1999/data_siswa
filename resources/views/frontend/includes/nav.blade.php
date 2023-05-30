<nav class="navbar navbar-expand-md main-nav navigation fixed-top sidebar-left" style="display:none;">
    <div class="container">
        <button class="navbar-toggler" type="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a href="##main" class="navbar-brand">

            <img src="{{ asset('assets/media/logos/logo-avicenna-ppdb.png') }}" alt="Avicenna" class="logo logo-sticky"> //

        </a>

        <div class="collapse navbar-collapse" id="main-navbar">
            <div class="sidebar-brand">
                <a href="#index.html">
                    <img src="{{ asset('assets/media/logos/logo-avicenna-ppdb.png') }}" alt="Avicenna Template" class="logo" width="226" height="50">
                </a>
            </div>

            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link scrollto" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link scrollto" href="#features">Features</a></li>
                <li class="nav-item"><a class="nav-link scrollto" href="#product">Product</a></li>
                <li class="nav-item"><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
                <li class="nav-item"><a class="nav-link scrollto" href="#trial">Trial</a></li>
            </ul>
        </div>
    </div>

</nav>


<div class="top-bar-area address-one-lines bg-dark text-light">
    <div class="container">
        <div class="row align-center" style="padding-bottom: 5px">
            <div class="col-md-10 address-info" style="right: 90px; top:3px">
                <div class="info box">
                    <ul>
                        <img src="{{ asset('assets/media/logos/logo-avicenna-ppdb.png') }}" class="logo" alt="Logo" width="750" height="50" style="margin-bottom: 1px">
                        
                           
    
                        
                            
                           
                        
                    </ul>
                </div>
            </div>
            @guest
                <div class="text-right col-md-2" style="padding-top: 14px;left: 100px;">
                    
                    <h5><b><a href="{{ route('frontend.auth.login') }}" style="padding-right: 30px;padding-bottom: 50px">
                        <span style="color:rgb(152, 6, 123);bottom: 50px"><i class="fas fa-user"></span></i>
                        <span style="color:rgb(152, 6, 123);bottom: 50pxs">Login Admin</span></b></a></h5>
                </div>
            @else
                <div class="simple-link text-right col-md-5">
                    <a href="{{ route('frontend.user.account') }}"><i class="fas fa-user"></i>
                        {{ $logged_in_user->name }}</a>
                    <a href="{{ route('admin.dashboard') }}"><i class="fas fa-edit"></i> Dashboard</a>
                </div>
            @endguest
        </div>
    </div>
</div>
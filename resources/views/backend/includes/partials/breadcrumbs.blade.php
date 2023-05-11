@if($breadcrumbs)
<div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-bold px-2 px-lg-0 text-gray-100">



<ol class="breadcrumb">
    <!-- <li class="breadcrumb-item page-heading d-flex text-white fw-bold fs-3">Home</li> -->

    @foreach($breadcrumbs as $breadcrumb)
    @if($breadcrumb->url && !$loop->last)
    <li class="breadcrumb-item">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ $breadcrumb->url }}" class="menu-link fs-4 text-white me-2">
                <span class="menu-title">{{ $breadcrumb->title }}</span>
                <span class="menu-arrow d-lg-none"></span>
            </a>
            <!--end:Menu link-->
        </div>
    </li>
    @else
    <li class="breadcrumb-item">
        <div class="menu-item active">
            <!--begin:Menu link-->
            <span class="menu-link fs-4 text-white me-2">
                <span class="menu-title">{{ $breadcrumb->title }}Pangkalan Data Siswa Avicenna</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>
            <!--end:Menu link-->
        </div>
    </li>
    @endif
    @endforeach

    @yield('breadcrumb-links')
</ol>

</div>
@endif
 @if($errors->any())
 <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mb-10">
     <span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0">
         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
             <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="currentColor"></path>
             <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="currentColor"></path>
         </svg>
     </span>
     <div class="d-flex flex-column pe-0">
     @foreach($errors->all() as $error)
     {!! $error !!}<br />
     @endforeach
     </div>
     <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
         <span class="svg-icon svg-icon-1 svg-icon-danger">
             <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                 <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
             </svg>
         </span>
     </button>
 </div>
 @elseif(session()->get('flash_success'))
 <div class="alert alert-success" role="alert">
     <button type="button" class="btn btn-icon close" data-dismiss="alert" aria-label="Close">
        <span class="svg-icon svg-icon-1 svg-icon-success">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
            </svg>
        </span>
     </button>

     @if(is_array(json_decode(session()->get('flash_success'), true)))
     {!! implode('', session()->get('flash_success')->all(':message<br />')) !!}
     @else
     {!! session()->get('flash_success') !!}
     @endif
 </div>
 @elseif(session()->get('flash_warning'))
 <div class="alert alert-warning" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>

     @if(is_array(json_decode(session()->get('flash_warning'), true)))
     {!! implode('', session()->get('flash_warning')->all(':message<br />')) !!}
     @else
     {!! session()->get('flash_warning') !!}
     @endif
 </div>
 @elseif(session()->get('flash_info'))
 <div class="alert alert-info" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>

     @if(is_array(json_decode(session()->get('flash_info'), true)))
     {!! implode('', session()->get('flash_info')->all(':message<br />')) !!}
     @else
     {!! session()->get('flash_info') !!}
     @endif
 </div>
 @elseif(session()->get('flash_danger'))
 <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mb-10">
     <span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0">
         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
             <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="currentColor"></path>
             <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="currentColor"></path>
         </svg>
     </span>
     <div class="d-flex flex-column pe-0 pe-sm-10">
         @if(is_array(json_decode(session()->get('flash_danger'), true)))
         {!! implode('', session()->get('flash_danger')->all(':message<br />')) !!}
         @else
         {!! session()->get('flash_danger') !!}
         @endif
     </div>
     <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
         <span class="svg-icon svg-icon-1 svg-icon-danger">
             <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                 <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
             </svg>
         </span>
     </button>
 </div>
 @elseif(session()->get('flash_message'))
 <div class="alert alert-info" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>

     @if(is_array(json_decode(session()->get('flash_message'), true)))
     {!! implode('', session()->get('flash_message')->all(':message<br />')) !!}
     @else
     {!! session()->get('flash_message') !!}
     @endif
 </div>
 @endif
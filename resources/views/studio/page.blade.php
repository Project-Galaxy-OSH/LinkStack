<?php use App\Models\UserData; ?>
@extends('layouts.sidebar')

@section('content')

<div class="conatiner-fluid content-inner mt-n5 py-0">
  <div class="row">   
      
   <div class="col-lg-12">
      <div class="card   rounded">
          <div class="card-body">
             <div class="row">
                 <div class="col-sm-12">  

                  <style>
                    .ck-editor__editable[role="textbox"] {
                        /* editing area */
                        min-height: 200px;
                    }
                
                    .ck-content .image {
                        /* block images */
                        max-width: 80%;
                        margin: 20px auto;
                    }
                
                </style>
                <style>
                    @supports (-webkit-appearance: none) or (-moz-appearance: none) {
                      input[type=checkbox],
                      input[type=radio] {
                      --active: var(--bs-primary);
                      --active-inner: #fff;
                      --focus: 2px var(--bs-primary);
                      --border: #BBC1E1;
                      --border-hover: var(--bs-primary);
                      --background: #fff;
                      --disabled: #F6F8FF;
                      --disabled-inner: #E1E6F9;
                      -webkit-appearance: none;
                      -moz-appearance: none;
                      height: 21px;
                      outline: none;
                      display: inline-block;
                      vertical-align: top;
                      position: relative;
                      margin: 0;
                      cursor: pointer;
                      border: 1px solid var(--bc, var(--border));
                      background: var(--b, var(--background));
                      transition: background 0.3s, border-color 0.3s, box-shadow 0.2s;
                      }
                    input[type=checkbox]:after,
                    input[type=radio]:after {
                        content: "";
                        display: block;
                        left: 0;
                        top: 0;
                        position: absolute;
                        transition: transform var(--d-t, 0.3s) var(--d-t-e, ease), opacity var(--d-o, 0.2s);
                      }
                      input[type=checkbox]:checked,
                    input[type=radio]:checked {
                        --b: var(--active);
                        --bc: var(--active);
                        --d-o: .3s;
                        --d-t: .6s;
                        --d-t-e: cubic-bezier(.2, .85, .32, 1.2);
                      }
                      input[type=checkbox]:disabled,
                    input[type=radio]:disabled {
                        --b: var(--disabled);
                        cursor: not-allowed;
                        opacity: 0.9;
                      }
                      input[type=checkbox]:disabled:checked,
                    input[type=radio]:disabled:checked {
                        --b: var(--disabled-inner);
                        --bc: var(--border);
                      }
                      input[type=checkbox]:disabled + label,
                    input[type=radio]:disabled + label {
                        cursor: not-allowed;
                      }
                      input[type=checkbox]:hover:not(:checked):not(:disabled),
                    input[type=radio]:hover:not(:checked):not(:disabled) {
                        --bc: var(--border-hover);
                      }
                      input[type=checkbox]:focus,
                    input[type=radio]:focus {
                        box-shadow: 0 0 0 var(--focus);
                      }
                      input[type=checkbox]:not(.switch),
                    input[type=radio]:not(.switch) {
                        width: 21px;
                      }
                      input[type=checkbox]:not(.switch):after,
                    input[type=radio]:not(.switch):after {
                        opacity: var(--o, 0);
                      }
                      input[type=checkbox]:not(.switch):checked,
                    input[type=radio]:not(.switch):checked {
                        --o: 1;
                      }
                      input[type=checkbox] + label,
                    input[type=radio] + label {
                        font-size: 14px;
                        line-height: 21px;
                        display: inline-block;
                        vertical-align: top;
                        cursor: pointer;
                        margin-left: 4px;
                      }
                    
                      input[type=checkbox]:not(.switch) {
                        border-radius: 7px;
                      }
                      input[type=checkbox]:not(.switch):after {
                        width: 5px;
                        height: 9px;
                        border: 2px solid var(--active-inner);
                        border-top: 0;
                        border-left: 0;
                        left: 7px;
                        top: 4px;
                        transform: rotate(var(--r, 20deg));
                      }
                      input[type=checkbox]:not(.switch):checked {
                        --r: 43deg;
                      }
                      input[type=checkbox].switch {
                        width: 38px;
                        border-radius: 11px;
                      }
                      input[type=checkbox].switch:after {
                        left: 2px;
                        top: 2px;
                        border-radius: 50%;
                        width: 15px;
                        height: 15px;
                        background: var(--ab, var(--border));
                        transform: translateX(var(--x, 0));
                      }
                      input[type=checkbox].switch:checked {
                        --ab: var(--active-inner);
                        --x: 17px;
                      }
                      input[type=checkbox].switch:disabled:not(:checked):after {
                        opacity: 0.6;
                      }
                    
                      input[type=radio] {
                        border-radius: 50%;
                      }
                      input[type=radio]:after {
                        width: 19px;
                        height: 19px;
                        border-radius: 50%;
                        background: var(--active-inner);
                        opacity: 0;
                        transform: scale(var(--s, 0.7));
                      }
                      input[type=radio]:checked {
                        --s: .5;
                      }
                    }
                    .txt-label{
                        color: white;
                        padding-left: 5px;
                        font-size: 200%;
                        position: relative;
                    }
                    .toggle-btn{
                        padding-left: 20px;
                    }
                    .ch2{
                        padding-top: 60px;
                    }
                    </style>
                <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                  @if(file_exists(base_path(findAvatar(Auth::user()->id))))
                  <img src="{{ url(findAvatar(Auth::user()->id)) }}" class="img-fluid rounded-pill avatar-100 bg-white" width="100" height="100" draggable="false" style="object-fit:cover;">
                  @elseif(file_exists(base_path("assets/linkstack/images/").findFile('avatar')))
                  <img src="{{ url("assets/linkstack/images/")."/".findFile('avatar') }}" class="img-fluid rounded-pill avatar-100 bg-white" width="100" height="100" draggable="false">
                  @else
                  <img src="{{ asset('assets/linkstack/images/logo.svg') }}" class="img-fluid rounded-pill avatar-100 bg-white" width="100" height="100" draggable="false">
                  @endif
                  @if(file_exists(base_path(findAvatar(Auth::user()->id))))
                  <div class="upload-icone bg-primary">
                    <a href="{{ route('delProfilePicture') }}" style="top:1px;position:relative;" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete profile picture"><i class="bi bi-trash-fill text-white"></i></a>
                    <input class="file-upload" type="file" accept="image/*">
                  </div>
                  @endif
                </div>                
                <section class='text-gray-400'>
                <h3 class="mb-4 card-header"><i class="bi bi-file-earmark-break"> My Profile</i></h3>
                <div>
                
                <div></div>
                @foreach($pages as $page)
                <form action="{{ route('editPage') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @if($page->littlelink_name != '')
                    <div class="form-group col-lg-8">
                      <label class="form-label" for="customFile">Profile Picture</label>
                      <input type="file" accept="image/jpeg,image/jpg,image/png" name="image" class="form-control" id="customFile">
                  </div>
                    @endif
                
                    <!--<div class="form-group col-lg-8">
                            <label>Path name</label>
                            @<input type="text" class="form-control" name="pageName" value="{{ $page->littlelink_name ?? '' }}">
                          </div>-->
                
                    <div class="form-group col-lg-8">
                        <?php
                            $url = $_SERVER['REQUEST_URI'];
                             if( strpos( $url, "no_page_name" ) == true ) echo '<span style="color:#FF0000; font-size:120%;">You do not have a Page URL</span>'; ?>
                        <br>
                        <label>Page URL</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="d-none d-md-block input-group-text">{{ url('') }}/@</div>
                              <div class="d-md-none input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" name="littlelink_name" value="{{ $page->littlelink_name ?? '' }}" required>
                        </div>
                
                         <label style="margin-top:15px">Display name</label>
                        <div class="input-group">
                            {{-- <div class="input-group-prepend">
                                <div class="input-group-text">Name:</div>
                            </div> --}}
                            <input type="text" class="form-control" name="name" value="{{ $page->name }}" required>
                        </div>
                    </div>
                
                    <div class="form-group col-lg-8">
                        <label>Page Description</label>
                        <textarea class="form-control @if(env('ALLOW_USER_HTML') === true) ckeditor @endif" name="pageDescription" rows="3">{{ $page->littlelink_description ?? '' }}</textarea>
                    </div>
                
                    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'vip')
                        <div class="form-group col-lg-8">
                        <h5 style="margin-top:50px">Show checkmark</h5>
                        <p class="text-muted">You are a verified user. This setting allows you to hide your checkmark on your page.</p>
                          <div class="mb-3 form-check form-switch">
                            <input name="checkmark" class="switch toggle-btn" type="checkbox" id="checkmark" <?php if(UserData::getData(Auth::user()->id, 'checkmark') == true){echo 'checked';} ?> />
                            <label class="form-check-label" for="checkmark">Enable</label>
                          </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @endif
                    @endforeach

                    <div class="form-group col-lg-8">
                      <h5 style="margin-top:50px">Show share button</h5>
                      <p class="text-muted">This setting allows you to hide the share button on your page.</p>
                        <div class="mb-3 form-check form-switch">
                          <input name="sharebtn" class="switch toggle-btn" type="checkbox" id="sharebtn" <?php if(UserData::getData(Auth::user()->id, 'disable-sharebtn') != "true"){echo 'checked';} ?> />
                          <label class="form-check-label" for="sharebtn">Enable</label>
                        </div>

                    <button type="submit" class="mt-3 ml-3 btn btn-primary">Save</button>
                </form>

                @if(env('ALLOW_USER_HTML') === true)
                <script src="{{ asset('assets/external-dependencies/ckeditor.js') }}"></script>
                <script>
                    ClassicEditor
                        .create(document.querySelector('.ckeditor'), {
                
                            toolbar: {
                                items: [
                                    'exportPDF', 'exportWord', '|'
                                    , 'findAndReplace', 'selectAll', '|'
                                    , 'heading', '|'
                                    , 'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|'
                                    , 'bulletedList', 'numberedList', 'todoList', '|'
                                    , 'outdent', 'indent', '|'
                                    , 'undo', 'redo'
                
                                    , 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|'
                                    , 'alignment', '|'
                                    , 'link', 'blockQuote', '|'
                                    , 'specialCharacters', 'horizontalLine', '|'
                                    , 'textPartLanguage', '|'
                                ]
                                , shouldNotGroupWhenFull: true
                            }
                            , fontFamily: {
                                options: [
                                    'default'
                                    , 'Arial, Helvetica, sans-serif'
                                    , 'Courier New, Courier, monospace'
                                    , 'Georgia, serif'
                                    , 'Lucida Sans Unicode, Lucida Grande, sans-serif'
                                    , 'Tahoma, Geneva, sans-serif'
                                    , 'Times New Roman, Times, serif'
                                    , 'Trebuchet MS, Helvetica, sans-serif'
                                    , 'Verdana, Geneva, sans-serif'
                                ]
                                , supportAllValues: true
                            },
                 fontSize: {
                 options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                 supportAllValues: true
                 },
                
                        })
                        .catch(error => {
                            console.error(error);
                        });
                
                </script>
                
                @endif
                </div>
                
                </div>
                </section>

                 </div>
             </div>
          </div>
       </div>
      </div>
    </div>
  </div>

@endsection

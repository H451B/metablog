@php
    $setting = App\Models\Setting::first(); // Assuming there's only one settings record
@endphp

<nav class="navbar navbar-expand-lg main">
    <div class="container">
        {{-- <a class="navbar-brand" href="{{route('home.index')}}"><img src="images/logo.png" alt="Logo"></a> --}}
        <a class="navbar-brand" href="{{route('home.index')}}"><img src="{{ asset('storage/setting/logo/' . $setting->logo) }}" alt="Logo" class="img-fluid" width="50px"></a>
        {{-- <span class="main_spn">Meta<b>Blog</b></span> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home.index')}}">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.blogs')}}">blog</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="singlePost.html">single post</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.author')}}">Author</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">contact</a>
                </li>
            </ul>
            <div class="close">
                <div class="menu">
                    <input type="text" class="my_input" placeholder="search">
                    <i class="fa fa-search" id="my_search"></i>
                </div>
            </div>
            <div class="switch_bg" name="theme">
                <i class="fa fa-snowflake-o" aria-hidden="true" id="switch_icon"></i>
            </div>
        </div>
    </div>
</nav>
<x-ui.layouts.master>
    <!-- banner part start -->
    <section id="banner" class="mt-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner_main">
                        <img src="{{asset('storage/setting/banner/'.$banner)}}" class="w-100" alt="banner">
                        {{-- <a href="{{ route('home.showBlog', $featuredBlog->slug) }}"> --}}
                            <div class="banner_item">
                                <a href="#">{{$featuredBlog->category ? $featuredBlog->category->title :
                                    'Uncategorized'}}</a>

{{-- <a href="{{ route('home.showBlog', $featuredBlog->slug) }}"> --}}
                                <h1 class="mt-2">
                                    {{$featuredBlog->title}}
                                </h1>
{{-- </a> --}}
                                <div class="banner_item_author mt-4">
                                    {{-- <img src="{{asset('storage/user/photo/'.$featuredBlog->author->photo)}}"
                                        alt="banner_author"> --}}
                                    {{-- @dd($featuredBlog->author->photo) --}}
                                    <img src="{{ $featuredBlog->author && $featuredBlog->author->photo ? asset('storage/user/photo/' . $featuredBlog->author->photo) : asset('images/default-author.png') }}"
                                        alt="banner_author">
                                    <span class="author_name">{{$featuredBlog->author->name}}</span>
                                    <span class="author_name ms-1">{{$featuredBlog->created_at->format('M d,
                                        Y')}}</span>
                                </div>
                            </div>
                        {{-- </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part end -->

    <!-- advertisement part start -->
    <section>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="advertisement_main">
                    <h6>Advertisement</h6>
                    <h5>You can place ads</h5>
                    <h4>750x100</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- advertisement part end -->

    <!-- latest post start -->
    @include('ui.partials.latest-post')
    <!-- latest post end -->

    <!-- advertisement part start -->
    <section>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="advertisement_main">
                    <h6>Advertisement</h6>
                    <h5>You can place ads</h5>
                    <h4>750x100</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- advertisement part end -->
</x-ui.layouts.master>
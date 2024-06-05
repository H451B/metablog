<x-ui.layouts.master>
    <!-- bannerTwo part start -->
    <section id="bannerTwo" class="mt-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 py-2">
                    <div class="banner_up">
                        <h1 class="text-center">Blog</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="banner_down"
                        style="background: url('{{ asset('storage/setting/banner/' . $banner) }}') no-repeat center / cover;">
                        <div class="banner_two_item">
                            <a href="#">{{$featuredBlog->category->title}}</a>
                            <h1 class="mt-2">{{$featuredBlog->title}}</h1>
                            <div class="banner_item_author mt-4">
                                <img src="{{asset('storage/user/photo/'.$featuredBlog->author->photo)}}" alt="banner2_author">
                                <span class="author_name">{{$featuredBlog->author->name}}</span>
                                <span class="author_name ms-1">{{$featuredBlog->created_at->format('D M, Y')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- bannerTwo part end -->

    <!-- latest post start -->
    <section id="latest_post">
        <div class="container">
            <div class="row">
                @forelse ($blogs as $blog)
                <div class="col-xl-4 col-lg-6 col-md-6 mt-4">
                    <div class="latest_main">
                        <div class="latest_image">
                            <img src="{{ $blog->banner ? asset('storage/blog/banner/' . $blog->banner) : asset('images/default_banner.png') }}"
                            class="w-100" alt="{{ $blog->title }}" class="w-100" alt="latest1">
                        </div>
                        <div class="latest_text mt-2">
                            <a href="#" class="latest_cat">{{$blog->category->title}}</a>
                            <br>
                            <a href="{{ route('home.showBlog', $blog->slug) }}">
                            <h3>{{$blog->title}}</h3>
                            </a>
                            <div class="banner_item_author mt-4">
                                <img src="{{ $blog->author && $blog->author->photo ? asset('storage/user/photo/' . $blog->author->photo) : asset('images/default_author.png') }}"
                                            alt="{{ $blog->author ? $blog->author->name : 'Unknown Author' }}">
                                <span class="author_name">{{$blog->author ? $blog->author->name : 'Unknown
                                    Author'}}</span>
                                <span class="author_name ms-1">{{$blog->created_at->format('D M, Y')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p>Currently no post</p>
                @endforelse

            </div>
        </div>
    </section>
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
@php
$blogs = App\Models\Blog::select(['id','slug', 'title', 'banner', 'user_id', 'blog_category_id', 'created_at'])
->with(['author:id,name,photo', 'category:id,title'])
->latest()
->take(9)
->get();
@endphp

<section id="latest_post">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="pb-1">Latest Post</h3>
                <div class="row">
                    @forelse ($blogs as $blog)
                    <div class="col-xl-4 col-lg-6 col-md-6 mt-4">
                        <div class="latest_main">
                            <div class="latest_image">
                                <a href="{{ route('home.showBlog', $blog->slug) }}"><img
                                        src="{{ $blog->banner ? asset('storage/blog/banner/' . $blog->banner) : asset('images/default_banner.png') }}"
                                        class="w-100" alt="{{ $blog->title }}" class="w-100" alt="latest1"></a>
                            </div>
                            <div class="latest_text mt-2">
                                <a href="" class="latest_cat">{{$blog->category->title}}</a>
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
        </div>
    </div>
</section>
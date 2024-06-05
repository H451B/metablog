<x-ui.layouts.master>
    <!-- post part start -->
    <section id="post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="banner_two_item">
                        <a href="#">{{$blog->category->title}}</a>
                        <h1 class="mt-2">{{$blog->title}}</h1>
                        <div class="banner_item_author mt-4">
                            <img src="{{asset('storage/user/photo/'.$blog->author->photo)}}" alt="post_author">
                            <span class="author_name">{{$blog->author->name}}</span>
                            <span class="author_name ms-1">{{$blog->created_at->format('M D, Y')}}</span>
                        </div>
                    </div>
                    <div class="post_img my-4">
                        <img src="{{asset('storage/blog/banner/'.$blog->banner)}}" class="w-100" alt="post_image">
                    </div>
                    <div class="post_text">{!!$blog->article!!}</div>
                </div>
            </div>
        </div>
    </section>
    <!-- post part end -->

    <!-- advertisement part start -->
    <section>
        <div class="row justify-content-center">
            <div class="col-lg-7">

            </div>
        </div>
    </section>
    <!-- advertisement part end -->


</x-ui.layouts.master>
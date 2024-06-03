<x-admin.layouts.master title="Post">
    <div class="row">
        
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-body">
                    <div class="row d-flex justify-content-center text-center">
                        <h3>{{$blog->title}}</h3>
                        <h5>{{$blog->category_title}}</h5>
                        <p>Published: {{ $blog->formatted_created_at }}</p>
                        <hr>
                        <img src="/storage/blog/banner/{{ $blog->banner }}" alt="img" style="width: 300px">
                        <hr>
                        <!-- <div class="text-center"> -->
                            {!! $blog->article !!}
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layouts.master>
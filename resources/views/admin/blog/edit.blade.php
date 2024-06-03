<x-admin.layouts.master title="Create Blog">
    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <form id="blog-form" action="{{ route('blog.update',['blog'=>$blog]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3 row">
                            <label for="inputTitle" class="col-sm-3 col-form-label">
                                Title
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputTitle" placeholder="Title" name="title" value="{{$blog->title}}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputTitle" class="col-sm-3 col-form-label">
                                Write Post
                            </label>
                            <div class="col-sm-9">
                                <textarea id="summernote" name="article">{!!$blog->article!!}</textarea>
                                <!-- <input type="hidden" name="article" id="content-input" value="{{$blog->article}}"> -->
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputTitle" class="col-sm-3 col-form-label">
                                Select Category
                            </label>
                            <div class="col-sm-9">
                                <select name="blog_category_id" class="form-select" aria-label="Category select">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if($blog->blog_category_id == $category->id) selected @endif>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="inputBanner" class="col-sm-3 col-form-label">
                                Banner
                            </label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="inputBanner" name="banner" value="">
                            </div>
                            <div class="col-sm-3">
                                <img src="/storage/blog/banner/{{ $blog->banner }}" alt="img" style="width: 100px;height:100px">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-info w-100">
                                    Submit
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300, // set editor height
                callbacks: {
                    onChange: function(contents, $editable) {
                        $('#content-input').val(contents);
                    }
                }
            });

            // Initialize the hidden input with the initial content
            $('#content-input').val($('#summernote').summernote('code'));

            // Ensure the hidden input is updated on form submit
            $('#blog-form').on('submit', function() {
                $('#content-input').val($('#summernote').summernote('code'));
            });
        });
    </script>
</x-admin.layouts.master>
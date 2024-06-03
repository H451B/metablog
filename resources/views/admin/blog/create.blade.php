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

                    <form id="blog-form" action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="inputTitle" class="col-sm-3 col-form-label">
                                Title
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputTitle" placeholder="Title" name="title" value="" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputTitle" class="col-sm-3 col-form-label">
                                Write Post
                            </label>
                            <div class="col-sm-9">
                                <textarea id="summernote" name="article"></textarea>
                                <!-- <div id="summernote" name="article"></div> -->
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputTitle" class="col-sm-3 col-form-label">
                                Select Category
                            </label>
                            <div class="col-sm-9">
                                <select name="blog_category_id" class="form-select" aria-label="Category select">
                                <option>select</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputShowHome" class="col-sm-3 col-form-label">
                                Show Home
                            </label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="show_home" id="showHomeYes" value="1">
                                    <label class="form-check-label" for="showHomeYes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="show_home" id="showHomeNo" value="0">
                                    <label class="form-check-label" for="showHomeNo">No</label>
                                </div>
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
                                <img src="" alt="">
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
</x-admin.layouts.master>
<x-admin.layouts.master title="Blog">
    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <div class="row">
                        <div class="col">
                            <h5 class="card-title mb-0">Blog</h5>
                        </div>
                        <div class="col">
                            <h5 class="d-flex justify-content-center">Total {{ count($blogs) }} Posts</h5>
                        </div>
                        <div class="col">
                            <h5 class="pull-right d-flex justify-content-end">
                                <a href="{{ route('blog.create') }}">
                                    <button class="btn bg-success" style="color: white;">Create Post</button>
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>

                @if (session('message'))
                <div class="alert alert_success" id="alert">
                    <span class="close" data-dismiss='alert'></span>
                    <strong style="color: green; padding-left:1rem">{{ session('message') }}</strong>
                </div>
                @endif


                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Title</th>
                            <th>Show Home</th>
                            <th>Banner</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $key => $post)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="d-none d-xl-table-cell">{{ $post->title }}</td>
                            <td class="d-none d-xl-table-cell">
                                @if ($post->show_home == 1)
                                <span class="badge rounded-pill bg-success">Yes</span>
                                @else
                                <span class="badge rounded-pill bg-danger">No</span>
                                @endif
                            </td>
                            <td><img src="/storage/blog/banner/{{ $post->banner }}" alt="img" style="width: 70px;height:70px"></td>
                            <td>
                                @if ($post->status == 1)
                                <span class="badge rounded-pill bg-success">Active</span>
                                @else
                                <span class="badge rounded-pill bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>

                                <a class="btn btn-primary" href="{{ route('blog.show', ['blog' => $post->slug]) }}">Show </a>
                                <a class="btn btn-success" href="{{ route('blog.edit', ['blog' => $post->id]) }}">Edit </a>
                                <form style="display: inline" action="{{ route('blog.destroy', ['blog' => $post]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('are you really want to delete this')">Delete</button>

                                    @if ($post->status == 1)
                                    <a href="{{ route('blog.inactive', $post->id) }}" class="btn btn-primary" title="Inactive"><i class="fa-solid fa  fa-thumbs-up"></i></a>
                                    @else
                                    <a href="{{ route('blog.active', $post->id) }}" class="btn btn-primary" title="Active"><i class="fa-solid fa  fa-thumbs-down"></i></a>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-admin.layouts.master>
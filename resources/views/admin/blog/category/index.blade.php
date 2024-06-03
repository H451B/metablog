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

                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-5">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Blog Category Form</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="{{route('blog-category.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <label for="exampleInputEmail1">Catgories</label>
                                        <div class="form-group d-flex row">
                                            <input type="text" name="title" class="form-control m-2 col-sm-12" id="exampleInputEmail1" placeholder="Title">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Blog Category Table</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#Sl</th>
                                                <th class="text-center">Title</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $sl = 1;
                                            @endphp
                                            @foreach ($blogCategory as $category)
                                            <tr>
                                                <td>{{$sl++}}</td>
                                                <td>{{$category->title}}</td>
                                                <td>
                                                    <div class="d-flex justify-content-evenly">
                                                        <!-- start edit -->
                                                        <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <!-- edit modal -->
                                                        <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $category->id }}" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editModalLabel{{ $category->id }}">Edit {{ $category->title }}</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{route('blog-category.update',$category->id)}}" enctype="multipart/form-data" method="POST">
                                                                            @csrf
                                                                            @method('PATCH')
                                                                            <div class="card-body">
                                                                                <label for="exampleInputEmail1">Services</label>
                                                                                <div class="form-group d-flex row">
                                                                                    <input type="text" name="title" class="form-control m-2 col-sm-12" id="exampleInputEmail1" placeholder="Title" value="{{$category->title}}">
                                                                                </div>
                                                                            </div>
                                                                            <!-- /.card-body -->

                                                                            <div class="card-footer">
                                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end edit -->

                                                        <form action="{{route('blog-category.destroy', $category->id)}}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('are you really want to delete this')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>

                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/.col (right) -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layouts.master>
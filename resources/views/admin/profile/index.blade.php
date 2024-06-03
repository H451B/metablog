<x-admin.layouts.master title="Profile">
    <main class="content">
        <div class="container-fluid p-0">
            <div class="container">
                <div class="main-body">
                    <div class="row mb-3">
                        <p class="col-sm-2">Profile</p>
                        <a class="col-sm-2" href="{{route('change-password')}}">
                            Change Password
                        </a>
                    </div>
                    <div>
                        <form method="post" action="{{ route('profile.update', ['profile' => $user->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="{{ $user->photo ? asset('storage/user/photo/' . $user->photo) : asset('ui/backend/dist/img/user.jpg') }}"
                                                    alt="User photo" class="img-fluid rounded-circle mb-2" width="200"
                                                    height="200" />
                                                <div class="mt-3">
                                                    <h4>{{ $user->name }}</h4>
                                                    <p class="text-secondary mb-1">{{ $user->username }}</p>
                                                    <p class="text-muted font-size-sm">{{ $user->address }}</p>
                                                </div>
                                            </div>
                                            <hr class="my-4" />
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6">
                                                            <input type="text" name="facebook"
                                                                value="{{ old('facebook', optional($user->socialLinks)->facebook) }}"
                                                                class="form-control" placeholder="Facebook">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6">
                                                            <input type="text" name="twitter"
                                                                value="{{ old('twitter', optional($user->socialLinks)->twitter) }}"
                                                                class="form-control" placeholder="Twitter">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6">
                                                            <input type="text" name="instagram"
                                                                value="{{ old('instagram', optional($user->socialLinks)->instagram) }}"
                                                                class="form-control" placeholder="Instagram">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6">
                                                            <input type="text" name="youtube"
                                                                value="{{ old('youtube', optional($user->socialLinks)->youtube) }}"
                                                                class="form-control" placeholder="YouTube">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <textarea class="form-control" name="bio" rows="5"
                                                        placeholder="Bio">{{ old('bio', optional($user->socialLinks)->bio) }}</textarea>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">User Name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" name="username" class="form-control"
                                                        value="{{ $user->username }}" disabled />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Full Name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ old('name', $user->name) }}" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Email</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ old('email', $user->email) }}" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Phone</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="tel" name="phone" class="form-control"
                                                        value="{{ old('phone', $user->phone) }}" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Address</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control"
                                                        value="{{ old('address', $user->address) }}" name="address" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Change Photo</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="file" name="photo" class="form-control" id="image" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success px-4">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#show_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
</x-admin.layouts.master>
<x-admin.layouts.master title="Change Password">
    <main class="content">
        <div class="container-fluid p-0">
            <div class="container">
                <div class="main-body">
                    <div class="row mb-3">
                        <a class="col-sm-2" href="{{route('profile.index')}}">Profile</a>
                        <a class="col-sm-2">
                            Change Password
                        </a>
                    </div>
                    @if (session('confirmerror'))
                    <div class="alert alert-danger">{{ session('confirmerror') }}</div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('update-password') }}">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3">
                                    <label for="old_password" class="form-label">Old Password</label>
                                    <input type="password" name="old_password" class="form-control" id="old_password"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" name="new_password" class="form-control" id="new_password"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">Confirm New
                                        Password</label>
                                    <input type="password" name="new_password_confirmation" class="form-control"
                                        id="new_password_confirmation" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin.layouts.master>
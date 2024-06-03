<x-admin.layouts.master title="Create Role" back="roles.index">
    <div class="row d-flex justify-content-center">
        <div class="card col-sm-11 p-3">
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <form action="{{ route('roles.store') }}" method="post">
                @csrf

                <!-- role name -->
                <div class="row mb-3">
                    <div class="col-sm-3">New Role Name: </div>
                    <div class="col-sm-9">
                        <input style="background: whitesmoke" type="text" name="name" class="form-control"
                            placeholder="New Role" id="name">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- role permission -->
                <div class="row mb-3">
                    <p class="m-0"><strong>Grant Permission</strong></p>
                    @forelse ($groupedPermissions as $type => $permissions)
                        <div class="col-sm-3 shadow-sm m-3 p-3 bg-body-tertiary rounded">
                            <p><strong>{{ ucfirst($type) }}:</strong></p>
                            @foreach ($permissions as $permission)
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                {{ $permission->name }}<br>
                            @endforeach
                        </div>
                    @empty
                        <p>No Data</p>
                    @endforelse
                    @error('permissions')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary float-end">Submit</button>
            </form>
        </div>
    </div>
</x-admin.layouts.master>

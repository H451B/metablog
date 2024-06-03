<x-admin.layouts.master title="Setting">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('setting.storeOrUpdate') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3"><label for="logo">Company Logo</label></div>
                        <div class="col-sm-6">
                            <input type="file" name="logo" class="form-control-file">
                        </div>
                        <div class="col-sm-3">
                            @if($settings->logo)
                                <img src="{{ asset('storage/setting/logo/' . $settings->logo) }}" alt="Company Logo" class="img-thumbnail mb-2" style="max-height: 100px;">
                            @endif
                            
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3"><label for="home_banner">Home Banner</label></div>
                        <div class="col-sm-6">
                            <input type="file" name="home_banner" class="form-control-file">
                        </div>
                        <div class="col-sm-3">
                            @if($settings->home_banner)
                                <img src="{{ asset('storage/setting/banner/' . $settings->home_banner) }}" alt="Home Banner" class="img-thumbnail mb-2" style="max-height: 100px;">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3"><label for="short_description">Short Description</label></div>
                        <div class="col-sm-9">
                            <textarea name="short_description" class="form-control" rows="3">{{ old('short_description', $settings->short_description) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="phone_numbers">Phone Numbers</label>
                            <button type="button" class="btn btn-outline-primary" id="add-phone">Add</button>
                        </div>
                        <div class="col-sm-9">
                            <div id="phone-fields">
                                @if(!empty($settings->phone_numbers))
                                    @foreach($settings->phone_numbers as $phone)
                                        <div class="input-group mb-2">
                                            <input type="text" name="phone_numbers[]" class="form-control" value="{{ $phone }}" placeholder="Phone Number">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-danger remove-phone">Delete</button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="email_addresses">Email Addresses</label>
                            <button type="button" class="btn btn-outline-primary" id="add-email">Add</button>
                        </div>
                        <div class="col-sm-9">
                            <div id="email-fields">
                                @if(!empty($settings->email_addresses))
                                    @foreach($settings->email_addresses as $email)
                                        <div class="input-group mb-2">
                                            <input type="email" name="email_addresses[]" class="form-control" value="{{ $email }}" placeholder="Email Address">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-danger remove-email">Delete</button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save Settings</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#add-phone').click(function() {
                $('#phone-fields').append('<div class="input-group mb-2"><input type="text" name="phone_numbers[]" class="form-control" placeholder="Phone Number"><div class="input-group-append"><button type="button" class="btn btn-outline-danger remove-phone">Delete</button></div></div>');
            });

            $('#add-email').click(function() {
                $('#email-fields').append('<div class="input-group mb-2"><input type="email" name="email_addresses[]" class="form-control" placeholder="Email Address"><div class="input-group-append"><button type="button" class="btn btn-outline-danger remove-email">Delete</button></div></div>');
            });

            $(document).on('click', '.remove-phone', function() {
                $(this).closest('.input-group').remove();
            });

            $(document).on('click', '.remove-email', function() {
                $(this).closest('.input-group').remove();
            });
        });
    </script>
</x-admin.layouts.master>

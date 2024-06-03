<x-admin.layouts.master title="Setting">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3"><label for="logo">Company Logo</label></div>
                        <div class="col-sm-9"><input type="file" name="logo" class="form-control-file"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3"><label for="short_description">Short Description</label></div>
                        <div class="col-sm-9"><textarea name="short_description" class="form-control" rows="3"></textarea></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3"><label for="phone_numbers">Phone Numbers</label>
                                <button type="button" class="btn btn-outline-primary" id="add-phone">Add</button>
                            </div>
                            <div class="col-sm-9">
                                <div id="phone-fields">
                                    <!-- JavaScript will dynamically add phone number fields here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Email Addresses -->
                <div class="form-group">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3"><label for="email_addresses">Email Addresses</label>
                                <button type="button" class="btn btn-outline-primary" id="add-email">Add</button>
                            </div>
                            <div class="col-sm-9">
                                <div id="email-fields">
                                    <!-- JavaScript will dynamically add email address fields here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary">Save Settings</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#add-phone').click(function() {
                $('#phone-fields').append('<input type="text" name="phone_numbers[]" class="form-control mb-2" placeholder="Phone Number">');
            });

            $('#add-email').click(function() {
                $('#email-fields').append('<input type="email" name="email_addresses[]" class="form-control mb-2" placeholder="Email Address">');
            });
        });
    </script>


</x-admin.layouts.master>
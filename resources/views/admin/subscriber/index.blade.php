<x-admin.layouts.master title="Subscribers">
    <div class="row d-flex justify-content-end">
        <div class="card mx-3 col-sm-7">
            <div class="card-body">
                <form method="POST" action="{{route('subscribers.sendEmail')}}">
                    @csrf
                    @method('POST')

                    <!-- Subject Field -->
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" class="form-control" id="subject" required>
                    </div>

                    <!-- Body Field -->
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" class="form-control" id="body" rows="5" required></textarea>
                    </div>

                    <!-- Send Button -->
                    <button type="submit" class="btn btn-primary mt-3">Send Newsletter</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">

                @if (session('message'))
                <div class="alert alert_success" id="alert">
                    <span class="close" data-dismiss='alert'></span>
                    <strong style="color: green; padding-left:1rem">{{ session('message') }}</strong>
                </div>
                @endif

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Emails</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscribers as $key => $subscriber)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="d-none d-xl-table-cell">{{ $subscriber->email ?? 'error' }}</td>
                                <td>
                                    <form style="display: inline"
                                        action="{{ route('subscribers.destroy', ['subscriber' => $subscriber]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Do you really want to delete this')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-admin.layouts.master>
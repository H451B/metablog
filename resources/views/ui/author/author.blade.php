
<x-ui.layouts.master>
    <!-- author details part start -->
    <section id="author_details" class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="author_details_main">
                        <div class="author_inner">
                            <div class="author_up mb-4">
                                <div class="author_up_left">
                                    <img src="{{asset('storage/user/photo/'.$adminUser->photo)}}" class="img-fluid rounded" alt="author" width="50px">
                                </div>
                                <div class="author_up_right ps-3">
                                    <h5>{{$adminUser->name}}</h5>
                                    <h6>
                                        @foreach($adminUser->roles as $role)
                                            {{$role->name}}
                                        @endforeach
                                    </h6>
                                </div>
                            </div>
                            <h4>{{$adminUser->socialLinks->bio}}</h4>
                            <div class="author_icon mt-4">
                                <a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- author details part end -->

    <!-- latest post start -->
    @include('ui.partials.latest-post')
    <!-- latest post end -->
</x-ui.layouts.master>
<!DOCTYPE html>
<html lang="en" data-theme="light">
    <x-ui.layouts.partials.head />
<body>
    <!-- nav part start bg-body-tertiary -->
    <x-ui.layouts.partials.navbar />
    <!-- nav part end -->
    
    {{$slot}}
    

    <!-- footer part start -->
    <x-ui.layouts.partials.footer />
    <!-- footer part end -->
    <script src="{{asset('ui/frontend/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('ui/frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('ui/frontend/js/custom.js')}}"></script>
</body>
</html>

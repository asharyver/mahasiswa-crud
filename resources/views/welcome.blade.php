<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}
        
        <!-- Icons -->
        <link rel="stylesheet" href="{{ asset('vendors/@coreui/icons/css/coreui-icons.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}" />

        <!-- Main styles for this application-->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet" />
        <script>
        function asset() {
            return "{{ asset('') }}";
        }
        function appName() {
            return "{{ config('app.name') }}";
        }
        function baseUrl() {
            return "{{ url('/') }}";
        }
        function apiUrl() {
            return "{{ url('/api/') }}";
        }
        function currentUrl() {
            return "{{ url()->current() }}";
        }
        </script>
        <style>#fountainG{position:relative;width:144px;height:17px;margin:auto}.fountainG{position:absolute;top:0;background-color:rgb(0,0,0);width:17px;height:17px;animation-name:bounce_fountainG;-o-animation-name:bounce_fountainG;-ms-animation-name:bounce_fountainG;-webkit-animation-name:bounce_fountainG;-moz-animation-name:bounce_fountainG;animation-duration:1.5s;-o-animation-duration:1.5s;-ms-animation-duration:1.5s;-webkit-animation-duration:1.5s;-moz-animation-duration:1.5s;animation-iteration-count:infinite;-o-animation-iteration-count:infinite;-ms-animation-iteration-count:infinite;-webkit-animation-iteration-count:infinite;-moz-animation-iteration-count:infinite;animation-direction:normal;-o-animation-direction:normal;-ms-animation-direction:normal;-webkit-animation-direction:normal;-moz-animation-direction:normal;transform:scale(.3);-o-transform:scale(.3);-ms-transform:scale(.3);-webkit-transform:scale(.3);-moz-transform:scale(.3);border-radius:11px;-o-border-radius:11px;-ms-border-radius:11px;-webkit-border-radius:11px;-moz-border-radius:11px}#fountainG_1{left:0;animation-delay:0.6s;-o-animation-delay:0.6s;-ms-animation-delay:0.6s;-webkit-animation-delay:0.6s;-moz-animation-delay:0.6s}#fountainG_2{left:18px;animation-delay:0.75s;-o-animation-delay:0.75s;-ms-animation-delay:0.75s;-webkit-animation-delay:0.75s;-moz-animation-delay:0.75s}#fountainG_3{left:36px;animation-delay:0.9s;-o-animation-delay:0.9s;-ms-animation-delay:0.9s;-webkit-animation-delay:0.9s;-moz-animation-delay:0.9s}#fountainG_4{left:54px;animation-delay:1.05s;-o-animation-delay:1.05s;-ms-animation-delay:1.05s;-webkit-animation-delay:1.05s;-moz-animation-delay:1.05s}#fountainG_5{left:72px;animation-delay:1.2s;-o-animation-delay:1.2s;-ms-animation-delay:1.2s;-webkit-animation-delay:1.2s;-moz-animation-delay:1.2s}#fountainG_6{left:90px;animation-delay:1.35s;-o-animation-delay:1.35s;-ms-animation-delay:1.35s;-webkit-animation-delay:1.35s;-moz-animation-delay:1.35s}#fountainG_7{left:108px;animation-delay:1.5s;-o-animation-delay:1.5s;-ms-animation-delay:1.5s;-webkit-animation-delay:1.5s;-moz-animation-delay:1.5s}#fountainG_8{left:126px;animation-delay:1.64s;-o-animation-delay:1.64s;-ms-animation-delay:1.64s;-webkit-animation-delay:1.64s;-moz-animation-delay:1.64s}@keyframes bounce_fountainG{0%{transform:scale(1);background-color:rgb(0,0,0)}100%{transform:scale(.3);background-color:rgb(255,255,255)}}@-o-keyframes bounce_fountainG{0%{-o-transform:scale(1);background-color:rgb(0,0,0)}100%{-o-transform:scale(.3);background-color:rgb(255,255,255)}}@-ms-keyframes bounce_fountainG{0%{-ms-transform:scale(1);background-color:rgb(0,0,0)}100%{-ms-transform:scale(.3);background-color:rgb(255,255,255)}}@-webkit-keyframes bounce_fountainG{0%{-webkit-transform:scale(1);background-color:rgb(0,0,0)}100%{-webkit-transform:scale(.3);background-color:rgb(255,255,255)}}@-moz-keyframes bounce_fountainG{0%{-moz-transform:scale(1);background-color:rgb(0,0,0)}100%{-moz-transform:scale(.3);background-color:rgb(255,255,255)}}</style>
    </head>
    <body>
        <div id="app">
        </div>
        <!-- Bootstrap and necessary plugins-->
        <script src="{{ asset('vendors/jquery/js/jquery.min.js') }}"></script>
        <script src="{{ asset('vendors/popper.js/js/popper.min.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendors/pace-progress/js/pace.min.js') }}"></script>
        <script src="{{ asset('vendors/perfect-scrollbar/js/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('vendors/@coreui/coreui/js/coreui.min.js') }}"></script>
        <!-- Plugins and scripts required by this view-->
        <script src="{{ asset('vendors/chart.js/js/Chart.min.js') }}"></script>
        <script src="{{ asset('vendors/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

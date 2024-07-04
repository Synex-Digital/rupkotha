<!-- Meta -->
<meta charset="utf-8">


<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1">
{{-- {{ asset('dashboards/Theme1/ --}}
<!-- Title -->
<title>{{ $config ? $config->name : '' }}</title>
<!-- Favicon icon -->
@if ($config)
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/' . $config->favicon) }}">
@endif
{{-- <link href="{{ asset('dashboards/Theme1/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet"> --}}
{{-- <link rel="stylesheet" href="{{ asset('dashboards/Theme1/vendor/chartist/css/chartist.min.css') }}"> --}}
{{-- <link href="{{ asset('dashboards/Theme1/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet"> --}}
<link href="{{ asset('dashboards/Theme1/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"
    rel="stylesheet">
<link href="{{ asset('dashboards/Theme1/css/style.css') }}" rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
    rel="stylesheet">

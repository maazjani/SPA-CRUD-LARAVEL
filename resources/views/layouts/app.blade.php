<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>{{ $title ?? 'Laravel' }}</title>
        @livewireStyles
        <style>
            .modal.show .modal-dialog {
                position: fixed !important;
                margin: 0 !important;
                left: 70% !important;
                top: 0 !important;
                height: 100vh !important;
                width: 400px !important; /* Adjust width as needed */
                max-width: 100vw !important;
                transform: none;
            }
            .modal.left .modal-content {
                height: 100vh !important;
                border-radius: 0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            {{ $slot }}
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        @livewireScripts
        @stack('scripts')
    </body>
</html>

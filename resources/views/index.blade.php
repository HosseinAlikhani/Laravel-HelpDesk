<!DOCTYPE html>
<html lang="en">
<head>
    <title> @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('plugin/toastr/dist/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">
</head>
@yield('css')
<body>
@include('navbar')

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Help Desk Support</h4>
                <div class="align-self-center m-3">
                    <p class="text-primary">Submit Your First Ticket</p>
                    <button onclick="location.href='{{ route('submit') }}'" class="btn btn-info"><i class="fa fa-envelope"></i>  Submit Ticket</button>
                    <hr>
                    <p class="text-primary">View Tickets</p>
                    <button onclick="location.href='{{ route('list') }}'" class="btn btn-success"><i class="fa fa-edit"></i> Ticket List</button>
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
<scrip>
    <script src="{{ asset('plugin/toastr/src/jquery.toast.js') }}"></script>
</scrip>
@yield('script')

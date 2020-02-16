@extends('index')
@section('css')
    <link rel="stylesheet" href="{{ asset('/src/ticket/style.css') }}">
@endsection
@section('content')

    <h2>Helpe Desk Support</h2>
    @if($list)
      <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>State</th>
            <th>Title</th>
            <th>LastUpdate</th>
            <th>View Ticket</th>
        </tr>
        </thead>
        <tbody>
            @foreach($list as $lists)
                <tr>
                    <td>{{ $lists->id }}</td>
                    <td>{{ $lists->state }}</td>
                    <td>{{ $lists->title }}</td>
                    <td>{{ $lists->updated_at_time }}</td>
                    <td><button onclick="location.href='{{ route('read', $lists->id) }}'" class="btn btn-info">View</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="alert alert-info alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Dear User !</strong>You haven't registered any tickets yet.
        </div>
    @endif
@endsection

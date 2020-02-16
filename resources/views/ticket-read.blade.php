@extends('index')
@section('css')
<style>
    /* Chat containers */
    .container-message {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
    }

    /* Darker chat container */
    .darker {
        border-color: #ccc;
        background-color: #ddd;
    }

    .main-ticket {
        border-color:#a94442;
        background-color: #8B7373;
        color:white;
    }

    /* Clear floats */
    .container-message::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Style images */
    .container-message img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 15%;
    }

    /* Style the right image */
    .container-message img.right {
        float: right;
        margin-left: 20px;
        margin-right:0;
    }

    /* Style time text */
    .time-right {
        float: right;
        color: #aaa;
    }

    /* Style time text */
    .time-left {
        float: left;
        color: #999;
    }
</style>
@endsection
@section('content')
    @if(!empty($ticket->base))
        <div class="container-message main-ticket">
            <img src="{{ asset('profile/user/'. $ticket->base->user->img) }}" alt="Avatar" class="right">
            <p> Title : {{ $ticket->base->title }}</p>
            <p> Message : {{ $ticket->base->message }}</p>
            <span class="time-left">{{ $ticket->base->created_at_time }}</span>
        </div>
    @endif
    @if(!empty($ticket->answer))
        @foreach($ticket->answer as $answers)
            <div class="container-message">
                <img src="{{ asset('profile/user/'.$answers->user->img) }}" alt="Avatar">
                <p>{{ $answers->message }}</p>
                <span class="time-right">{{ $answers->created_at_time }}</span><br>
                <span class="time-right">{{ $answers->created_at_date }}</span>
            </div>
        @endforeach

    @else
        <div class="alert alert-success">
            <a> There are no replies to this ticket </a>
        </div>
    @endif
    <div id="ticket">
    </div>
    <hr class="m-5">
    <form id="ticket-answer">
        <div class="form-group">
            <input type="hidden" name="ticket_id" value="{{$ticket->base->id}}" >
        </div>
        <div class="form-group">
            <label for="answer">Your Answer:</label>
            <textarea type="text" name="message" class="form-control" rows="5" id="ticket-answer-message"></textarea>
        </div>
        <div class="form-group">
            <label for="attachment">Attachment:</label>
            <input type="file" class="form-control-file border" id="attachment" name="attachment">
        </div>
        <button type="submit" class="btn btn-success" id="submit-ticket-answer">Submit Answer</button>
    </form>
@endsection
@section('script')
<script>
    $('#ticket-answer').submit(function(event){
        event.preventDefault();
        var file = $(this)[0];
        var data = new FormData(file);
        const message = $('#ticket-answer-message').val();
        const avatar = "{{ asset('profile/user/' . $answers->user->img ) }}";
        console.log(avatar);
        data.append('_token', "{{csrf_token()}}");
        $.ajax({
            url: "{{ route('submit-ticket-answer') }}",
            data: data,
            type:'POST',
            processData: false,
            contentType: false,
            success: function(data){
                $.toast({
                    text : data,
                });
                $('#ticket').append(
                    "        <div id=\"ticket\">\n" +
                    "            <div class=\"container-message\">\n" +
                    "                <img src=" + avatar + " alt=\"Avatar\">\n" +
                    "                <p>" + message + "</p>\n" +
                    "                <span class=\"time-right\">now</span><br>\n" +
                    "                <span class=\"time-right\"></span>\n" +
                    "            </div>\n" +
                    "        </div>"
                );
            },
            error: function(data){
                $.toast({
                    text : data.responseText,
                });
            }
        });
    });

</script>
@endsection

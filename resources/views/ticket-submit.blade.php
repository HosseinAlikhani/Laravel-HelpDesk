@extends('index')
@section('title', $title)
@section('content')
<div class="counter"></div>
    <div class="container">
        <h2>Stacked form</h2>
        <form id="ticket" enctype="multipart/form-data">
        <form id="ticket" enctype="multipart/form-data" method="post" action="{{ route('submit-request') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="priority">department:</label>
                            <select class="form-control" name="department" id="department">
                                <option value="" selected>Select</option>
                            </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="priority">priority:</label>
                        <select class="form-control" name="priority" id="priority">
                            <option value="" selected>Select</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="description">description:</label>
                <textarea type="text" class="form-control" id="description" name="message" placeholder="Enter Your Request"></textarea>
            </div>
            <div class="form-group">
                <label for="attachment">Attachment:</label>
                <input type="file" class="form-control-file border" id="attachment" name="attachment">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

@section('script')
    <script>

        $('form').submit(function(event){
            event.preventDefault();
            var file = $(this)[0];
            var formData = new FormData(file);
            $.ajax({
                url: " {{ route('submit-request') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    $.toast({
                        text: data.message
                    });
                    var counttime = 5;
                    window.setInterval(function(){
                        console.log('[start setInterval]');
                        if (counttime !== 0){
                            $('.counter').text(counttime);
                            counttime = counttime - 1;
                        }
                        if (counttime === 0){
                            window.location.replace(data.url);
                        }
                    },1000);
                },
                error: function(data){
                    $.toast({
                        text : data.responseText,
                    });
                }
            });
        });

        // department list
        $.get('{{ route('department-list') }}', function(data, status){
            $.each(data, function(key, value){
                $('#department').append(new Option(value.name, value.id));
            });
        });

        $.get('{{ route('priority-list') }}', function(data, status){
            $.each(data, function(key, value){
            $('#priority').append(new Option(value.name, value.id));
            });
        });
    </script>

@endsection

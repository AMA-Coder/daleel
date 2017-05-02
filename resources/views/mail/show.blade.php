@extends('layout.master')

@section('body')
    <form method="POST" action="{{route('mail.send')}}">
        {{csrf_field()}}{{method_field('POST')}}

        <div class="form-group">
            <label for="requesterName">Requester Name:</label>
            <input type="text" class="form-control" id="requesterName" name="requesterName">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Details</label>
            <textarea class="form-control" id="requesterDetails" name="requesterDetails"></textarea>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection
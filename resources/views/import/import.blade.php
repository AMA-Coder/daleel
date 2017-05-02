@extends('layout.master')

@section('body')
    <form method="POST" action="{{route('import.post')}}" accept-charset="UTF-8" enctype="multipart/form-data">
        {{csrf_field()}}{{method_field('POST')}}
        <p class="text-info">
            <i class="fa fa-download"></i> Please <a href="">click here</a> to download a sample template
        </p>

        <div class="form-group ">
            <label for="file" class="control-label">File</label>
            <input class="form-control" name="file" type="file" id="file">

        </div>

        <div class="form-group">
            <button class="btn btn-primary">
                <i class="fa fa-check"></i> Submit
            </button>
        </div>

    </form>
@endsection
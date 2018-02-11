@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label for="title">Blog title</label>
                        <input type="text" class="form-control" id="title" placeholder="" name="title" required="">
                      </div>
                      <div class="form-group">
                        <label for="cover">Blog cover</label>
                        <input type="file" class="form-control" id="cover" placeholder="" name="cover" required="">
                      </div>
                      <div class="form-group">
                        <label for="pre_description">Blog Pre Description</label>
                        <textarea id="pre_description" class="form-control" name="pre_description" required=""></textarea>

                      </div>
                      <div class="form-group">
                        <label for="description">Blog Description</label>
                        <textarea id="description" class="form-control" name="description" required=""></textarea>
                      </div>
                      
                      <button type="submit" class="btn btn-default">Submit</button>
                    </form>

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

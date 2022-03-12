@extends('admin.admin_master')


@section('admin')
<div class="row">

    <div class="col-lg-12">
        <div class="card card-default">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
            <div class="card-header card-header-border-bottom">
                <h2>Create slider</h2>
            </div>
            <div class="card-body">
            <form action="{{ route('store.slider') }}" method='POST' enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1 " name="title" placeholder="slider title">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image</label>
                        <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                        <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

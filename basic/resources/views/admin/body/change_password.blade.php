@extends('admin.admin_master')


@section('admin')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Form pill</h2>
    </div>
    <div class="card-body">
        <form method='POST' action="{{ route('update.password') }}" class="form-pill">
            @csrf
            
            <div class="form-group">
                <label for="exampleFormControlPassword3">current Password</label>
                <input type="password" class="form-control"  id="current_password"  name="current_password" placeholder="Password">
                @error('current_password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">New Password</label>
                <input type="password" class="form-control"  id="password"  name="password" placeholder="Password">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">confirm Password</label>
                <input type="password" class="form-control"  id="password_confirmation"  name="password_confirmation" placeholder="Password">
                @error('password_confirmation')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info">save</button>   
            </div>
            
        </form>
    </div>
</div>
@endsection

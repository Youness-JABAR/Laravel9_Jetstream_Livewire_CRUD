@extends('admin.admin_master')


@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                
            <div class="col-md-8">
                <div class="card">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong> 
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    
                    <div class="card-header">Edit brand</div>
                        <div class="card-body">
                        <form action="{{ url('brand/update/'.$brand->id) }}" method='POST' enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="mb-3">
                            <label for="TextInput" class="form-label">Update brand Name</label>
                            <input type="text" id="TextInput" name="brand_name" class="form-control" value="{{$brand->brand_name}}">

                            @error('brand_name')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="mb-3">
                            <label for="Input" class="form-label">Update brand image</label>
                            <input type="hidden" id="hidden" name="old_image" class="form-control" value="{{$brand->brand_image}}" >
                            <input type="file" id="Input" name="brand_image" class="form-control" >

                            @error('brand_name')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <img src="{{asset($brand->brand_image) }}" style="width: 300px; height:200px" alt="">
                            </div>
                
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                        </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

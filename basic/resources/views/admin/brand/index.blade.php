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
                        <div class="card-header">All brands</div>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">name</th>
      <th scope="col">image</th>
      <th scope="col">created at</th>
      <th scope="col">action </th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
    @foreach($brands as $brand)
    <tr>
      <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
      <td>{{$brand->brand_name}}</td>
      <td><img src="{{asset($brand->brand_image)}}" style="height:40px; width:70px" alt=""></td>
      @if($brand->created_at == NULL)
      <td><span class="text-danger" >No Data Set</span></td>
      
      @else
      <td>{{  Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}</td>
      @endif

      <td>
        <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info"> edit</a>
        <a href="{{ url('/brand/delete/'.$brand->id) }} " onclick=" return confirm(' you are going to delete the clicked brand,are you sure?') " class="btn btn-danger">delete</a>      </td>
    </tr>
    @endforeach

  </tbody>
</table>
{{$brands->links()}}

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    
                    <div class="card-header">Add brand</div>
                    <div class="card-body">
                    <form action="{{route('store.brand') }}" method='POST' enctype="multipart/form-data" >
                      @csrf
                    <fieldset>
                        <div class="mb-3">
                            <label for="TextInput" class="form-label">brand Name</label>
                            <input type="text" id="TextInput" name="brand_name" class="form-control" placeholder="">

                            @error('brand_name')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Input" class="form-label">brand image</label>
                            <input type="file" id="Input" name="brand_image" class="form-control" >

                            @error('brand_image')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
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

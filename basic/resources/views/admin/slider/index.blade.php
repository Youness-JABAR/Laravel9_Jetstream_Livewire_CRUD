@extends('admin.admin_master')


@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

                    <h4>Home slider</h4>
                    <a href="{{ route('add.slider') }}" ><button class="btn btn-info"  >Add slider</button></a>
                    <br><br>
                <div class="col-md-12">
                    <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong> 
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                        <div class="card-header">All Sliders</div>

        <table class="table">
  <thead>
    <tr>
      <th scope="col" style="width: 5%">No</th>
      <th scope="col" style="width: 15%" >title</th>
      <th scope="col" style="width: 25%" >description</th>
      <th scope="col" style="width: 15%" >image</th>
      <th scope="col" style="width: 15%" >action </th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
    @foreach($sliders as $slider)
    <tr>
      <th scope="row" >{{$i++}}</th>
      <td>{{$slider->title}}</td>
      <td>{{$slider->description}}</td>
      <td><img src="{{asset($slider->image)}}" style="height:40px; width:70px" alt=""></td>
      


      <td>
        <a href="{{ url('brand/edit/'.$slider->id) }}" class="btn btn-info"> edit</a>
        <a href="{{ url('/brand/delete/'.$slider->id) }} " onclick=" return confirm(' you are going to delete the clicked brand,are you sure?') " class="btn btn-danger">delete</a>      </td>
    </tr>
    @endforeach

  </tbody>
</table>


                </div>
            </div>
            

        </div>
    </div>


</div>
@endsection

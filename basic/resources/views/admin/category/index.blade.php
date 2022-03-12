<x-app-layout>
    <x-slot name="header">
        All Categories
    </x-slot>

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
                        <div class="card-header">All Category</div>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">created at</th>
      <th scope="col">action </th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
    @foreach($categories as $category)
    <tr>
      <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
      <td>{{$category->category_name}}</td>
      <td>{{$category->user->name}}</td>
      @if($category->created_at == NULL)
      <td><span class="text-danger" >No Data Set</span></td>
      
      @else
      <td>{{  Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>
      @endif

      <td>
        <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info"> edit</a>
        <a href="{{ url('/softdelete/category/'.$category->id) }} " class="btn btn-danger">delete</a>      </td>
    </tr>
    @endforeach

  </tbody>
</table>
{{$categories->links()}}

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    
                    <div class="card-header">Add Category</div>
                    <div class="card-body">
                    <form action="{{route('store.category') }}" method='POST'>
                      @csrf
                    <fieldset>
                        <div class="mb-3">
                        <label for="TextInput" class="form-label">Category Name</label>
                        <input type="text" id="TextInput" name="category_name" class="form-control" placeholder="">

                        @error('category_name')
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




    <!-- trash part -->


    <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                    
                        <div class="card-header">Trash Category</div>

                          <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">created at</th>
                        <th scope="col">action </th>
                      </tr>
                    </thead>
                    <tbody>
                      @php($i=1)
                      @foreach($trashCat as $category)
                      <tr>
                        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->user->name}}</td>
                        @if($category->created_at == NULL)
                        <td><span class="text-danger" >No Data Set</span></td>
                        
                        @else
                        <td>{{  Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>
                        @endif

                        <td>
                          <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-info"> restore</a>
                          <a href="{{ url('pdelete/category/'.$category->id) }}" class="btn btn-danger"> P Delete</a>
                          
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                  {{$trashCat->links()}}

                </div>
            </div>
        </div>
    </div>




</div>
</x-app-layout>

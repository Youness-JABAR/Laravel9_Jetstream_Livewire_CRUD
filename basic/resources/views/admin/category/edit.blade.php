<x-app-layout>
    <x-slot name="header">
        All Categories
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header">Edit Category</div>
                        <div class="card-body">
                        <form action="{{ url('brand/update/'.$brand->id) }}" method='POST' enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="mb-3">
                            <label for="TextInput" class="form-label">Update Category Name</label>
                            <input type="text" id="TextInput" name="category_name" class="form-control" value="{{$category->category_name}}">

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
    </div>
</x-app-layout>

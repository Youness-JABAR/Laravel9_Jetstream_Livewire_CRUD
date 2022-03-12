<x-app-layout>
    <x-slot name="header">
        <b>hii {{Auth::User()->name}}</b>
        <b style=" float:right " > total of users 
            <span class="badge bg-danger" >{{ count($users) }}</span>
        </b>
    </x-slot>

    <div class="py-12">
        <div class="container">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">created at</th>
    </tr>
  </thead>
  <tbody>
      @php($i=0)
      @foreach($users as $user)
    <tr>
      <th scope="row">{{ $i++ }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <!-- with eloquent ORM -->
      <!-- $user->created_at->diffForHumans() -->
      <!-- with QUERY Builder -->
            

      <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
        </div>
    </div>
</x-app-layout>

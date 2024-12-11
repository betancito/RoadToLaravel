@section('title')
    Users
@endsection
<div class="container flex justify-content-center align-items-center">
    <div class="flex justify-content-left mt-5 mb-5">
        <a href="{{route('user.create')}}"><button class="btn btn-success">Create new user</button></a>
        <livewire:auth.logout />
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="flex pt-5">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Names</th>
                <th scope="col">Lastnames</th>
                <th scope="col">Email</th>
                <th scope="col">Gendre</th>
                <th scope="col">Country</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th>{{$user->names}}</th>
                        <td>{{$user->lastnames}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ucfirst($user->gender)}}</td>
                        <td>{{$user->country->name}}</td>
                        <td>
                        <a href="{{route('user.details', ['id'=>$user->id])}}"><button class="btn btn-warning">Details</button></a>
                        <a href="{{route('user.edit', ['id'=>$user->id])}}"><button class="btn btn-primary">Edit</button></a>
                        <button wire:click="deleteUser({{ $user->id }})" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!--pagination-->
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>


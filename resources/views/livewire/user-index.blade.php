@section('title')
    Users
@endsection
<div class="container flex justify-content-center align-items-center">
    <div class="d-flex justify-content-between mt-5 mb-5">
        
        <a href="{{ route('user.create') }}">
            <button class="btn btn-success">Create new user</button>
        </a>
        <div class="form-inline d-flex justify">
            <input type="text" class="form-control mr-2" placeholder="Search..." id="searchInput" wire:model.debounce.500ms="searchTerm"/>

            <button type="submit" class="btn" wire:click='search'>
                <i class="fa fa-search"></i>
            </button>
            <button class="btn btn-link" wire:click="$set('searchTerm', '')">
                Clear
            </button>
        </div>

        <div class="d-flex align-items-center">
            <x-user-info>
                @section('f-name')
                 {{ ucfirst(Auth::user()->names[0]) }}
                @endsection
                @section('names')
                {{ ucfirst(Auth::user()->names) }} {{ ucfirst(Auth::user()->lastnames[0]) }}.
                @endsection
            </x-user-info>
            <a href=""><livewire:auth.logout /></a>
        </div>
        
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
        <!--pagination and button to export-->
        <div class="d-flex justify-content-between">
            <div class="mt-4">
                {{ $users->links() }}
            </div>
            <div class="mt-4">
                <button wire:click="ExportUsers" class="btn btn-success"><i class="fa-regular fa-file-excel me-2"></i>Export</button>
            </div>
        </div>
    </div>
</div>


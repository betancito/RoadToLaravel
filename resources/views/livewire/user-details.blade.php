@section('title')
    User Details
@endsection
<div class="container">
    <div class="justify-content-center pt-5">
        <a href="{{route('user.index')}}"><button class="btn btn-success">Volver</button></a>
    </div>
    <div class="card justify-content-center mt-5 p-5">
        <div class="row g-3">
            <div class="col-md-6">
              <label for="displayNames" class="form-label">Names</label>
              <div class="form-control" id="displayNames">{{$user->names}}</div> <!-- Static content -->
            </div>
            <div class="col-md-6">
              <label for="displyLastnames" class="form-label">Lastnames</label>
              <div class="form-control" id="displyLastnames">{{$user->lastnames}}</div>
            </div>
            <div class="col-md-6">
              <label for="displayEmail" class="form-label">Email</label>
              <div class="form-control" id="displayEmail">{{$user->email}}</div>
            </div>
            <div class="col-md-6">
              <label for="displayGender" class="form-label">Gender</label>
              <div class="form-control" id="displayGender">{{ucfirst($user->gender)}}</div>
            </div>
            <div class="col-md-6">
                <label for="displayPhone" class="form-label">Phone</label>
                <div class="form-control" id="displayPhone">{{$user->phone}}</div>
            </div>
            <div class="col-md-6">
                <label for="displayAddress" class="form-label">Address</label>
                <div class="form-control" id="displayAddress">{{$user->address}}</div>
            </div>
            <div class="col-12">
              <label for="displayCountry" class="form-label">Country</label>
              <div class="form-control" id="displayCountry">{{$user->country->name}}</div>
            </div>
            <div class="col-12">
              <a href="{{route('user.edit', ['id'=>$user->id])}}"><button class="btn btn-primary">Edit</button></a>
            </div>
        </div>
    </div>
</div>

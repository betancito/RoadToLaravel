@section('title')
    Users
@endsection
<div class="container flex justify-content-center align-items-center">
    <div class="flex justify-content-left mt-5 mb-5">
        <button class="btn btn-success">Create new user</button>
    </div>
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
              <tr>
                <th>Otto</th>
                <td>Mark Beta</td>
                <td>mark@otto.com</td>
                <td>Male</td>
                <td>Colombia</td>
                <td>
                <button class="btn btn-warning">Details</button>
                <button class="btn btn-primary">Edit</button>
                <button class="btn btn-danger">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
    </div>
</div>


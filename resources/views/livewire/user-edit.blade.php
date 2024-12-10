@section('title')
    Edit User
@endsection
<div class="container">
    <div class="justify-content-center pt-5">
        <a href="{{route('user.index')}}"><button class="btn btn-success">Volver</button></a>
    </div>
    <form wire:submit.prevent="updateUser">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="names" class="form-label">Names</label>
                <input type="text" class="form-control" id="names" wire:model="names">
                @error('names') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <label for="lastnames" class="form-label">Lastnames</label>
                <input type="text" class="form-control" id="lastnames" wire:model="lastnames">
                @error('lastnames') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" wire:model="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" class="form-select" wire:model="gender">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" wire:model="phone">
                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <textarea type="text" class="form-control" id="address" wire:model="address"></textarea>
                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <label for="country" class="form-label">Country</label>
                <select id="country" class="form-select" wire:model="country_id">
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('country_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary col-12">Save changes</button>
            </div>
        </div>
    </form>
    </div>
</div>

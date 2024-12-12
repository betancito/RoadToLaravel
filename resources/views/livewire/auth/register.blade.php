@section('title')
    Register
@endsection
<div class="container">
    <div class="card justify-content-center mt-5 p-5">
        <form wire:submit.prevent="register">
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
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" wire:model="password">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="text" class="form-control" id="password_confirmation" wire:model="password_confirmation">
                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary col-2 ">Register</button>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('login') }}">Log in</a>
                </div>
            </div>
        </form>
    </div>
</div>

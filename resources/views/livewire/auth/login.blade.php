@section('title')
    Login
@endsection
<div class="container ">
    <div class="card justify-content-center mt-5 p-5">
        <form wire:submit.prevent="login">
            <div class="row g-3">
                <div class="col-md-12 d-flex p-5 mt-5 justify-content-center">
                    <div class="col-5 ">
                        <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" wire:model="email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-12 d-flex p-5 mb-5 justify-content-center">
                    <div class="col-5">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" wire:model="password">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                @if (session()->has('error'))
                    <div class="col-12">
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    </div>
                @endif
                <div class="col-12 d-flex justify-content-center pb-5">
                    <button type="submit" class="btn btn-primary col-2">Login</button>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('register') }}">Don't have an account? Register here</a>
                </div>
            </div>
        </form>
    </div>
</div>

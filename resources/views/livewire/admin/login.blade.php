<div>
    <x-slot name="title">
        Login
    </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h2 class="text-center font-weight-light my-4">Admin Login</h2>
                    </div>
                    <div class="card-body">
                        @if (session()->has('error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form wire:submit.prevent='login'>
                            <div class="form-group">
                                <label class="small mb-1" for="username">Username</label>
                                <input class="form-control py-4" wire:model="username" id="username" type="text"
                                    placeholder="Enter email address" />
                                @error('username')
                                    <spant class="text-danger">{{ $message }}</spant>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="password">Password</label>
                                <input class="form-control py-4" wire:model='password' id="password" type="password"
                                    placeholder="Enter password" />
                                @error('password')
                                    <spant class="text-danger">{{ $message }}</spant>
                                @enderror
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button type="submit" class="btn btn-primary">
                                    <span wire:loading.remove wire:target='login'>Login</span>
                                    <span wire:loading wire:target='login'>Login....</span>

                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <x-slot name="title">User - Register</x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Create Account</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent='create'>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="">First
                                            Name</label>
                                        <input class="form-control py-4" wire:model='fname' type="text"
                                            placeholder="Enter first name" />
                                        @error('fname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1">Last Name</label>
                                        <input class="form-control py-4" wire:model='lname' type="text"
                                            placeholder="Enter last name" />
                                        @error('lname')
                                            <span class="text-danger">{{ $lname }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1">Email</label>
                                <input class="form-control py-4" wire:model='email' type="email"
                                    aria-describedby="emailHelp" placeholder="Enter email address" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1">Password</label>
                                        <input class="form-control py-4" wire:model='password' type="password"
                                            placeholder="Enter password" />
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block"
                                    type="submit">Create Account</button></div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <div class="small"><a href="{{ route('user.login') }}">Have an account? Go to
                                login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

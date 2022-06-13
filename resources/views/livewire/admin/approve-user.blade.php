<div>
    <x-slot name="title">
        Approve User
    </x-slot>
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card my-2">
            <div class="card-header">
                <h3>Approve User ( {{ $totalUser }} ) </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Approve</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{!! $user->remember_token == 1 ? '<span class="text-success">Approved</span>' : '<span class="text-danger">Not Approved</span>' !!}
                                    </td>
                                    <td>
                                        @if ($user->remember_token == 1)
                                            <button disabled class="btn btn-success">Approved</button>
                                        @else
                                            <button wire:click='approve({{ $user->id }})'
                                                class="btn btn-success">Approve</button>
                                        @endif
                                    </td>
                                    <td><button wire:click='delete({{ $user->id }})'
                                            class="btn btn-danger">Delete</button></td>
                                </tr>
                            @empty
                                <h4>user Not Found</h4>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $users->links('custom-pagination-links-view') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

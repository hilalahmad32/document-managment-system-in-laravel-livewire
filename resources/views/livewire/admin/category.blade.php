<div>
    <x-slot name="title">Category</x-slot>
    <div class="container my-3">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($showTable == true)
            <div class="card my-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Category ( {{ $totalCategory }} )</h3>

                        <button class="btn btn-success" wire:click='showForm'>
                            <span wire:loading.remove wire:target='showForm'>New</span>
                            <span wire:loading wire:target='showForm'>New....</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @if ($showTable == true)
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categorys as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td><button wire:click='edit({{ $category->id }})'
                                                class="btn btn-primary">Edit</button></td>
                                        <td><button wire:click='delete({{ $category->id }})'
                                                class="btn btn-danger">Delete</button></td>
                                    </tr>
                                @empty
                                    <h4>Category Not Found</h4>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $categorys->links('custom-pagination-links-view') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($createForm == true)
            <div class="container">
                <button class="btn btn-success" wire:click='goback'>
                    <span wire:loading.remove wire:target='goback'>GoBack</span>
                    <span wire:loading wire:target='goback'>GoBack....</span>
                </button>
                <form wire:submit.prevent='save'>
                    <div class="form-group my-1">
                        <label for="">Enter Category Name</label>
                        <input type="text" wire:model='category_name' class="form-control">
                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type='submit' class="btn btn-success">Save</button>
                </form>
            </div>
        @endif

        @if ($updateForm == true)
            <div class="container">
                <button class="btn btn-success" wire:click='goback'>
                    <span wire:loading.remove wire:target='goback'>GoBack</span>
                    <span wire:loading wire:target='goback'>GoBack....</span>
                </button>
                <form wire:submit.prevent='update({{ $edit_id }})'>
                    <div class="form-group my-1">
                        <label for="">Enter Category Name</label>
                        <input type="text" wire:model='edit_category_name' class="form-control">
                        @error('edit_category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type='submit' class="btn btn-success">Save</button>
                </form>
            </div>
        @endif
    </div>
</div>

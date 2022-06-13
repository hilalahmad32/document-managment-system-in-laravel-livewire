<div>
    <x-slot name="title">User - Document</x-slot>
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
                        <h3>Document ( {{ $totalDocuments }} )</h3>
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
                                    <th>Title</th>
                                    <th>User</th>
                                    <th>Document</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($documents as $document)
                                    <tr>
                                        <td>{{ $document->id }}</td>
                                        <td>{{ $document->title }}</td>
                                        <td>{{ $document->users->fname . ' ' . $document->users->lname }}</td>
                                        <td>{{ $document->document }}</td>
                                        <td><button wire:click='edit({{ $document->id }})'
                                                class="btn btn-primary">Edit</button></td>
                                        <td><button wire:click='delete({{ $document->id }})'
                                                class="btn btn-danger">Delete</button></td>
                                    </tr>
                                @empty
                                    <h4>Document Not Found</h4>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $documents->links('custom-pagination-links-view') }}
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
                <form wire:submit.prevent='create'>
                    <div class="form-group my-1">
                        <label for="">Enter Title</label>
                        <input type="text" wire:model='title' class="form-control">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-1">
                        <label for="">Upload Document</label>
                        <input type="file" wire:model='document' class="form-control">
                        @error('document')
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
                        <label for="">Enter Title</label>
                        <input type="text" wire:model='edit_title' class="form-control">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-1">
                        <label for="">Upload Document</label>
                        <input type="file" wire:model='new_document' class="form-control">
                        <input type="hidden" wire:model='old_document' class="form-control">
                        @if ($new_document)
                            <span>{{ $new_document }}</span>
                        @else
                            <span>{{ $old_document }}</span>
                        @endif
                        @error('document')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type='submit' class="btn btn-success">Save</button>
                </form>
            </div>
        @endif
    </div>
</div>

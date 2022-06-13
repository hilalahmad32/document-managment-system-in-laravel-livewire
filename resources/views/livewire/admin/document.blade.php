<div>
    <x-slot name="title">Document</x-slot>
    <div class="container my-3">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card my-1">
            <div class="card-header">
                <h2>Documents ( {{ $totalDocuments }} )</h2>
            </div>
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
    </div>
</div>

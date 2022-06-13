<?php

namespace App\Http\Livewire\Admin;

use App\Models\Document as ModelsDocument;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Document extends Component
{
    public $totalDocuments;
    use WithPagination;
    public function pageinationView()
    {
        return 'custom-pagination-links-view';
    }
    public function render()
    {
        $documents = ModelsDocument::orderBy('id', 'DESC')->paginate(3);
        $this->totalDocuments = ModelsDocument::count();
        return view('livewire.admin.document', compact('documents'))->layout('layouts.admin-app');
    }

    public function delete($id)
    {
        $documents = ModelsDocument::findOrFail($id);
        $path = public_path('storage\\') . $documents->document;
        if (File::exists($path)) {
            File::delete($path);
        }
        $result = $documents->delete();
        if ($result) {
            session()->flash('success', 'Document Delete Successfully');
        }
    }
}

<?php

namespace App\Http\Livewire\User;

use App\Models\Document;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalDocument;
    public function render()
    {
        $this->totalDocument = Document::count();

        return view('livewire.user.dashboard')->layout('layouts.user-app');
    }
}

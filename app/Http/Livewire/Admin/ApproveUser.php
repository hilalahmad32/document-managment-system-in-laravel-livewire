<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ApproveUser extends Component
{

    public $totalUser;
    use WithPagination;
    public function pageinationView()
    {
        return 'custom-pagination-links-view';
    }

    public function render()
    {
        $users = User::orderBy('id', 'DESC')->paginate(3);
        $this->totalUser = User::count();
        return view('livewire.admin.approve-user', compact('users'))->layout('layouts.admin-app');
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->remember_token = 1;
        $result = $user->save();
        if ($result) {
            session()->flash('success', 'Admin Approve User');
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id)->delete();
        if ($user) {
            session()->flash('success', 'User Delete Successfully');
        }
    }
}

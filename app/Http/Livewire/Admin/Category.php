<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category as ModelsCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    public $category_name,
        $showTable = true,
        $createForm = false,
        $updateForm = false,
        $edit_category_name,
        $edit_id,
        $totalCategory;

    use WithPagination;
    public function pageinationView()
    {
        return 'custom-pagination-links-view';
    }
    public function render()
    {
        $categorys = ModelsCategory::orderBy('created_at', 'DESC')->paginate(4);
        $this->totalCategory = ModelsCategory::count();
        return view('livewire.admin.category', compact('categorys'))->layout('layouts.admin-app');
    }

    public function showForm()
    {
        $this->showTable = false;
        $this->createForm = true;
    }
    public function goback()
    {
        $this->showTable = true;
        $this->createForm = false;
        $this->updateForm = false;
    }

    public function save()
    {
        $validate = $this->validate([
            'category_name' => ['required', 'string', 'unique:categories']
        ]);

        $result = ModelsCategory::create($validate);
        if ($result) {
            $this->category_name = '';
            session()->flash('success', 'Category Create Successfully');
            $this->createForm = false;
            $this->showTable = true;
        }
    }

    public function edit($id)
    {
        $this->showTable = false;
        $this->updateForm = true;
        $category = ModelsCategory::findOrFail($id);
        $this->edit_id = $category->id;
        $this->edit_category_name = $category->category_name;
    }
    public function update($id)
    {
        $category = ModelsCategory::findOrFail($id);
        $this->validate([
            'edit_category_name' => ['required', 'string'],
        ]);
        $category->category_name = $this->edit_category_name;
        $result = $category->save();
        if ($result) {
            $this->edit_category_name = '';
            session()->flash('success', 'Category Update Successfully');
            $this->updateForm = false;
            $this->showTable = true;
        }
    }
    public function delete($id)
    {
        $result = ModelsCategory::findOrFail($id)
            ->delete();
        if ($result) {
            session()->flash('success', 'Category Delete Successfully');
        }
    }
}

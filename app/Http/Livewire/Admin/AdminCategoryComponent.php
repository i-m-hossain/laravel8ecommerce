<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class AdminCategoryComponent extends Component
{

    public function deleteCategory($id){
        Category::find($id)->delete();
        session()->flash('message', 'Category is deleted successfully');
    }

    public function render()
    {
         $categories = Category::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.admin.admin-category-component', ['categories'=>$categories])->layout('layouts.base');
    }
}

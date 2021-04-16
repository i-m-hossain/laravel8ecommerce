<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class AdminCategoryComponent extends Component
{


    public function render()
    {
         $categories = Category::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.admin.admin-category-component', ['categories'=>$categories])->layout('layouts.base');
    }
}

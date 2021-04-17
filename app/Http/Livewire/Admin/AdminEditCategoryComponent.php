<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $cat_slug;
    public $cat_id;
    public $slug;
    public $name;

    public function mount($cat_slug){
        $this->$cat_slug = $cat_slug;
        $category = Category::where('slug',$cat_slug)->first();
        $this->cat_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }
    public function generateSlug(){
        $this->slug = Str::slug($this->name); 
    }
    public function updateCategory(){
        $category = Category::findOrFail($this->cat_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Category updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class HeaderSearchComponent extends Component
{
    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount()
    {
        $this->product_cat = 'All Category';
        $this->fill(request()->only('search', 'product_id', 'product_cat-id'));

    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.header-search-component', ['categories' => $categories]);
    }
}

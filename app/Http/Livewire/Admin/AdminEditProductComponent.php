<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $product_slug;
    public $product_id;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $new_image;
    public $category_id;

    public function mount($product_slug){
        $this->product_slug = $product_slug;
        $product = Product::where('slug', $product_slug)->first();
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }
    public function updated($fields)
    {   
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required ',
            'short_description'=>'required',
            'description'=>'required',
            'regular_price'=>'required | numeric',
            'sale_price'=>'numeric',
            'SKU'=>'required',
            'stock_status'=>'required',
            'quantity'=>'required | numeric',
            'new_image'=>'required |mimes:jpg,jpeg,png',
            'category_id'=>'required',
        ]);

    }
    public function updateProduct(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'regular_price'=>'required | numeric',
            'sale_price'=>'numeric',
            'SKU'=>'required',
            'stock_status'=>'required',
            'quantity'=>'required | numeric',
            'new_image'=>'required |mimes:jpg,jpeg,png',
            'category_id'=>'required',
        ]);
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        
        if($this->new_image){
            $imageName = Carbon::now()->timestamp.'.'.$this->new_image->extension();
            $this->new_image->storeAs('products', $imageName);
            $product->image = $imageName; 
        }
         
        
        $product->category_id = $this->category_id;
        $product->save();

        session()->flash('message', 'Product is updated successfully');

    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component', ['categories'=>$categories])->layout('layouts.base');
    }
}

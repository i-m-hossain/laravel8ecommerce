<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $min_price;
    public $max_price;
    
    public $search;
    public $product_cat;
    public $product_cat_id;

    

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
        $this->min_price = 1;
        $this->max_price = 1000;
       
    }
    // product adding to the cart
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');

        session()->flash('success_message', 'Items added to the cart');
        return redirect()->route('product.cart');
    }
    //product adding to the wishlist 
    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent'); //for auto refreshing wishlist count
    }
    //product removing from wishlist
    public function  removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as  $witem) {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent'); //for auto refreshing wishlist count
                return;
            }
        }
    }

    // shop page

    public function render()
    {
        if ($this->sorting == 'date') {
            // $products = Product::whereBetween('regular_price', [$this->min_price,  $this->max_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
            $products = Product::where('name', 'like', '%'.$this->search. '%')->where('category_id','like','%'. $this->product_cat_id.'%')->whereBetween('regular_price', [$this->min_price,  $this->max_price])->orderBy('created_at', 'DESC')->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == "price") {
            $products = Product::where('name', 'like', '%'.$this->search. '%')->where('category_id','like','%'. $this->product_cat_id.'%')->whereBetween('regular_price', [$this->min_price,  $this->max_price])->orderBy('created_at', 'DESC')->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == "price-desc") {
            $products = Product::where('name', 'like', '%'.$this->search. '%')->where('category_id','like','%'. $this->product_cat_id.'%')->whereBetween('regular_price', [$this->min_price,  $this->max_price])->orderBy('created_at', 'DESC')->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = Product::where('name', 'like', '%'.$this->search. '%')->where('category_id','like','%'. $this->product_cat_id.'%')->whereBetween('regular_price', [$this->min_price,  $this->max_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }

        $categories = Category::all();


        return view('livewire.search-component', ['products' => $products, 'categories' => $categories])->layout('layouts.base');
    }
}


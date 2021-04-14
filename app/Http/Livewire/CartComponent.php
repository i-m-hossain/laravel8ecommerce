<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{

    
    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent'); //for auto refreshing cart count

    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        if($product->qty >1){
            $qty = $product->qty - 1;
            Cart::instance('cart')->update($rowId, $qty);
            $this->emitTo('cart-count-component', 'refreshComponent'); //for auto refreshing cart count
    
        }
    }
    public function remove($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent'); //for auto refreshing cart count
        session()->flash('success_message', 'Item has been removed');
       
    }
    public function destroy_all_cart(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component', 'refreshComponent'); //for auto refreshing cart count
    }
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}

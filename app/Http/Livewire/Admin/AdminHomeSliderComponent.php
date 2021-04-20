<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;

class AdminHomeSliderComponent extends Component
{

    public function updateStatus($id){
        
        $slider = HomeSlider::find($id);
        if($slider->status == 0){
            $slider->status = 1;
            $slider->save();
        }else{
            $slider->status =0;
            $slider->save();
        } 
    }
    public function deleteSlider($id){
        HomeSlider::find($id)->delete();
        session()->flash('message', 'Slide deleted successfully');
    }
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component', ['sliders'=>$sliders])->layout('layouts.base');
    }
}

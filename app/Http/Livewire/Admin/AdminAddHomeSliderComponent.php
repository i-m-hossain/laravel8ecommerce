<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    public $title;
    public $subtitle;
    public $price;
    public $image;
    public $status;
    public $link;
    use WithFileUploads;
    public function mount()
    {
        $this->status = 0 ;
    }

    public function storeSlide(){
        $home_slide = new HomeSlider();
        $home_slide->title = $this->title;
        $home_slide->subtitle = $this->subtitle;
        $home_slide->price = $this->price;
        $home_slide->link = $this->link;
        

        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('slider', $imageName);
        $home_slide->image = $imageName;  

        $home_slide->status = $this->status;

        $home_slide->save();
        return redirect()->back()->with('message', 'Slide is created successfully');        
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}

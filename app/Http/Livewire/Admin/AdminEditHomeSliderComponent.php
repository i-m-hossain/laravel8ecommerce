<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    public $slide_id;
    public $title;
    public $subtitle;
    public $price;
    public $new_image;
    public $image;
    public $status;
    public $link;
    use WithFileUploads;

    public function mount($slider_id)
    {
        $slide = HomeSlider::find($slider_id);

        $this->slide_id = $slide->id;
        $this->title    = $slide->title ;
        $this->subtitle = $slide->subtitle ;
        $this->price    = $slide->price ;
        $this->image    = $slide->image ;
        $this->link     = $slide->link;
        $this->status   = $slide->status ;
    }

    public function updateSlide(){

        $home_slide = HomeSlider::find($this->slide_id);
        
        $home_slide->title = $this->title;
        $home_slide->subtitle = $this->subtitle;
        $home_slide->price = $this->price;
        $home_slide->link = $this->link;
        
        if($this->new_image){
            $imageName = Carbon::now()->timestamp.'.'.$this->new_image->extension();
            $this->new_image->storeAs('slider', $imageName);
            $home_slide->image = $imageName; 
        } 

        $home_slide->status = $this->status;

        $home_slide->save();
        return redirect()->back()->with('message', 'Slide is updated successfully');        
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}

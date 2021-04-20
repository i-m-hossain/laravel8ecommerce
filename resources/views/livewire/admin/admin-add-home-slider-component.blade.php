<div class="container" style="padding: 30px 0">   
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Add Slide to Home Slider 
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.homeslider') }}" class="btn btn-success pull-right">All Slides</a>
                        </div>
                    </div>
                </div>  
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="storeSlide()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Title</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" 
                                    type="text" placeholder="Slide title" 
                                    wire:model="title" required>
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Subtitle</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" type="text" placeholder="Subtitle" wire:model="subtitle" required> 
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Price</label>
                            <div class="col-md-4" >
                               <input class="form-control" placeholder="price" type="number" name="price" wire:model="price" required>
                            </div>                            
                        </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label"> Link</label>
                            <div class="col-md-4" >
                                <textarea class="form-control input-md"  placeholder="Product link" wire:model="link"></textarea>
                            </div>                            
                        </div>
                        
                       
                        <div class="form-group">
                            <label class="col-md-4 control-label">Status</label>
                            <div class="col-md-4" >
                                <select class="form-control" wire:model="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>                            
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Product Image</label>
                            <div class="col-md-4" >
                                <input  type="file" class="input-file"  wire:model="image">
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="60" alt="">
                                @endif
                            </div>                          
                        </div>
                       
                        
                        <div class="form-group ">
                             <label class="col-md-4 control-label"> </label>      
                             <div class="col-md-4" >
                                <button class="btn btn-primary" type="submit">Create Slide</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>

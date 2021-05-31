 <div class="container" style="padding: 30px 0">   
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Add Category
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.categories') }}" class="btn btn-success pull-right">All categories</a>
                        </div>
                    </div>
                </div>  
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="storeCategory()">
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Category Name</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" 
                                    type="text" placeholder="Category name" 
                                    wire:model="name" wire:keyup="generateSlug()">
                                
                                <!--- Validation -->
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror    
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Category Slug</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" 
                                    type="text" placeholder="Category Slug" 
                                    wire:model="slug">
                                
                                <!--- Validation -->
                                @error('slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror     
                            </div>
                            
                            
                        </div>
                        <div class="form-group ">
                             <label class="col-md-4 control-label"> </label>      
                             <div class="col-md-4" >
                                <button class="btn btn-primary" type="submit">Create Category</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>

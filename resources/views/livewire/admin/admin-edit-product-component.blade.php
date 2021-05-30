<div class="container" style="padding: 30px 0">   
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Edit Product
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">All products</a>
                        </div>
                    </div>
                </div>  
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="updateProduct()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Product Name</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" 
                                    type="text" placeholder="Product name" 
                                    wire:model="name" wire:keyup="generateSlug()">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Product Slug</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" type="text" placeholder="Product Slug" wire:model="slug">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Short description</label>
                            <div class="col-md-4" >
                                <textarea class="form-control"  placeholder="Short description" wire:model="short_description"></textarea>
                            </div>                            
                        </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label"> Description</label>
                            <div class="col-md-4" >
                                <textarea class="form-control"  placeholder="Full description" wire:model="description"></textarea>
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Regular Price</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" type="number" placeholder="Regular price" wire:model="regular_price">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Sale Price</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" type="number" placeholder="Sale price" wire:model="sale_price">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> SKU</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" type="text" placeholder="SKU" wire:model="SKU">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Stock Status</label>
                            <div class="col-md-4" >
                                <select class="form-control" wire:model="stock_status">
                                    <option value="instock">In stock</option>
                                    <option value="outofstock">Out of stock</option>
                                </select>
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Featured</label>
                            <div class="col-md-4" >
                                <select class="form-control" wire:model="featured">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Quantity</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" type="number" placeholder="Quntity" wire:model="quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Product Image</label>
                            <div class="col-md-4" >
                                <input  type="file" class="input-file"  wire:model="new_image">
                                
                                @if ($new_image)
                                    <img src="{{ $new_image->temporaryUrl() }}" width="60" alt=""/>
                                @else
                                    <img src="{{ asset('assets/images/products') }}/{{ $image }}" width="60" height="60"/>
                                @endif
                            </div>                          
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Category</label>
                            <div class="col-md-4" >
                                <select class="form-control" wire:model="category_id">
                                    <option value="">Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>    
                                    @endforeach
                                    
                                </select>
                            </div>                            
                        </div>
                        
                        <div class="form-group ">
                             <label class="col-md-4 control-label"> </label>      
                             <div class="col-md-4" >
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>

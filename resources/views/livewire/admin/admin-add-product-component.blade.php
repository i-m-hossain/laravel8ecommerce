 <div class="container" style="padding: 30px 0">   
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Add Product
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
                    <form class="form-horizontal" wire:submit.prevent="storeProduct()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Product Name</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" 
                                    type="text" placeholder="Product name" 
                                    wire:model="name" wire:keyup="generateSlug()">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror    
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Product Slug</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" 
                                    type="text" placeholder="Product Slug" 
                                    wire:model="slug">
                                @error('slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror    
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Short description</label>
                            <div class="col-md-4" wire:ignore>
                                <textarea class="form-control" id="short_description" 
                                    placeholder="Short description" 
                                    wire:model="short_description">
                                </textarea>
                                @error('short_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>                            
                        </div>
                         <div class="form-group" wire:ignore>
                            <label class="col-md-4 control-label"> Description</label>
                            <div class="col-md-4" >
                                <textarea class="form-control"  id="description"
                                    placeholder="Full description" 
                                    wire:model="description">
                                </textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Regular Price</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" 
                                    type="number" placeholder="Regular price" 
                                    wire:model="regular_price">
                                @error('regular_price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Sale Price</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" type="text" 
                                    placeholder="Sale price" value="0" wire:model="sale_price">
                                @error('sale_price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                                                        
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> SKU</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" type="text" 
                                    placeholder="SKU" wire:model="SKU">
                                @error('SKU')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Stock Status</label>
                            <div class="col-md-4" >
                                <select class="form-control" wire:model="stock_status">
                                    <option value="instock">In stock</option>
                                    <option value="outofstock">Out of stock</option>
                                </select>
                                @error('stock_status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
                                <input class="form-control input-md" 
                                    type="number" placeholder="Quntity" 
                                    wire:model="quantity">
                                @error('quantity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Category</label>
                            <div class="col-md-4" >
                                <select class="form-control" wire:model="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>    
                                    @endforeach
                                    
                                </select>
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>                            
                        </div>
                        
                        <div class="form-group ">
                             <label class="col-md-4 control-label"> </label>      
                             <div class="col-md-4" >
                                <button class="btn btn-primary" type="submit">Create Product</button>
                            </div>
                        </div>
                       
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector: '#short_description',
                setup: function (editor) {
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description', sd_data);
                    })
                }
            });
            tinymce.init({
                selector: '#description',
                setup: function (editor) {
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#description').val();
                        @this.set('description', sd_data);
                    })
                }
            });
        });
    </script>
@endpush
<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Edit Coupon
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.coupons') }}" class="btn btn-success pull-right">All coupons</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form class="form-horizontal" wire:submit.prevent="updateCoupon()">
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Coupon Code</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" 
                                    type="text" placeholder="Coupon Code" 
                                    wire:model="code" >
                                
                                <!--- Validation -->
                                @error('code')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror    
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Coupon Type</label>
                            <div class="col-md-4" >
                                
                                <select class="form-control" name="" wire:model='type'>
                                    <option value="" >Select</option>
                                    <option value="fixed">fixed</option>
                                    <option value="percent">Percent</option>

                                </select>
                                
                                
                                <!--- Validation -->
                                @error('type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror     
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Coupon value</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" 
                                    type="text" placeholder="Coupon Value" 
                                    wire:model="value">
                                
                                <!--- Validation -->
                                @error('value')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror     
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> Cart value</label>
                            <div class="col-md-4" >
                                <input class="form-control input-md" 
                                    type="text" placeholder="Cart Value" 
                                    wire:model="cart_value">
                                
                                <!--- Validation -->
                                @error('cart_value')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror     
                            </div>
                        </div>
                        <div class="form-group ">
                             <label class="col-md-4 control-label"> </label>      
                             <div class="col-md-4" >
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

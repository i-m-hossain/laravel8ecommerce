<div class="container " style="padding:30px 0">
   <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Coupons
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{ route('admin.addcoupon') }}" class="pull-right btn btn-success">Add Coupon</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <table class="table table-light">
                        <thead class="thead-striped">
                            <tr>
                                <th>Id</th>
                                <th>Coupon Code</th>
                                <th>Coupon Type</th>
                                <th>Coupon Value</th>
                                <th>Cart value</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{ $coupon->id }}</td>
                                <td>{{ $coupon->code }} </td>
                                
                                <td>{{ $coupon->type }}</td>
                                @if ( $coupon->type == 'fixed')
                                    <td>${{ $coupon->value }}</td>
                                @else    
                                    <td>{{ $coupon->value }}%</td>
                                @endif
                                
                                <td>{{ $coupon->cart_value }}</td>
                                <td>{{ $coupon->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('admin.editcoupon', ['coupon_id'=> $coupon->id]) }}"><i class="fa fa-edit fa-2x"></i></a>
                                    <a href="#" onclick="confirm('Are you sure want to delete this?') || event.stopImmediatePropagation()"
                                            wire:click.prevent='deleteCoupon({{ $coupon->id }})'  
                                            style="margin-left: 15px" title="Delete"> 
                                            <i class="fa fa-times text-danger  fa-2x"></i>
                                    </a>            
                                </td>
                                
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>    
   </div>
</div>

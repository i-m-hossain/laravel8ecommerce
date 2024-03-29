<div>
    <style>
        nav svg{
            height:20px;
        }
        nav .hidden{
            display:block !important;
        }
    </style>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">             
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Products
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{ route('admin.addproduct') }}" class="pull-right btn btn-success">Add New Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get("message") }}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price($)</th>
                                    <th>Sale Price($)</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>                                
                                @foreach ( $products as $product )
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" alt="{{ $product->name }}" width="60px"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->stock_status }}</td>
                                        <td>{{ $product->regular_price }}</td>
                                        <td>{{ $product->sale_price }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('admin.editproduct',['product_slug'=>$product->slug]) }}" title="Edit"><i class="fa fa-edit fa-2x"></i> </a>
                                            <a href="#" onclick="confirm('are you sure want to delete this?')|| event.stopImmediatePropagation()"
                                                wire:click.prevent='deleteProduct({{ $product->id }})'  
                                                style="margin-left: 15px" title="Delete"> 
                                                <i class="fa fa-times text-danger  fa-2x"></i> 
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach                               
                            </tbody>                           
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div>
    <div class="container" style="padding: 30px 0">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        All Slider
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-success pull-right" href="{{ route('admin.addslider') }}">Add new slider</a>
                    </div>    
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-light">
                    <thead class="thead-light">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get("message") }}
                            </div>
                        @endif
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Price</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ($sliders as  $slider )
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td><img src="{{ asset('assets/images/slider') }}/{{ $slider->image }}" alt="{{ $slider->title }}"  width="120"  ></td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->subtitle }}</td>
                                    <td>{{ $slider->price }}</td>
                                    <td>{{ $slider->link }}</td>                                                                                      
                                    
                                    @if ($slider->status == 0)
                                        <td> <a class="btn btn-danger" title="Click to Active" wire:click.prevent="updateStatus({{ $slider->id }})">Inactive</a> </td>
                                    @else
                                        <td> <a class="btn btn-success" title="Click to Inactive" wire:click.prevent="updateStatus({{ $slider->id }})">Active</a></td>      
                                    @endif
                                    <td>{{ $slider->created_at->diffForHumans() }}</td>  
                                    
                                    <td>
                                        <a href="{{ route('admin.editslider',['slider_id'=>$slider->id]) }}" title="Edit"><i class="fa fa-edit fa-2x"></i> </a>
                                        <a href="#" wire:click.prevent='deleteSlider({{ $slider->id }})'  
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

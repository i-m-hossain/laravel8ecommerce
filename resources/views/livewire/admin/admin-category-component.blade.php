

<div>
    <style>
        nav svg{
            height:20px;
        }
        nav .hidden{
            display:block !important;
        }
    </style>

    <div class="container"  style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Categories
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addcategory') }}" class="btn btn-success pull-right">Add Category</a>
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
                                    <th>Sl</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <a href="{{ route('admin.editcategory',['cat_slug'=>$category->slug]) }}" title="Edit"><i class="fa fa-edit fa-2x"></i> </a>
                                            <a href="#" onclick="confirm('are you sure want to delete this?')|| event.stopImmediatePropagation()" 
                                                wire:click.prevent="deleteCategory({{ $category->id  }})" 
                                                style="margin-left: 15px" title="Delete"> 
                                                <i class="fa fa-times text-danger  fa-2x"></i> 
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>

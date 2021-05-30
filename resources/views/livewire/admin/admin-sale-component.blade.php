<div>
   <div class="conatainer" style="padding: 30px 0">
       <div class="row">
           <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading">
                        Sale Setting
                   </div>
                   <div class="panel-body">
                       @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                       @endif
                       <form class="form-horizontal" wire:submit.prevent='updateSale'>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model='status'>
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Sale date</label>
                                
                                <div class="col-md-4">
                                    
                                     <input type='text' class="form-control" id='sale_date' wire:model='sale_date'/>
                                    
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                               
                            </div>
                            
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>

@push('scripts')
    <script>
        $(function () {
            $('#sale_date').datetimepicker({
                format : 'Y-MM-DD h:m:s',
            })
            .on('dp.change', function (ev) {
                var data = $('#sale_date').val();
                @this.set('sale_date', data)
            });
        });
    </script>

@endpush
    
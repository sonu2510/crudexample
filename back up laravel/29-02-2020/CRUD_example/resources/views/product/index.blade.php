

@extends('common.default')

@section('header')
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Invoice</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">List</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                                 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
        
@endsection
  
@section('content')          
         
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
              
                    <div class="col-12">
                         <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Product  List</h5>
                                    <a href="/add_product">New Product</a>
                                  <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered zero_config">
                                       <thead>
                                            <tr class="border-0">
                                                <th class="border-0"></th>
                                                <th class="border-0">Product name</th>
                                                <th class="border-0">Details</th>
                                                <th class="border-0">Action</th>
                                                <th class="border-0">Details</th>                                                
                                                                                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                         
                                        </tfoot>
                                    </table>


                            </div>
                            </div>
                        </div>
                  </div>
             </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
    
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
         
            
              
@endsection

          
@section('footer_scripts')
<script type="text/javascript">

 
  $(function() {
     
        $dataTable = $('#zero_config').DataTable({
            processing: true,
            serverSide: true,     
            ajax: {
            url : 'product/datatable',
            type:'GET',
           
            
        }, 
        aoColumns: [  
            {data: 'id', name: 'id',orderable: false},
            {data: 'name', name: 'name'},
            {data: 'detail', name: 'detail'},   
            {data: 'action', name: 'action'},
            {data: 'delete', name: 'delete'},
            ],
           
        });
});

</script>
@endsection


@extends('common.default')

@section('header')
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Product </h4>
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
  <div class="row">
                    <!-- Column -->
              
                    <div class="col-12">
                         <div class="card">
                            <div class="card-body">
               {!! Form::open(['url' => '/store' ,'method' => 'post']) !!}
               {{ Form::hidden('id', isset($product_details) ? $product_details->id : '') }}
               {{ Form::token()}}
                

                      <div class="form-group row">
                        {{ Form::label('name','Product Name',['class'=>'col-sm-3 text-right control-label col-form-label']) }}
                        <div class="col-md-5">
                            {{Form::text('name',old('product_name', isset($product_details) ? $product_details->name : ''),['class' => 'form-control autocomplete_txt','required'=>'required','id'=>'product_name'])}}

                            @if ($errors->has('product_name'))
                              <span class="help-block">
                                <strong>{{ $errors->first('product_name') }}</strong>
                              </span>
                            @endif
                        </div>
                      </div>

                      <div class="form-group row">
                        {{ Form::label('product_details','Product Details',['class'=>'col-md-3 text-right control-label col-form-label']) }}
                        <div class="col-md-5">
                            {{Form::text('detail',old('product_details', isset($product_details) ? $product_details->detail : ''),['class' => 'form-control autocomplete_txt','required'=>'required','id'=>'product_details'])}}

                            @if ($errors->has('detail'))
                              <span class="help-block">
                                <strong>{{ $errors->first('detail') }}</strong>
                              </span>
                            @endif
                        </div>
                      </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <?php if(isset($product_details)){   ?>
                                <button type="submit" name="Update" class="btn btn-info">
                                   Update
                                </button>
                              <?php }else{?>
                                     <button type="submit" name="save" class="btn btn-success">
                                   Save
                                </button>
                              <?php }?>

                              <a href="/product" name="cancel" class="btn btn-secondary"> Cancel </a>
                            </div>

                        </div>

                {!! Form::close() !!}

                  
                    
            
            </div>
        </div>
    </div>
</div>
@endsection
              

          
@section('footer_scripts')
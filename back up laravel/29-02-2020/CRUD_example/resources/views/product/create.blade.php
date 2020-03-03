@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Product</div>
               
                <div class="card-body">
               {!! Form::open(['url' => '/store' ,'method' => 'post']) !!}

               {{ Form::token()}}
                

                      <div class="form-group row">
                        {{ Form::label('name','Product Name',['class'=>'col-md-3 text-right control-label col-form-label']) }}
                        <div class="col-md-5">
                            {{Form::text('name',old('product_name', isset($product_details) ? $product_details->product_name : ''),['class' => 'form-control autocomplete_txt','required'=>'required','id'=>'product_name'])}}

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
                            {{Form::text('detail',old('product_details', isset($product_details) ? $product_details->product_details : ''),['class' => 'form-control autocomplete_txt','required'=>'required','id'=>'product_details'])}}

                            @if ($errors->has('detail'))
                              <span class="help-block">
                                <strong>{{ $errors->first('detail') }}</strong>
                              </span>
                            @endif
                        </div>
                      </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="save" class="btn btn-primary">
                                   Save
                                </button>
                            </div>
                        </div>

                {!! Form::close() !!}

                  
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

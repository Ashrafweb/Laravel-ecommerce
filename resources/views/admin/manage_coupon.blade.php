@extends('admin/layout')

@section('container')

<h1>Manage Coupon</h1>
<a href="{{url('admin/coupon')}}"><button type="" class="btn btn-success mt-3">Back</button>
</a>
                     <div class="row">
                            <div class="col-lg-12 mt-3">
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Coupon</h3>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/coupon/manage_coupon/insert')}}" method="post" novalidate="novalidate">
                                            @csrf  
                                          <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label for="coupon_name" class="control-label mb-1">Coupon Name</label>
                                                <input id="coupon_name" name="coupon_name" type="text" class="form-control" aria-required="true" aria-invalid="false" 
                                                  autocomplete="off"
                                                 value= {{$coupon_name}}>
                                            </div>
                                            @error('coupon_name')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                                     
                                            @enderror
                                           
                                            <div class="form-group has-success col-lg-6">
                                                <label for="code" class="control-label mb-1">Code</label>
                                                <input id="code" name="code" type="text" class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                autocomplete="off" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value={{$code}}>
                                            
                                            </div>
                                            @error('code')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                            </div>

                                            <div class="row">

                                            <div class="form-group has-success col-lg-6">
                                                <label for="coupon_price" class="control-label mb-1">Value</label>
                                                <input id="coupon_price" name="price" type="text" class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                aria-required="true" aria-invalid="false"
                                                autocomplete="off"
                                                     aria-describedby="cc-name-error"value={{$price}}>
                                            
                                            </div>
                                            @error('coupon_price')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                           
                                                <div class="form-group has-success col-6">
                                                    <label for="type" class="control-label mb-1">Type</label>
                                                    <select id="type" name="type"class="form-control-sm form-control" required>

                                                    @if($type=="Per")
                                                    <option value="Value">Value</option>
                                                    <option value="Per" selected>Per</option>
                                                    @elseif($type=="Value")
                                                    <option value="Value" selected>Value</option>
                                                    <option value="Per">Per</option>
                                                    @else
                                                    <option value="Value">Value</option>
                                                    <option value="Per">Per</option>
                                                    @endif
                                                    
                                                    </select>
                                                </div>
                                                @error('type')

                                                <div class="alert alert-danger"> {{$message}}</div>
                                                            
                                                @enderror

                                            </div>

                                            <div class="row">
                                            
                                            <div class="form-group has-success col-lg-6">
                                                <label for="min_order_amount" class="control-label mb-1">Min_order_amount</label>
                                                <input id="min_order_amount" name="min_order_amount" type="text" class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="false" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value={{$min_order_amount}}>
                                            
                                            </div>
                                            @error('min_order_amount')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                            <div class="form-group has-success col-6">
                                                    <label for="is_one_time" class="control-label mb-1">is_one_time</label>
                                                    <select id="is_one_time" name="is_one_time"class="form-control-sm form-control" required>

                                                    @if($is_one_time=="0")
                                                    <option value="1">Yes</option>
                                                    <option value="0" selected>No</option>
                                                   
                                                    @else
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                    @endif
                                                    
                                                    </select>
                                                </div>
                                                @error('is_one_time')

                                                <div class="alert alert-danger"> {{$message}}</div>
                                                            
                                                @enderror
                                            
                                            </div>
                                            <input type="hidden" value="{{$id}}" name="id"/>
                                            <div>
                                                <button id="coupon_button" type="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="add_coupon">Submit</span>
                                                  
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                      
@endsection


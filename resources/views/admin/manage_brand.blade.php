@extends('admin/layout')

@section('container')

@if($id>0)
{{$image_required = ""}}
@else
{{$image_required = "required"}}
@endif


<h1>Manage Brand</h1>
<a href="{{url('admin/brand')}}"><button type="" class="btn btn-success mt-3">Back</button>
</a>
                     <div class="row">
                            <div class="col-lg-12 mt-3">
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Brand</h3>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/brand/manage_brand/insert')}}" method="post" novalidate="novalidate"
                                        enctype="multipart/form-data">
                                            @csrf  
                                          
                                            <div class="form-group">
                                                <label for="brand_name" class="control-label mb-1">Brand Name</label>
                                                <input id="brand_name" name="brand_name" type="text" class="form-control" aria-required="true" aria-invalid="false"
                                                 value= {{$brand_name}}>
                                            </div>
                                            @error('category_name')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                                     
                                            @enderror

                                            <div class="form-group has-success">
                                                <label for="brand_slug" class="control-label mb-1">Brand Slug</label>
                                                <input id="brand_slug" name="brand_slug" type="text" class="form-control cc-name valid" 
                                                    data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                    aria-describedby="cc-name-error"value={{$brand_slug}}>
                                            
                                            </div>
                                            @error('brand_slug')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror
                                           
                                            <div class="form-group has-success">
                                                <label for="image" class="control-label mb-1">Image</label>
                                                <input id="image" name="image" type="file"  class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                aria-describedby="cc-name-error"value="{{$image}}" {{$image_required}}>
                                            
                                            </div>
                                            @error('image')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror
                                            
                                            <div class="row">
                                                <div class="form-group has-success col-3">
                                                    <label for="is_home" class="control-label mb-1">Is_home</label>
                                                    <select id="is_home" name="is_home"class="form-control-sm form-control" required>

                                                    @if($is_home=="0")
                                                    <option value="1">Yes</option>
                                                    <option value="0" selected>No</option>
                                                    @else
                                                    <option value= 1 >Yes</option>
                                                    <option value=0>No</option>
                                                    @endif
                                                    
                                                    </select>
                                                </div>
                                                @error('is_home')

                                                <div class="alert alert-danger"> {{$message}}</div>
                                                            
                                                @enderror

                                            </div>
                                            <input type="hidden" value="{{$id}}" name="id"/>
                                            <div>
                                                <button id="brand_button" type="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="add_brand">Submit</span>
                                                  
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                      
@endsection


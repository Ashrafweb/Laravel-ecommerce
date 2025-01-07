@extends('admin/layout')

@section('container')

@if($id>0)
{{$image_required = ""}}
@else
{{$image_required = "required"}}
@endif


<h1>Manage Banner</h1>
<a href="{{url('admin/banner')}}"><button type="" class="btn btn-success mt-3">Back</button>
</a>
                     <div class="row">
                            <div class="col-lg-12 mt-3">
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Banner</h3>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/banner/manage_banner/insert')}}" method="post" novalidate="novalidate"
                                        enctype="multipart/form-data">
                                            @csrf  
                                          
                                            <div class="form-group">
                                                <label for="banner_name" class="control-label mb-1">Banner Name</label>
                                                <input id="banner_name" name="banner_name" type="text" class="form-control" aria-required="true" aria-invalid="false"
                                                 value= {{$banner_name}}>
                                            </div>
                                            @error('banner_name')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                                     
                                            @enderror

                                            <div class="form-group">
                                                <label for="banner_heading" class="control-label mb-1">Banner Heading</label>
                                                <input id="banner_heading" name="banner_heading" type="text" class="form-control" aria-required="true" aria-invalid="false"
                                                 value= {{$banner_heading}}>
                                            </div>
                                            @error('banner_heading')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                                     
                                            @enderror

                                            <div class="form-group has-success">
                                                <label for="banner_text" class="control-label mb-1">Banner text</label>
                                                <input id="banner_text" name="banner_text" type="text" class="form-control cc-name valid" 
                                                    data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                    aria-describedby="cc-name-error"value={{$banner_text}}>
                                            
                                            </div>
                                            @error('banner_text')

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
                                       
                                              

                                            </div>
                                            <input type="hidden" value="{{$id}}" name="id"/>
                                            <div>
                                                <button id="banner_button" type="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="add_banner">Submit</span>
                                                  
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                      
@endsection


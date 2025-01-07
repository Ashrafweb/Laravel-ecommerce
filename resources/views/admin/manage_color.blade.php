@extends('admin/layout')

@section('container')



<h1>Manage Color</h1>
<a href="{{url('admin/category')}}"><button type="" class="btn btn-success mt-3">Back</button>
</a>
                     <div class="row">
                            <div class="col-lg-12 mt-3">
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Color</h3>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/color/manage_color/insert')}}" method="post" novalidate="novalidate"
                                        enctype="multipart/form-data">
                                            @csrf  
                                          
                                            <div class="form-group">
                                                <label for="color_name" class="control-label mb-1">Color Name</label>
                                                <input id="color_name" name="color_name" type="text" class="form-control" aria-required="true" aria-invalid="false"
                                                 value= {{$color_name}}>
                                            </div>
                                            @error('color_name')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                                     
                                            @enderror
                                            
                                            </div>
                                            <input type="hidden" value="{{$id}}" name="id"/>
                                            <div>
                                                <button id="color_button" type="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="add_color">Submit</span>
                                                  
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                      
@endsection


@extends('admin/layout')

@section('container')



<h1>Manage Size</h1>
<a href="{{url('admin/category')}}"><button type="" class="btn btn-success mt-3">Back</button>
</a>
                     <div class="row">
                            <div class="col-lg-12 mt-3">
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Size</h3>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/size/manage_size/insert')}}" method="post" novalidate="novalidate"
                                        enctype="multipart/form-data">
                                            @csrf  
                                          
                                            <div class="form-group">
                                                <label for="size_name" class="control-label mb-1">Size Name</label>
                                                <input id="size_name" name="size_name" type="text" class="form-control" aria-required="true" aria-invalid="false"
                                                 value= {{$size_name}}>
                                            </div>
                                            @error('size_name')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                                     
                                            @enderror

                                            </div>
                                            <input type="hidden" value="{{$id}}" name="id"/>
                                            <div>
                                                <button id="category_button" type="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="add_category">Submit</span>
                                                  
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                      
@endsection


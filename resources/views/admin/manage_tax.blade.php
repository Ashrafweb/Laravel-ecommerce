@extends('admin/layout')

@section('container')



<h1>Manage Tax</h1>
<a href="{{url('admin/tax')}}"><button type="" class="btn btn-success mt-3">Back</button>
</a>
                     <div class="row">
                            <div class="col-lg-12 mt-3">
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Tax</h3>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/tax/manage_tax/insert')}}" method="post" novalidate="novalidate"
                                        enctype="multipart/form-data">
                                            @csrf  
                                          
                                            <div class="form-group">
                                                <label for="type" class="control-label mb-1">Type</label>
                                                <input id="type" name="type" type="text" class="form-control" aria-required="true" aria-invalid="false"
                                                 value= {{$type}}>
                                            </div>
                                            @error('type')

                                            <div class="alert alert-danger"> 
                                                 {{$message}}
                                            </div>
                                                                     
                                            @enderror

                                            <div class="form-group">
                                                <label for="per" class="control-label mb-1">Percentage Value</label>
                                                <input id="per" name="per" type="text" class="form-control" aria-required="true" aria-invalid="false"
                                                 value= {{$type}}>
                                            </div>
                                            @error('per')

                                            <div class="alert alert-danger"> 
                                                 {{$message}}
                                            </div>
                                                                     
                                            @enderror

                                            </div>
                                            <input type="hidden" value="{{$id}}" name="id"/>
                                            <div>
                                                <button id="category_button" type="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="add_tax">Submit</span>
                                                  
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                      
@endsection


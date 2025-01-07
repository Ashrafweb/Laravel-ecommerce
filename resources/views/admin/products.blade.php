@extends('admin/layout')

@section('container')

@if(Session::has('message'))
  <div class="alert alert-success">{{session('message')}}</div>                        
@endif
<h1>Products</h1>
<a href='products/manage_products'><button type="" class="btn btn-success mt-3">Add Product</button>
</a>
<div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                                <th>ID</th>
                                                <th>Product Name</th>                                             
                                                <th>Image</th>
                                                <th>slug</th>
                                                <th>status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $list)
                                        
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td>{{$list->product_name}}</td>
                                                <td>
                                               @if($list->image!="")
                                                 <img src="{{asset('storage/media/'.$list->image)}}"
                                                   width="60px"/></td>
                                                
                                             
                                                @endif   
                                             </td>
                                                <td>{{$list->slug}}</td>                                         
                                                <td>
                                                @if($list->status=="0")
                                                <a href='products/manage_products/status/{{$list->id}}'>
                                                <button type="" class="btn btn-warning">Inactive</button>
                                                </a>
                                                @else
                                                <a href='products/manage_products/status/{{$list->id}}'>
                                                <button type="" class="btn btn-success">Active</button>
                                                </a>

                                                @endif
                                                
                                                </td>
                                                <td>
                                              

                                                <a href='products/manage_products/edit/{{$list->id}}'>
                                                <button type="" class="btn btn-primary">Edit</button>
                                                </a>

                                                <a href='products/delete/{{$list->id}}'>
                                                <button type="" class="btn btn-danger">Delete</button>
                                                </a>
                                                
                                                
                                                
                                                </td>
                                            
                                            </tr>
                                         @endforeach
                                         
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
@endsection


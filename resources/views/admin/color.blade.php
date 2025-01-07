@extends('admin/layout')

@section('container')

@if(Session::has('message'))
  <div class="alert alert-success">{{session('message')}}</div>                        
@endif
<h1>Color</h1>
<a href='color/manage_color'><button type="" class="btn btn-success mt-3">Add Color</button>
</a>
<div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                                <th>ID</th>
                                                <th>Color Name</th>                                             
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $list)
                                        
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td>{{$list->color_name}}</td>
                                                   

                                                <td>
                                                @if($list->status=="0")
                                                <a href='color/manage_color/status/{{$list->id}}'>
                                                <button type="" class="btn btn-warning">Inactive</button>
                                                </a>
                                                @else
                                                <a href='color/manage_color/status/{{$list->id}}'>
                                                <button type="" class="btn btn-success">Active</button>
                                                </a>

                                                @endif
                                                
                                                </td>
                                                <td>
                                              

                                                <a href='color/manage_color/edit/{{$list->id}}'>
                                                <button type="" class="btn btn-primary">Edit</button>
                                                </a>

                                                <a href='color/delete/{{$list->id}}'>
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


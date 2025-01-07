@extends('admin/layout')

@section('container')

@if(Session::has('message'))
  <div class="alert alert-success">{{session('message')}}</div>                        
@endif
<h1>banner</h1>
<a href='banner/manage_banner'><button type="" class="btn btn-success mt-3">Add banner</button>
</a>
<div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                                <th>ID</th>
                                                <th>banner Name</th>                                             
                                                
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $list)
                                        
                                            <tr>
                                                <td>{{$list->id}}</td>
                                                <td>{{$list->banner_name}}</td>
                                                
                                                <td>
                                                    @if($list->image!="")

                                                        <img src="{{asset('storage/media/'.$list->image)}}"
                                                        width="60px"/></td>
                                                                                                        
                                                    @endif   
                                             </td>                                        
                                                <td>
                                                @if($list->status=="0")
                                                <a href='banner/manage_banner/status/{{$list->id}}'>
                                                <button type="" class="btn btn-warning">Inactive</button>
                                                </a>
                                                @else
                                                <a href='banner/manage_banner/status/{{$list->id}}'>
                                                <button type="" class="btn btn-success">Active</button>
                                                </a>

                                                @endif
                                                
                                                </td>
                                                <td>
                                              

                                                <a href='banner/manage_banner/edit/{{$list->id}}'>
                                                <button type="" class="btn btn-primary">Edit</button>
                                                </a>

                                                <a href='banner/delete/{{$list->id}}'>
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


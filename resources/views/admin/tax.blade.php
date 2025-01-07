@extends('admin/layout')

@section('container')

@if(Session::has('message'))
  <div class="alert alert-success">{{session('message')}}</div>                        
@endif
<h1>Tax</h1>
<a href='tax/manage_tax'><button type="" class="btn btn-success mt-3">Add Tax</button>
</a>
<div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                                <th>ID</th>
                                                <th>Tax Type</th>                                             
                                                <th>Value</th>
                                                <th>Status</th>
                                                <th>Action</th>                                            
                                        </thead>
                                        <tbody>
                                        @foreach($data as $tax)
                                        
                                            <tr>
                                                <td>{{$tax->id}}</td>
                                                <td>{{$tax->type}}</td>
                                                <td>{{$tax->percentage}}</td>     
                                                <td>
                                                @if($list->status=="0")
                                                <a href='tax/manage_tax/status/{{$tax->id}}'>
                                                <button type="" class="btn btn-warning">Inactive</button>
                                                </a>
                                                @else
                                                <a href='tax/manage_tax/status/{{$tax->id}}'>
                                                <button type="" class="btn btn-success">Active</button>
                                                </a>

                                                @endif
                                                
                                                </td>
                                                <td>
                                              

                                                <a href='tax/manage_tax/edit/{{$tax->id}}'>
                                                <button type="" class="btn btn-primary">Edit</button>
                                                </a>

                                                <a href='tax/delete/{{$tax->id}}'>
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


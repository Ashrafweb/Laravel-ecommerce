@extends('admin/layout')

@section('container')

@if(Session::has('message'))
  <div class="alert alert-success">{{session('message')}}</div>                        
@endif
<h1>Customers</h1>

</a>
<div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                                <th>Action</th>
                                                <th>USER_ID</th>                                             
                                                
                                                <th>Name</th>
                                                
                                                <th>Email</th>
                                                <th>Created at</th>
                                                
                                                
                            
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            
                                            <tr>
                                            
                                                <td><a href="">
                                                <button type="" class="btn btn-primary">View</button>
                                                </a></td>
                                                <td>{{$user->id}}</td>
                                                
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->created_at}}</td>
                                                </a>                                    
                                            </tr>
                                  
                                         @endforeach
                                         
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
@endsection


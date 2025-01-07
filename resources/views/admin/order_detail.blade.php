@extends('admin/layout')

@section('container')

@if(Session::has('message'))
  <div class="alert alert-success">{{session('message')}}</div>                        
@endif
<h1>Order Details</h1>
<a href="{{url('admin/order')}}"><button type="" class="btn btn-success mt-3">Back</button>
</a>
              <div class="row m-t-30">
                            <div class="col-md-12 ">
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Update Status</h3>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/order/order_detail/update')}}" method="post" novalidate="novalidate"
                                        enctype="multipart/form-data">
                                            @csrf  
                                            
                                            <div class="form-group">
                                               
                                                <div class="form-group has-success col-3">
                                                    <label for="status" class="control-label mb-1">Status =
                                                         <b>{{$status[0]->status}}</b></label>
                                                    <select id="status" name="status"class="form-control-sm form-control" required>
                                                

                                                    <option selected>Select status</option> 
                                                    <option value="pending">Pending</option>
                                                    <option value="onway">On way</option>
                                                    <option value="delivered">Delivered</option>
                                                    <option value="cancelled">Cancelled</option>
                                                 
                                                    </select>
                                                </div>
                                          

                                            </div>
                                            <input type="hidden" value="{{$id}}" name="id"/>
                                            <div>
                                                <button id="category_button" type="submit" class="btn btn-md btn-info btn-block">
                                                   
                                                    <span id="add_category">Update</span>
                                                  
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                             
                            </div>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                                <th>ID</th>
                                               
                                                <th>order_id</th>
                                                <th>product_id</th>
                                                <th>attr_id</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Added_on</th>
                                            
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($details as $order)
                                        
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->order_id}}</td>
                                                <td>{{$order->product_id}}</td>
                                                     

                                                <td>
                                                    {{$order->attr_id}}
                                                </td>
                                                <td>{{$order->qty}}</td>
                                                <td>{{$order->price}}</td>
                                                <td>{{$order->added_on}}</td>                                         
                                            </tr>
                                         @endforeach
                                         
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
@endsection


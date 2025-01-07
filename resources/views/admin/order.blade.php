@extends('admin/layout')

@section('container')

@if(Session::has('message'))
  <div class="alert alert-success">{{session('message')}}</div>                        
@endif
<h1>Orders</h1>

</a>
<div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                                <th>Action</th>
                                                <th>USER_ID</th>                                             
                                                <th>unique_order_id</th>
                                                <th>MOBILE</th>
                                                
                                                <th>Email</th>
                                                <th>Name</th>
                                                <th>Address</th>                                             
                                                <th>City</th>
                                                <th>Zip/Postcode</th>
                                                <th>Country</th>
                                                <th>Appartment</th>
                                                <th>Special Notes</th>
                                                <th>Total_price</th>                                             
                                                <th>Payment_Method</th>
                                                <th>Coupon</th>
                                                <th>status</th>
                                                
                                                
                            
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            
                                            <tr>
                                            
                                                <td><a href="order/order_detail/{{$order->unique_order_id}}">
                                                <button type="" class="btn btn-primary">View</button>
                                                </a></td>
                                                <td>{{$order->user_id}}</td>
                                                <td>{{$order->unique_order_id}}</td>
                                                <td>{{$order->mobile}}</td>
                                                <td>{{$order->email}}</td>
                                                <td>{{$order->name}}</td>
                                                <td>{{$order->address}}</td>
                                                <td>{{$order->city}}</td>
                                                <td>{{$order->zip_post_code}}</td>
                                                <td>{{$order->country}}</td>
                                                <td>{{$order->apartment_suite}}</td>
                                                <td>{{$order->special_notes}}</td>
                                                <td>{{$order->total_price}}</td>
                                                <td>{{$order->payment_method}}</td>
                                                <td>{{$order->coupon}}</td>
                                                <td>{{$order->status}}</td>
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


@extends('admin/layout')

@section('container')
@if($id>0)
{{$image_required = ""}}
@else
{{$image_required = "required"}}
@endif

<h1>Manage Product</h1>
<a href="{{url('admin/products')}}"><button type="" class="btn btn-success mt-3">Back</button>
</a>
<form action="{{url('admin/products/manage_products/insert')}}" method="post"
                                        enctype="multipart/form-data" novalidate="novalidate">
                                            @csrf 
                     <div class="row">
                            <div class="col-lg-12 mt-3">
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Coupon</h3>
                                        </div>
                                        <hr>
                                       
                                    

                                            <div class="form-group">
                                                <label for="product_name" class="control-label mb-1">Product Name</label>
                                                <input id="product_name" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false"
                                                 value= "{{$product_name}}">
                                            </div>
                                            @error('product_name')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                                     
                                            @enderror

                                            <div class="form-group">
                                                <label for="slug" class="control-label mb-1">Slug</label>
                                                <input id="slug" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false"
                                                 value= "{{$slug}}" >
                                            </div>
                                            @error('slug')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                                     
                                            @enderror
                                            <div class="form-group">
                                                <label for="brand" class="control-label mb-1">Brand Name</label>
                                                <input id="brand" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false"
                                                 value= "{{$brand}}">
                                            </div>
                                            @error('brand')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                                     
                                            @enderror
                                            <div class="form-group">
                                                <label for="model" class="control-label mb-1">Model Name</label>
                                                <input id="model" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false"
                                                 value= "{{$model}}" >
                                            </div>
                                            @error('model')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                                     
                                            @enderror
                                            <div class="form-group has-success">
                                                <label for="keywords" class="control-label mb-1">keywords</label>
                                                <input id="keywords" name="keywords" type="text" class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="{{$keywords}}" >
                                            
                                            </div>
                                            @error('keywords')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                            <div class="form-group has-success">
                                                <label for="desc" class="control-label mb-1">desc</label>
                                                <input id="desc" name="desc" type="text" class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="{{$desc}}" >
                                            
                                            </div>
                                            @error('desc')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                            <div class="form-group has-success">
                                                <label for="short_desc" class="control-label mb-1">short_desc</label>
                                                <input id="short_desc" name="short_desc" type="text" class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="{{$short_desc}}">
                                            
                                            </div>
                                            @error('short_desc')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                            <div class="form-group has-success">
                                                <label for="technical_specification" class="control-label mb-1">Technical specification</label>
                                                <input id="technical_specification" name="technical_specification" type="textarea" class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="{{$technical_specification}}">
                                            
                                            </div>
                                            @error('technical_specification')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                            <div class="form-group has-success">
                                                <label for="uses" class="control-label mb-1">uses</label>
                                                <input id="uses" name="uses" type="text" class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="{{$uses}}">
                                            
                                            </div>
                                            @error('uses')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                            <div class="form-group has-success">
                                                <label for="warranty" class="control-label mb-1">warranty</label>
                                                <input id="warranty" name="warranty" type="text" class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="{{$warranty}}">
                                            
                                            </div>
                                            @error('warranty')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                            <div class="form-group has-success">
                                                <label for="image" class="control-label mb-1">Image</label>
                                                <input id="image" name="image" type="file"  class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="{{$image}}" {{$image_required}}>
                                            
                                            </div>
                                            @error('image')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror
                                           
                                            <div class="form-group has-success">
                                                <label for="category_id" class="control-label mb-1">category</label>
                                                <select id="category_id" name="category_id"class="form-control-sm form-control" required>
                                                    <option>Select Category</option>
                                                     @foreach($category as $list)
                                                        @if($category_id==$list->id)
                                                        <option value = "{{$list->id}}" selected > {{$list->category_name}}</option>
                                                        @else
                                                        <option value = "{{$list->id}}"> {{$list->category_name}}</option>
                                                        @endif

                                                    
                                                     @endforeach 
                                                </select>
                                            </div>
                                            @error('category_id')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                            <div class="row">
                                                
                                            <div class="form-group has-success col-4">
                                                <label for="lead_time" class="control-label mb-1">Lead Time</label>
                                                <input id="lead_time" name="lead_time" type="text" required class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="{{$lead_time}}">
                                            
                                            </div>
                                            @error('lead_time')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                            <div class="form-group has-success col-4">
                                                <label for="tax" class="control-label mb-1">Tax</label>
                                                <input id="tax" name="tax" type="text" required class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="{{$tax}}">
                                            
                                            </div>
                                            @error('tax')

                                            <div class="alert alert-danger"> {{$tax}}</div>
                                                          
                                            @enderror

                                            <div class="form-group has-success col-4">
                                                <label for="tax_type" class="control-label mb-1">Tax type</label>
                                                <input id="tax_type" name="tax_type" type="text" required class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="{{$tax_type}}">
                                            
                                            </div>
                                            @error('tax_type')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror


                                            </div>

                                            <div class="row">
                                                <div class="form-group has-success col-3">
                                                    <label for="is_promo" class="control-label mb-1">Is_promo</label>
                                                    <select id="is_promo" name="is_promo"class="form-control-sm form-control" required>

                                                    @if($list->is_promo="0")
                                                    <option value="1">Yes</option>
                                                    <option value="0" selected>No</option>
                                                    @else
                                                    <option value= 1 >Yes</option>
                                                    <option value=0>No</option>
                                                    @endif
                                                    
                                                    </select>
                                                </div>
                                                @error('is_promo')

                                                <div class="alert alert-danger"> {{$message}}</div>
                                                            
                                                @enderror

                                                <div class="form-group has-success col-3">
                                                <label for="is_trending" class="control-label mb-1">Is_trending</label>
                                                <select id="is_trending" name="is_trending"class="form-control-sm form-control" required>

                                                   @if($list->is_trending="0")
                                                   <option value='1'>Yes</option>
                                                   <option value='0' selected>No</option>
                                                   @else
                                                   <option value='1' selected>Yes</option>
                                                   <option value='0'>No</option>
                                                   @endif
                                                   
                                                </select>
                                            </div>
                                            @error('is_trending')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                            <div class="form-group has-success col-3">
                                                    <label for="is_discounted" class="control-label mb-1">Is_discounted</label>
                                                    <select id="is_discounted" name="is_discounted"class="form-control-sm form-control" required>

                                                    @if($list->is_discounted="0")
                                                    <option value='1'>Yes</option>
                                                    <option value='0' selected>No</option>
                                                    @else
                                                    <option value='1' selected>Yes</option>
                                                    <option value='0'>No</option>
                                                    @endif
                                                    
                                                    </select>
                                                </div>
                                                @error('is_discounted')

                                                <div class="alert alert-danger"> {{$message}}</div>
                                                            
                                                @enderror

                                                <div class="form-group has-success col-3">
                                                    <label for="is_featured" class="control-label mb-1">Is_featured</label>
                                                    <select id="is_featured"  name="is_featured"class="form-control-sm form-control" required>

                                                    @if($list->is_featured="0")
                                                    <option value='1'>Yes</option>
                                                    <option value='0' selected>No</option>
                                                    @else
                                                    <option value='1' selected>Yes</option>
                                                    <option value='0'>No</option>
                                                    @endif
                                                    
                                                    </select>
                                                </div>
                                                @error('is_featured')

                                                <div class="alert alert-danger"> {{$message}}</div>
                                                            
                                                @enderror


                                                </div>
                                 
                                        
                                     
                                    </div>
                                    
                                </div>
                              
                       <!-- //////////////////////////  Product Attribute        /////////////////////////////////        -->
                       <b> <h1 class="text-left ">Attribute</h1>
</b>
                               <?php
                                $del_loop = 0;
                               ?>
                                   @foreach($productsAttrArr as $key=>$val)
                                  
                                    <?php
                                            $attrarr = (array)$val ; 
                                            $del_loop++;
                                            $sku = $attrarr['sku'];
                                    ?>
                             
                              <div class="row" id="updaterow{{$del_loop}}">
                                <div class="col-lg-12 mt-3">
                                  <div class="card">
                                          
                                    <div class="card-body">
                                      
                                        <form>

                                        <div class="row">
                                            <div class="form-group has-success col-2">
                                                <label for="mrp" class="control-label mb-1">MRP</label>
                                                <input id="mrp" name="mrp[]" type="text" required class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="{{$attrarr['mrp']}}">
                                            
                                            </div>
                                            @error('mrp')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                                   
                                            <div class="form-group has-success col-2">
                                                <label for="price" class="control-label mb-1">Price</label>
                                                <input id="price" name="price[]" type="text" required class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="{{$attrarr['price']}}">
                                            
                                            </div>
                                            @error('price')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                                   
                                            <div class="form-group has-success col-2">
                                                <label for="qty" class="control-label mb-1">Quantity</label>
                                                <input id="qty" name="qty[]" type="text" required class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="{{$attrarr['qty']}}">
                                            
                                            </div>
                                            @error('qty')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror
                                        
                                                              
                                            <div class="form-group has-success col-2">
                                                <label for="sku" class="control-label mb-1">SKU</label>
                                                <input id="sku" name="sku[]" type="text" required class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="{{$attrarr['sku']}}">
                                            
                                            </div>
                                            @error('sku')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                            
                                            <div class="form-group has-success col-4">
                                                        <label for="attr_image" class="control-label mb-1">Image</label>
                                                        <input id="attr_image" name="attr_image[]" type="file"  class="form-control cc-name valid" 
                                                        data-val="true" data-val-required="Please enter the name on card"
                                                            autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                            aria-describedby="cc-name-error"value="{{$attrarr['image']}}" {{$image_required}}>
                                                    
                                                    </div>
                                                    @error('attr_image')

                                                    <div class="alert alert-danger"> {{$message}}</div>
                                                                
                                                    @enderror

                                            
                                            </div>

                                            <div class="row">

                                
                                                    <div class="form-group has-success col-3">
                                                        <label for="size_id" class="control-label mb-1">Size</label>
                                                        <select id="size_id" name="size_id[]"class="form-control-sm form-control" required>
                                                            <option>Select Category</option>
                                                            @foreach($size as $list)
                                                                @if($attrarr['size_id']==$list->id)
                                                                <option value = "{{$list->id}}" selected > {{$list->size_name}}</option>
                                                                @else
                                                                <option value = "{{$list->id}}"> {{$list->size_name}}</option>
                                                                @endif

                                                            
                                                            @endforeach 
                                                        </select>
                                                    </div>
                                                    @error('size_id')

                                                    <div class="alert alert-danger"> {{$message}}</div>
                                                                
                                                    @enderror

                                                    
                                                    <div class="form-group has-success col-3">
                                                        <label for="color_id" class="control-label mb-1">Color</label>
                                                        <select id="color_id" name="color_id[]"class="form-control-sm form-control" required>
                                                            <option>Select Color</option>
                                                            @foreach($color as $list)
                                                                @if($attrarr['color_id']==$list->id)
                                                                <option value = "{{$list->id}}" selected > {{$list->color_name}}</option>
                                                                @else
                                                                <option value = "{{$list->id}}"> {{$list->color_name}}</option>
                                                                @endif
    
                                                            @endforeach 
                                                        </select>
                                                    </div>
                                                    @error('color_id')

                                                    <div class="alert alert-danger"> {{$message}}</div>
                                                                
                                                    @enderror
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    @if($id>0 && $del_loop>1)

                                                    <div class="form-group has-success col-3 mt-2"> 
                                                        <button type="button" class="btn btn-danger mt-3" onclick="delete_attr({{$del_loop}},y='{{$sku}}');"><i class="fa fa-minus">
                                                        </i>&nbsp;&nbsp;Delete</button>
                                            
                                                </div> 
                                                    

                                                    @else
                                                    <div class="form-group has-success col-3 mt-2"> 
                                                 
                                                    
                                                 <button type="button" class="btn btn-success mt-3" onclick="add_attribute();"><i class="fa fa-plus">
                                                 </i>&nbsp;&nbsp;Add</button>
                                                 <button type="button" class="btn btn-danger mt-3" onclick="delete_attr({{$del_loop}},y='{{$sku}}');"><i class="fa fa-minus">
                                                        </i>&nbsp;&nbsp;Delete</button>
                                            
                                                </div> 

                                              


                                                    @endif        

                                            </div>


                                
                                               
                                   </div>
                                  </div>
                                </div>
                        
                              </div>      
                                    
                                     
                                     @endforeach
                                     <div class="add-attribute" id="attribute"></div> 
                                @if($id>0)
                                <div class="form-group has-success col-3 mt-2"> 
                                                 
                                    
                                    <button type="button" class="btn btn-success mt-3" onclick="add_attribute();"><i class="fa fa-plus">
                                    </i>&nbsp;&nbsp;Add</button>
                            
                                </div> 
                                @endif

                            <input type="hidden" value="{{$id}}" name="id"/>
                                            <div>
                                                <button id="product_button" type="submit" class="btn btn-lg btn-info btn-block">
                                                   
                                                    <span id="add_product">Submit</span>
                                                  
                                                </button>
                                            </div>
                               
                            </div>



                                   </form>
                            <script>

                             
                                var loop = 1 ;

                                function add_attribute(){
                                  loop++ ; 
                                  var attr= `

                          <div  id="product_attr_`+loop+`">
                                      
                              <div class="row">
                                <div class="col-lg-12 mt-3">
                                  <div class="card">
                                          
                                    <div class="card-body">
                                      
                                        <form>

                                        <div class="row">
                                            <div class="form-group has-success col-2">
                                                <label for="mrp" class="control-label mb-1">MRP</label>
                                                <input id="mrp" name="mrp[]" type="text" required class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="">
                                            
                                            </div>
                                            @error('mrp')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                                   
                                            <div class="form-group has-success col-2">
                                                <label for="price" class="control-label mb-1">Price</label>
                                                <input id="price" name="price[]" type="text" required class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="">
                                            
                                            </div>
                                            @error('price')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                                   
                                            <div class="form-group has-success col-2">
                                                <label for="qty" class="control-label mb-1">Quantity</label>
                                                <input id="qty" name="qty[]" type="text" required class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="">
                                            
                                            </div>
                                            @error('qty')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror
                                        
                                                              
                                            <div class="form-group has-success col-2">
                                                <label for="sku" class="control-label mb-1">SKU</label>
                                                <input id="sku" name="sku[]" type="text" required class="form-control cc-name valid" 
                                                data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                                     aria-describedby="cc-name-error"value="">
                                            
                                            </div>
                                            @error('sku')

                                            <div class="alert alert-danger"> {{$message}}</div>
                                                          
                                            @enderror

                                            
                                            <div class="form-group has-success col-4">
                                                        <label for="attr_image" class="control-label mb-1">Image</label>
                                                        <input id="attr_image" name="attr_image[]" type="file"  class="form-control cc-name valid" 
                                                        data-val="true" data-val-required="Please enter the name on card"
                                                            autocomplete="cc-name" aria-required="false" aria-invalid="false"
                                                            aria-describedby="cc-name-error"value="">
                                                    
                                                    </div>
                                                    @error('attr_image')

                                                    <div class="alert alert-danger"> {{$message}}</div>
                                                                
                                                    @enderror

                                            
                                            </div>

                                            <div class="row">

                                
                                            <div class="form-group has-success col-3">
                                                        <label for="size_id" class="control-label mb-1">Size</label>
                                                        <select id="size_id" name="size_id[]"class="form-control-sm form-control" required>
                                                            <option>Select Category</option>
                                                            @foreach($size as $list)
                                                                @if($attrarr['size_id']==$list->id)
                                                                <option value = "{{$list->id}}"> {{$list->size_name}}</option>
                                                                @else
                                                                <option value = "{{$list->id}}"> {{$list->size_name}}</option>
                                                                @endif

                                                            
                                                            @endforeach 
                                                        </select>
                                                    </div>
                                                    @error('size_id')

                                                    <div class="alert alert-danger"> {{$message}}</div>
                                                                
                                                    @enderror

                                                    
                                                    <div class="form-group has-success col-3">
                                                        <label for="color_id" class="control-label mb-1">Color</label>
                                                        <select id="color_id" name="color_id[]"class="form-control-sm form-control" required>
                                                            <option>Select Color</option>
                                                            @foreach($color as $list)
                                                                @if($attrarr['color_id']==$list->id)
                                                                <option value = "{{$list->id}}" > {{$list->color_name}}</option>
                                                                @else
                                                                <option value = "{{$list->id}}"> {{$list->color_name}}</option>
                                                                @endif

                                                            
                                                            @endforeach 
                                                        </select>
                                                    </div>
                                                    @error('color_id')

                                                    <div class="alert alert-danger"> {{$message}}</div>
                                                                
                                                    @enderror
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="form-group has-success col-3 mt-2"> 
                                                        <button type="button" class="btn btn-danger mt-3" onclick="remove_attr(`+loop+`);"><i class="fa fa-minus">
                                                        </i>&nbsp;&nbsp;Remove</button>
                                            
                                                </div> 

                                            </div>


                                
                                               
                                   </div>
                                  </div>
                                </div>
                        
                              </div>`  ;

                              
                                  
                                                    document.getElementById("attribute").innerHTML += attr; 
                                                        
                            
                                                    };

                                                    function remove_attr(loop){

                                                    jQuery("#product_attr_"+loop).remove();
                                                    
                                                
                                                                                    
                                                    };
                                                    

                                                    function delete_attr(del_loop,y){

                                                        var r = confirm("Do you really want to delete it?");
                                                            if(r==true){

                                                                jQuery("#updaterow"+del_loop).remove();
                                                                window.location.href= "delete_attr/"+y;
                                                
                                                            
                                                            }else{
                                                            
                                                                                    
                                                            };
                            
                                                    }
                                    
                            </script>           
                
@endsection


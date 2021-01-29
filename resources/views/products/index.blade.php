@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
    	<div class="row">
	    	<div class="col-md-9">
	        	<div class="card">
	            	<div class="card-header">Add Product
	            		<a href="#" style="float: right;" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addProduct">+Add New Product</a>
	            	</div>

		            <div class="card-body">
		                <table class="table table-bordered table-left">
							<thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Product Name</th>
							      <th scope="col">Brand</th>
							      <th scope="col">Price</th>
							      <th scope="col">Quantity</th>
							      <th scope="col">Stock</th>
							       <th scope="col">Action</th>
							    </tr>
							 </thead>
							 <tbody>
							 	@foreach($products as $product)
							    <tr>
							      <th scope="row">{{$product->id}}</th>
							      <td>{{$product->product_name}}</td>
							      <td>{{$product->brand}}</td>
							      <td>{{ number_format($product->price,2) }}</td>
							      <td>{{$product->quantity}}</td>
							      <td>
							      	@if($product->alert_stock <= 100) 
							      	 Low Stock >{{$product->alert_stock}}
							      	@else {{$product->alert_stock}}
							      	@endif
							      </td>
							      <td>
							      	<div class="btn-group">
							      		<a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProduct{{$product->id}}">Edit</a>
							      	</div>
							      	<div class="btn-group">
							      		<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProduct{{$product->id}}">Delete</a>
							      	</div>
							      </td>
							    </tr>
							    <div class="modal right fade" id="editProduct{{$product->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="staticBackdropLabel">Edit Product</h5>
									        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									      </div>
									      <div class="modal-body"> 
									      	<form action="{{route('products.update', $product->id)}}" method="post">
									      		@csrf
									      		@method('put')
									      		<div class="form-group">
									      			<label for="">Product Name</label>
									      			<input type="text" name="product_name" value="{{$product->product_name}}" id="" class="form-control">
									      		</div>
									      		<div class="form-group">
									      			<label for="">Brand</label>
									      			<input type="text" name="brand" value="{{$product->brand}}" id="" class="form-control">
									      		</div>
									      		<div class="form-group">
									      			<label for="">Price</label>
									      			<input type="number" name="price" value="{{$product->price}}" id="" class="form-control">
									      		</div>
									      	
									      		<div class="form-group">
									      			<label for="">Quantity</label>
									      			<input type="number" name="quantity" value="{{$product->quantity}}" id="" class="form-control">
									      		</div>
									      		<div class="form-group">
									      			<label for="">Alert Stock</label>
									      			<input type="number" name="alert_stock" value="{{$product->alert_stock}}" id="" class="form-control">
									      		</div>
									      		<div class="form-group">
									      			<label for="">Descriptin</label>
									      			<input type="text" name="description" id="" class="form-control" value="{{$product->description}}">
									      		</div>
									      		<div class="modal-footer">
									      			<button class="btn btn-warning">Update Product</button>
									      		</div>
									      	</form>
									           
									      </div>
									    </div>
									  </div>
									</div> 

								<div class="modal right fade" id="deleteProduct{{$product->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="staticBackdropLabel">Delete Product</h5>
									        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									      </div>
									      <div class="modal-body"> 
									      	<form action="{{route('products.destroy', $product->id)}}" method="post">
									      		@csrf
									      		@method('delete')
									      		<p>Are you sure, you want to delete this {{$product->product_name}}?</p>
									      		<div class="modal-footer">
									      			<button class="btn btn-default" data-dismiss="modal">Cancel</button>
									      			<button class="btn btn-danger" data-dismiss="modal">Delete</button>
									      		</div>
									      	</form>
									           
									      </div>
									    </div>
									  </div>
									</div> 
							    @endforeach
							</tbody>
						</table>
		            </div>	
		        </div>
	        </div>

		    <div class="col-md-3">
		        <div class="card">
		            <div class="card-header">{{ __('Dashboard') }}</div>

		            <div class="card-body">
		                
		            </div>
		        </div>
		    </div>
		</div>
    </div>
</div>
<div class="modal right fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"> 
      	<form action="{{route('products.store')}}" method="post">
      		@csrf
      		<div class="form-group">
      			<label for="">Product Name</label>
      			<input type="text" name="product_name" id="" class="form-control">
      		</div>
      		<div class="form-group">
      			<label for="">Brand</label>
      			<input type="text" name="brand" id="" class="form-control">
      		</div>
      		<div class="form-group">
      			<label for="">Price</label>
      			<input type="number" name="price" id="" class="form-control">
      		</div>
      		<div class="form-group">
      			<label for="">Quantity</label>
      			<input type="number" name="quantity" id="" class="form-control">
      		</div>
      		<div class="form-group">
      			<label for="">Alert Stock</label>
      			<input type="text" name="alert_stock" id="" class="form-control">
      		</div>
      		<div class="form-group">
      			<label for="">Description</label>
      			<textarea  name="description" id="" cols="30" rows="2" class="form-control"></textarea>
      		</div>
      		<div class="modal-footer">
      			<button class="btn btn-primary">Save Product</button>
      		</div>
      	</form>
           
      </div>
    </div>
  </div>
</div> 
@endsection

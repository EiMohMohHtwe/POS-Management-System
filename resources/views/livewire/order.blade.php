<div class="container">
	@if(Session("success"))
        <div class="alert alert-success">{{Session('success')}}</div>
    @endif
    <div class="col-md-12">
    	<div class="row">
	    	<div class="col-md-8">
	        	<div class="card">

	            	<div class="card-header">Company Orders Products
	            		<a href="#" style="float: right;" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addProduct">+Add New Product</a>
	            	</div>

	    <!-- <form action="{{route('orders.store')}}" method="post">
	    	@csrf -->
		            <div class="card-body">

	            	<div class="my-2">
	            		<form wire:submit.prevent="InserttoCart">
	        				<input wire:model="product_code" type="text" name="" id="" class="form-control" placeholder="Enter Product Code">
	            		</form>
	        		</div>
	        		<div class="alert alert-success">{{ $message }}</div>
	        		{{ $productIncart}}
		                <table class="table table-bordered table-left">
							<thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Product Name</th>
							      <th scope="col">Quantity</th>
							      <th scope="col">Price</th>
							      <th scope="col">Discount %</th>
							      <th scope="col">Total</th>
							      <th><a href="#" class="btn btn-sm btn-success add_more"><i class="fa fa-plus"></i></a></th>
							    </tr>
							 </thead>
							 <tbody class="addMoreProduct">
							 	@foreach($productIncart as $cart)
							 	<td class="no">1</td>
							 	<td>
							 		<input type="text" value="" name="" id="">
							 	</td>
							 	<td>
							 		<input type="number" name="quantity[]" id="quantity" value="{{$cart->product_qty}}" class="form-control quantity">
							 	</td>
							 	<td>
							 		<input type="text" name="price[]" id="price" value="{{$cart->product_price}}" class="form-control price">
							 	</td>
							 	<td>
							 		<input type="number" name="discount[]" id="discount" class="form-control discount">
							 	</td>
							 	<td>
							 		<input type="number" name="total_amount[]" id="total_amount" value="{{$cart->product_qty * $cart->product_price}}" class="form-control total_amount">
							 	</td>
							 	<td>
							 		<a href="#" class="btn btn-sm btn-danger delete"><i class="fa fa-times"></i></a>
							 	</td>
							 	@endforeach
							</tbody>
						</table>
		            </div>	
		        </div>
	        </div>

		    <div class="col-md-4">
		        <div class="card">
		            <div class="card-header">
		            	<h4>Total<b class="total">0.00</b></h4>
		            </div>

		            <div class="card-body">
		            	<div class="mb-2">
		            		<button type="button" onclick="PrintReceiptContent('print')" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
		            		<button type="button" onclick="PrintReceiptContent('print')" class="btn btn-primary"><i class="fa fa-history"></i> History</button>
		            		<button type="button" onclick="PrintReceiptContent('print')" class="btn btn-danger"><i class="fa fa-calendar"></i> Report</button>
		            	</div>
		                <div class="panel">
		                	<div class="row">
		                		<table class="table table-striped">
		                			<tr>
		                				<td>
		                					<label for="">Customer Name</label>
		                						<input type="text" name="customer_name" id="" class="form-control">
		                				</td>
		                				<td>
		                					<label for="">Customer Phone</label>
		                					<input type="text" name="customer_phone" id="" class="form-control">
		                				</td>
		                			</tr>
		                		</table>
		                		<td>Payment Method<br>
		                			<span class="radio-item">
		                				<input type="radio" name="payment_method" id="payment_method" class="true" value="cash" checked="checked">
		                				<label for="payment_method">Cash</label>
		                			</span>
		                			<span class="radio-item">
		                				<input type="radio" name="payment_method" id="payment_method" class="true" value="bank transfer">
		                				<label for="payment_method">Bank Transfer</label>
		                			</span>
		                			<span class="radio-item">
		                				<input type="radio" name="payment_method" id="payment_method" class="true" value="credit Cash">
		                				<label for="payment_method">Credit Cash</label>
		                			</span>
		                		</td>
		                		<td>
		                			Payment
		                			<input type="number" name="paid_amount" id="paid_amount" class="form-control">
		                		</td>

		                		<td>
		                			Returning Change
		                			<input type="number" name="balance" id="balance" class="form-control" readonly="true">
		                		</td>

		                		<td>
		                			<button class="btn btn-primary mt-3">Save</button>
		                		</td>

		                		<!-- <td>
		                			<button class="btn btn-warning mt-3">Calculator</button>
		                		</td> -->

		                	</div>
		                </div>
		            </div>
		        </div>
		    </div>
		</form>
		</div>
    </div>
</div>
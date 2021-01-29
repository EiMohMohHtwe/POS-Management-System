@extends('layouts.app')

@section('content')
<div class="container">
	@if(Session("success"))
        <div class="alert alert-success">{{Session('success')}}</div>
    @endif
    <div class="col-md-12">
    	<div class="row">
	    	<div class="col-md-8">
	        	<div class="card">
	            	<div class="card-header">Orders Products
	            		<a href="#" style="float: right;" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addProduct">+Add New Product</a>
	            	</div>

	    <form action="{{route('orders.store')}}" method="post">
	    	@csrf
		            <div class="card-body">
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
							 	<td class="no">1</td>
							 	<td>
							 		<select name="product_id[]" id="product_id" class="form-control product_id">
							 			<option value="">Select Item</option>
							 			@foreach($products as $product)
								 			<option data-price="{{ $product->price}}" value="{{$product->id}}">
								 				{{ $product->product_name}}
								 			</option>
							 			@endforeach
							 		</select>
							 	</td>
							 	<td>
							 		<input type="number" name="quantity[]" id="quantity" class="form-control quantity">
							 	</td>
							 	<td>
							 		<input type="number" name="price[]" id="price" class="form-control price">
							 	</td>
							 	<td>
							 		<input type="number" name="discount[]" id="discount" class="form-control discount">
							 	</td>
							 	<td>
							 		<input type="number" name="total_amount[]" id="total_amount" class="form-control total_amount">
							 	</td>
							 	<td>
							 		<a href="#" class="btn btn-sm btn-danger delete"><i class="fa fa-times"></i></a>
							 	</td>
							</tbody>
						</table>
		            </div>	
		        </div>
	        </div>

		    <div class="col-md-4">
		        <div class="card">
		            <div class="card-header">
		            	<h4>Total<b class="total">100.00</b></h4>
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

<div class="modal right fade" id="addproduct" data-backdrop="static">
	</div>
<div id="print">
	<!-- @include('reports.receipt') -->
</div>

@endsection
@push('scripts')
<script>
	$('.add_more').on('click', function(){
		alert(0);
	})
    
	function TotalAmount()
	{
		var total = 0;
		$('.total_amount').each(function(i, e){
			var amount = $(this).val() - 0;
			total += amount;
		});

		$('.total').html(total);
	}

	$('.addMoreProduct').delegate('.product_id', 'change', function(){
		var tr=$(this).parent().parent();
		var price = tr.find('.product_id option:selected').attr('data-price');
		tr.find('.price').val(price);
		var qty = tr.find('.quantity').val() - 0 ;
		var disc = tr.find('.descount').val() - 0 ;
		var price = tr.find('.price').val() - 0 ;
		var total_amount = (qty * price) - ((qty * price * disc) / 100) ;
		tr.find('.total_amount').val(total_amount);
		TotalAmount();

		var quantity = $('.quantity').val();
		var total = qty * price;
		$('#total_amount').val(total);
		$('#total').val(total);
	});

	$('#paid_amount').keyup(function() {
		var total = $('.total').html();
		var paid_amount = $(this).val();
		var tot = paid_amount - total;
		$('#balance').val(tot);
	})

</script>
@endpush
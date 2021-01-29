@extends('layouts.app')

@section('content')

@livewire('order')
<div class="modal right fade" id="addproduct" data-backdrop="static">
	</div>
<div id="print">
	<!-- @include('reports.receipt') -->
</div>

@endsection
<!-- @push('scripts')
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
@endpush -->
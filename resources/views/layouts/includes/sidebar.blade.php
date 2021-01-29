<nav class="active" id="sidebar">
	<ul class="list-unstyled lead">
		<li class="active">
			<a href="">Home</a>
		</li>
		<li>
			<a href="{{route('orders.index')}}">Orders</a>
		</li>
		<li>
			<a href="{{route('transactions.index')}}">Transactions</a>
		</li>
		<li>
			<a href="{{route('products.index')}}">Products</a>
		</li>
	</ul>
</nav>

<style>
	sidebar ul.lead{
		border-bottom: 1px solid #47748b;
		width: fit-content;
	}

	#sidebar ul li a{
		padding: 10px;
		font-size: 0.8em;
		display: block;
		width: 30vh;
		color: #008BBB
	}

	#sidebar ul li a:hover {
		color: #fff;
		background: #008888;
		text-decoration: none ! important;
	}

	#sidebar ul li.active>a, a[aria-expanded="true"]{
		color: #fff;
		background: #008888;
	}
	
</style>
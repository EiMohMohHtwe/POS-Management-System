<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline rounded-pill">SideBar</a>
<a href="/home" class="btn btn-outline rounded-pill">Home</a>
<a href="{{ route('users.index') }}" class="btn btn-outline rounded-pill">Users</a>
<a href="{{ route('products.index') }}" class="btn btn-outline rounded-pill">Products</a>
<a href="{{ route('orders.index') }}" class="btn btn-outline rounded-pill">Cashier</a>
<a href="{{ route('companies.index') }}" class="btn btn-outline rounded-pill">Orders</a>
<a href="#" class="btn btn-outline rounded-pill">Reports</a>
<a href="#" class="btn btn-outline rounded-pill">Transactions</a>
<a href="#" class="btn btn-outline rounded-pill">Suppliers</a>
<a href="#" class="btn btn-outline rounded-pill">Customers</a>
<a href="#" class="btn btn-outline rounded-pill">Incoming</a>

<style>
  .btn-outline{
    border-color: #008888;
    color: #008888;
  }

  .btn-outline:hover{
    background: #008888;
    color: #fff;
  }
</style>
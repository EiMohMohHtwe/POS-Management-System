@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
    	<div class="row">
	    	<div class="col-md-9">
	        	<div class="card">
	            	<div class="card-header">Add User
	            		<a href="#" style="float: right;" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addUser">+Add New User</a>
	            	</div>

		            <div class="card-body">
		                <table class="table table-bordered table-left">
							<thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Name</th>
							      <th scope="col">Email</th>
							      <th scope="col">Role</th>
							      <th scope="col">Action</th>
							    </tr>
							 </thead>
							 <tbody>
							 	@foreach($users as $user)
							    <tr>
							      <th scope="row">{{$user->id}}</th>
							      <td>{{$user->name}}</td>
							      <td>{{$user->email}}</td>
							      <td>
							      	@if($user->is_admin == 1) Admin
							      	@else Cashire
							      	@endif
							      </td>
							      <td>
							      	<div class="btn-group">
							      		<a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUser{{$user->id}}">Edit</a>
							      	</div>
							      	<div class="btn-group">
							      		<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser{{$user->id}}">Delete</a>
							      	</div>
							      </td>
							    </tr>
							    <div class="modal right fade" id="editUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="staticBackdropLabel">Edit User</h5>
									        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									      </div>
									      <div class="modal-body"> 
									      	<form action="{{route('users.update', $user->id)}}" method="post">
									      		@csrf
									      		@method('put')
									      		<div class="form-group">
									      			<label for="">Name</label>
									      			<input type="text" name="name" value="{{$user->name}}" id="" class="form-control">
									      		</div>
									      		<div class="form-group">
									      			<label for="">Email</label>
									      			<input type="email" name="email" value="{{$user->email}}" id="" class="form-control">
									      		</div>
									      		<div class="form-group">
									      			<label for="">Password</label>
									      			<input type="password" name="password" value="{{$user->password}}" id="" class="form-control" readonly="true">
									      		</div>
									      	
									      		<div class="form-group">
									      			<label for="">Role</label>
									      			<select name="is_admin" value="{{$user->is_admin}}" id="" class="form-control">
									      				<option value="1" @if($user->is_admin == 1) selected @endif>Admin</option>
									      				<option value="2" @if($user->is_admin == 2) selected @endif>Cashier</option>
									      			</select>
									      		</div>
									      		<div class="modal-footer">
									      			<button class="btn btn-warning">Update User</button>
									      		</div>
									      	</form>
									           
									      </div>
									    </div>
									  </div>
									</div> 

								<div class="modal right fade" id="deleteUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="staticBackdropLabel">Delete User</h5>
									        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									      </div>
									      <div class="modal-body"> 
									      	<form action="{{route('users.destroy', $user->id)}}" method="post">
									      		@csrf
									      		@method('delete')
									      		<p>Are you sure, you want to delete this {{$user->name}}?</p>
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
<div class="modal right fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"> 
      	<form action="{{route('users.store')}}" method="post">
      		@csrf
      		<div class="form-group">
      			<label for="">Name</label>
      			<input type="text" name="name" id="" class="form-control">
      		</div>
      		<div class="form-group">
      			<label for="">Email</label>
      			<input type="email" name="email" id="" class="form-control">
      		</div>
      		<div class="form-group">
      			<label for="">Password</label>
      			<input type="password" name="password" id="" class="form-control">
      		</div>
      		<div class="form-group">
      			<label for="">Confirm Password</label>
      			<input type="password" name="confirm_password" id="" class="form-control">
      		</div>
      		<div class="form-group">
      			<label for="">Role</label>
      			<select name="is_admin" id="" class="form-control">
      				<option value="1">Admin</option>
      				<option value="2">Cashier</option>
      			</select>
      		</div>
      		<div class="modal-footer">
      			<button class="btn btn-primary">Save User</button>
      		</div>
      	</form>
           
      </div>
    </div>
  </div>
</div> 
@endsection

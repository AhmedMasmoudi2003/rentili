@extends('layout')
@section("title", "Home")
@section('content')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Employees</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New Employee</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons"></i> <span>Delete</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
                <!-- @foreach($employees as $employee)
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox{{ $employee->id }}" name="options[]" value="{{ $employee->id }}">
								<label for="checkbox{{ $employee->id }}"></label>
							</span>
						</td>
						<td>{{ $employee->name }}</td>
						<td>{{ $employee->email }}</td>
						<td>{{ $employee->address }}</td>
						<td>{{ $employee->phone }}</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit"></i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete"></i></a>
						</td>
					</tr>
					@endforeach -->
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>{{ $employees->count() }}</b> entries</div>
				<!-- Add pagination if needed -->
			</div>
		</div>
	</div>        
</div>
@endsection

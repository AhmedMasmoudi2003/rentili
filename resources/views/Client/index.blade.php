@extends('layout')
@section("title", "Clients")
@section('content')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="manage-employees py-3 border-bottom mb-4">
    			<div class="d-flex flex-wrap justify-content-between align-items-center">
        			<!-- Title Section -->
        			<h2 class="mb-0 fs-4 fw-bold">Manage <b>Clients</b></h2>
        			<!-- Button Section -->
        			<a class="btn btn-success d-flex align-items-center gap-1" data-toggle="modal" href="{{route('clients.create')}}">
            			<span>Add New Client</span>
        			</a>
    			</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>CIN</th>
						<th>Phone</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
                 @foreach($Clients as $Client)
					<tr>
						<td>{{ $Client->name }}</td>
						<td>{{ $Client->mail }}</td>
						<td>{{ $Client->CIN }}</td>
						<td>{{ $Client->phone }}</td>
						<td>
							<a href="{{ route('clients.edit', $Client->id) }}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit"></i></a>
							<form action="{{ route('clients.destroy', $Client->id) }}" method="POST" style="display:inline;">
        						@csrf
        						@method('DELETE')
        						<button type="submit" class="delete" style="background: none; border: none;">
            						<i class="material-icons" data-toggle="tooltip" title="Delete"></i>
        						</button>
    						</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $Clients->links("pagination::bootstrap-5") }}
		</div>
	</div>        
</div>

@endsection

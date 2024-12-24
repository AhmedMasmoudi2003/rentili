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
			<table class="table table-striped table-hover bg-table-transparent">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>CIN</th>
						<th>Phone</th>
						<th>Warnings</th>
						<th class="text-center">Actions</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
                 @foreach($Clients as $Client)
					<tr class="@if($Client->warnings_count == 0)table-success
								@elseif($Client->warnings_count==1)table-secondary
                				@elseif($Client->warnings_count == 2)table-warning
                				@elseif($Client->warnings_count >= 3)table-danger @endif">
						<td class="align-middle">{{ $Client->name }}</td>
						<td class="align-middle">{{ $Client->mail }}</td>
						<td class="align-middle">{{ $Client->CIN }}</td>
						<td class="align-middle">{{ $Client->phone }}</td>
						<td class="align-middle">{{ $Client->warnings_count }}</td>
						<td class="text-center align-middle">
							<a href="{{ route('clients.edit', $Client->id) }}" class="btn btn-warning btn-sm" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">Edit</i></a>
							<form action="{{ route('clients.destroy', $Client->id) }}" method="POST" style="display:inline;">
        						@csrf
        						@method('DELETE')
        						<button type="submit" class="" style="background: none; border: none;">
            						<i class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete">Delete</i>
        						</button>
    						</form>
							<form action="{{ route('clients.addWarning', $Client->id) }}" method="POST" style="display:inline;">
                        		@csrf
                        		<button type="submit" class="btn btn-warning btn-sm">Add Warning</button>
                    		</form>
						</td>
						<td class="align-middle">
                    		<a href="{{ route('clients.show', $Client->id) }}" class="btn btn-primary btn-sm">
                        		View Details
                    		</a>
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

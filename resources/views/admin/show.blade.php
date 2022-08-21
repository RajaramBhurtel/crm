@extends('main')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Individual Customer Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('admin.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Customer Name</b></label>
			<div class="col-sm-10">
				{{ $admin->customer_name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b> Email</b></label>
			<div class="col-sm-10">
				{{ $admin->email }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b> Gender</b></label>
			<div class="col-sm-10">
				{{ $admin->gender }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b> Image</b></label>
			<div class="col-sm-10">
				<img src="{{ asset('images/' .  $admin->image) }}" width="200" class="img-thumbnail" />
			</div>
		</div>
	</div>
</div>

@endsection('content')
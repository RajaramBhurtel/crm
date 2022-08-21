@extends('main')

@section('content')

<div class="card">
	<div class="card-header">Edit Customers</div>
	<div class="card-body">
		<form method="post" action="{{ route('admin.update', $admin->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Customer Name</label>
				<div class="col-sm-10">
					<input type="text" name="customer_name" class="form-control" value="{{ $admin->customer_name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form"> Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" value="{{ $admin->email }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form"> Gender</label>
				<div class="col-sm-10">
					<select name="gender" class="form-control">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form"> Image</label>
				<div class="col-sm-10">
					<input type="file" name="simage" />
					<br />
					<img src="{{ asset('images/' . $admin->image) }}" width="100" class="img-thumbnail" />
					<input type="hidden" name="hidden_customer_image" value="{{ $admin->image }}" />
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $admin->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>	
		</form>
	</div>
</div>
<script>
document.getElementsByName('gender')[0].value = "{{ $admin->gender }}";
</script>

@endsection('content')
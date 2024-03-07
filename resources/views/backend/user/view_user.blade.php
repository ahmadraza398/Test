@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
	<div class="container-full">

		<!-- Main content -->
		<section class="content">
			<div class="row">

				<div class="col-12">

					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">User List</h3>
							<a href="{{ route('users.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add User</a>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example" class="table table-bordered table-striped table-hover display nowrap margin-top-10 w-p100">
									<thead>
										<tr>
											<th width="5%" >SL</th>
											<th>Role</th>
											<th>Name</th>
											<th>Email</th>
											<th>Code</th>
											<th width="25%">Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach($allData as $key => $user)
										<tr>
											<td>{{ $key+1 }}</td>
											<td>{{ $user->role }}</td>
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
											<td>{{ $user->code }}</td>
											<td>
												<a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
												<a href="{{ route('users.delete', $user->id) }}" id="delete" class="btn btn-danger">Delete</a>
											</td>
										</tr>
										@endforeach()
									</tbody>
									<tfoot>

									</tfoot>
								</table>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->

	</div>
</div>

@endsection
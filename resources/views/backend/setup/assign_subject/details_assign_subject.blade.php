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
							<h3 class="box-title">Assigned Subjects Detail</h3>
							<a href="{{ route('assign.subject.add') }}" style="float: right;"
								class="btn btn-rounded btn-success mb-5">Add Assign Subject</a>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<h4><strong>Assigned Subjects: </strong>{{ $detailsData['0']['student_class']['name'] }}</h4>
							<div class="table-responsive">
								<table class="table table-bordered table-striped">
									<thead class="thead-light">
										<tr>
											<th width="5%">SL</th>
											<th width="20%">Subject Name</th>
											<th width="20%">Full Marks</th>
											<th width="20%">Pass Marks</th>
											<th width="20%">Subjective Marks</th>
										</tr>
									</thead>
									<tbody>
										@foreach($detailsData as $key => $detail)
										<tr>
											<td>{{ $key+1 }}</td>
											<td>{{ $detail['school_subject']['name'] }}</td>
											<td> {{ $detail->full_mark }} </td>
											<td> {{ $detail->pass_mark }} </td>
											<td> {{ $detail->subjective_mark }} </td>
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
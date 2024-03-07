@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Start 1st col-12 -->
                <div class="col-12">
                    <div class="box bb-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Manage <strong>MarkSheet Generate</strong></h4>
                        </div>

                        <div class="box-body">

                            <form method="get" action="{{ route('report.marksheet.get') }}" target="_self">
                                @csrf
                                <!--Start Row-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5> Year <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <select name="year_id" id="year_id" required class="form-control">
                                                    <option value="" selected disabled>Select Year</option>
                                                    @foreach($years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col-md-3 -->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5> Class <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <select name="class_id" id="class_id" required class="form-control">
                                                    <option value="" selected disabled>Select Class</option>
                                                    @foreach($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col-md-3 -->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5> Exam Type <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <select name="exam_type_id" id="exam_type_id" required class="form-control">
                                                    <option value="" selected disabled>Select Exam Type</option>
                                                    @foreach($exam_type as $exam)
                                                    <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col-md-3 -->

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5> ID No <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="id_no" placeholder="ID No" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col-md-3 -->

                                    <div class="col-md-3">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                                    </div>
                                    <!-- End Col-md-3 -->
                                </div>
                                <!--End Row-->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End 1st col-12 -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>

@endsection
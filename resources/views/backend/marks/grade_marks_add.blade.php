@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Grade</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('store.marks.grade') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Start 1st Row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Grade <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="grade_name" placeholder="Enter Grade"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Grade Point <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="grade_point"
                                                            placeholder="Enter Grade Point" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Start Marks <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="start_marks"
                                                            placeholder="Enter Start Marks" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->
                                        </div>
                                        <!-- End 1st Row -->

                                        <!-- Start 2nd Row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>End Marks <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="end_marks"
                                                            placeholder="Enter End Marks" class="form-control"
                                                            >
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Start Point<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="start_point" placeholder="Enter Start Point"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>End Point<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="end_point" placeholder="Enter End Point"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->
                                        </div>
                                        <!-- End 2nd Row -->

                                        <!-- Start 3rd Row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Remarks<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="remarks" placeholder="Give Remarks"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->

                                            <div class="col-md-4">
                                            </div>
                                            <!-- End Col-md-4 -->


                                            <div class="col-md-4">
                                            </div>
                                            <!-- End Col-md-4 -->
                                        </div>
                                        <!-- End 3rd Row -->

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                                        </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>

    </div>
</div>

@endsection
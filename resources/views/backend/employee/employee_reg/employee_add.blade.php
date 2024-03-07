@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Employee</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('store.employee.registration') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Start 1st Row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Employee Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" placeholder="Enter Employee Name"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Father's Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="fname"
                                                            placeholder="Enter Father's Name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Mother's Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mname"
                                                            placeholder="Enter Mother's Name" class="form-control">
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
                                                    <h5>Mobile Number <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mobile"
                                                            placeholder="Enter Mobile Number" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Address<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="address" placeholder="Enter Address"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Gender <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" required class="form-control">
                                                            <option value="" selected disabled>Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
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
                                                    <h5> Religion <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="religion" required class="form-control">
                                                            <option value="" selected disabled>Select Religion</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Christian">Christian</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Date Of Birth <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="dob" placeholder="Enter Date Of Birth"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Designation <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="designation_id" required class="form-control">
                                                            <option value="" selected disabled>Select Employee
                                                                Designation</option>
                                                            @foreach($designation as $desig)
                                                            <option value="{{ $desig->id }}">{{ $desig->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->
                                        </div>
                                        <!-- End 3rd Row -->

                                        <!-- Start 4th Row -->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Salary<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="salary" placeholder="Enter Salary"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-3 -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Joining Date <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="join_date"
                                                            placeholder="Enter Joining Date" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-3 -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Profile Picture </h5>
                                                    <div class="controls">
                                                        <input type="file" id="image" name="image" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-3 -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                                            style="width: 100px; height: 100px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-3 -->
                                        </div>
                                        <!-- End 4th Row -->

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

<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
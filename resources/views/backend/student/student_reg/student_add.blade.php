@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Student</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('store.student.registration') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Start 1st Row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Student Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" placeholder="Enter Student Name"
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
                                                            placeholder="Enter Father's Name" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Mother's Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="mname"
                                                            placeholder="Enter Mother's Name" class="form-control"
                                                            required>
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
                                                    <h5> Discount <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount" placeholder="Enter Discount "
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->
                                        </div>
                                        <!-- End 3rd Row -->

                                        <!-- Start 4th Row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Year <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="year_id" required class="form-control">
                                                            <option value="" selected disabled>Select Year</option>
                                                            @foreach($years as $year)
                                                            <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Class <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="class_id" required class="form-control">
                                                            <option value="" selected disabled>Select Class</option>
                                                            @foreach($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Group <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="group_id" required class="form-control">
                                                            <option value="" selected disabled>Select Group</option>
                                                            @foreach($groups as $group)
                                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->
                                        </div>
                                        <!-- End 4th Row -->

                                        
                                        <!-- Start 5th Row -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> Shift <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="shift_id" required class="form-control">
                                                            <option value="" selected disabled>Select Shift</option>
                                                            @foreach($shifts as $shift)
                                                            <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Profile Picture </h5>
                                                    <div class="controls">
                                                        <input type="file" id="image" name="image" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-4 -->
                                        </div>
                                        <!-- End 5th Row -->

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
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
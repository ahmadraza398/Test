@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Other Cost</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('update.other.cost',$editData->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <!-- Start 1st Row -->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Amount<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="amount" placeholder="Enter Amount" value="{{ $editData->amount }}" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-3 -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5> Date <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="date" placeholder="Enter Date" value="{{ $editData->date }}" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-3 -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5> Image </h5>
                                                    <div class="controls">
                                                        <input type="file" id="image" name="image" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-3 -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <img id="showImage" src="{{ (!empty($editData->image))? url('upload/cost_images/'.$editData->image):url('upload/no_image.jpg') }}"
                                                style="width: 70px; height: 50px;"> 
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-3 -->
                                        </div>
                                        <!-- End 1st Row -->

                                        <!-- Start 2nd Row -->
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <h5>Description <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="description" id="description" class="form-control" required placeholder="Description">{{ $editData->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Col-md-12 -->
                                        </div>
                                        <!-- End 2nd Row -->

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
@extends('admin.admin_master')
@section('admin')

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"
    integrity="sha512-RNLkV3d+aLtfcpEyFG8jRbnWHxUqVZozacROI4J2F1sTaDqo1dPQYs01OMi1t1w9Y2FdbSCDSQ2ZVdAC8bzgAg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Start 1st col-12 -->
                <div class="col-12">
                    <div class="box bb-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Student <strong>Registration Fee</strong></h4>
                        </div>

                        <div class="box-body">
                            <!--Start Row-->
                            <div class="row">
                                <div class="col-md-4">
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
                                <!-- End Col-md-4 -->

                                <div class="col-md-4">
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
                                <!-- End Col-md-4 -->

                                <div class="col-md-4" style="padding-top: 25px;">
                                    <a id="search" class="btn btn-rounded btn-primary mb-5" name="search">Search</a>
                                </div>
                                <!-- End Col-md-4 -->
                            </div>
                            <!--End Row-->

                            <!-- /////////////////// Registration Fee Table //////////////////////// -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div id="DocumentResults">
                                        <script id="document-template" type="text/x-handlebars-template">
                                            <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                  <thead>
                                                    <tr>
                                                     @{{{thsource}}}
                                                     </tr>
                                                  </thead>
                                                <tbody>
                                                     @{{#each this}}
                                                     <tr>
                                                      @{{{tdsource}}}
                                                    </tr>
                                                     @{{/each}}
                                                </tbody>
                                            </table>
                                        </div>
                                        </script>
                                    </div>
                                </div>
                            </div>
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

<!-- =========== Start Roll Generated =========== -->

<script type="text/javascript">
    $(document).on('click', '#search', function () {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        $.ajax({
            url: "{{ route('student.registration.fee.classwise.get')}}",
            type: "get",
            data: { 'year_id': year_id, 'class_id': class_id },
            beforeSend: function () {
            },
            success: function (data) {
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html = template(data);
                $('#DocumentResults').html(html);
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });

</script>

<!-- ============ End Script Roll Generate ================= -->

@endsection
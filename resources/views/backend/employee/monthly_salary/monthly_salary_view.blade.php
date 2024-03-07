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
                            <h4 class="box-title">Employee <strong>Monthly Salary</strong></h4>
                        </div>

                        <div class="box-body">
                            <!--Start Row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Attendance Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" id="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Col-md-6 -->

                                <div class="col-md-6" style="padding-top: 25px;">
                                    <a id="search" class="btn btn-rounded btn-primary mb-5" name="search">Search</a>
                                </div>
                                <!-- End Col-md-6 -->
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
    $(document).on('click', '#search', function() {
        var date = $('#date').val();
        $.ajax({
            url: "{{ route('employee.monthly.salary.get')}}",
            type: "get",
            data: {
                'date': date,
            },
            beforeSend: function() {},
            success: function(data) {
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
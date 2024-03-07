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
                            <h4 class="box-title">Manage <strong>Monthly/Yearly Profit</strong></h4>
                        </div>

                        <div class="box-body">
                            <!--Start Row-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Start Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="start_date" id="start_date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Col-md-4 -->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>End Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="end_date" id="end_date" class="form-control">
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
                                                     <tr>
                                                      @{{{tdsource}}}
                                                    </tr>
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
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        $.ajax({
            url: "{{ route('report.profit.datewise.get')}}",
            type: "get",
            data: {
                'start_date': start_date, 'end_date':end_date
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
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
                            <h4 class="box-title">Add <strong>Employee Salary</strong></h4>
                        </div>

                        <div class="box-body">
                            <!--Start Row-->
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5> Date </h5>
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

                            <!-- //////////////// Marks Entry Table ////////////////// -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div id="DocumentResults">
                                        <script id="document-template" type="text/x-handlebars-template">
                                            <div class="table-responsive">
                                                <form action="{{ route('account.salary.store') }}" method="POST">
                                                    @csrf
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
                                        <button type="submit" class="btn btn-rounded btn-primary mb-5" style="margin-top: 10px;">Submit</button>
                                        </form>
                                        </div>
                                        </script>
                                    </div>

                                </div>
                                <!-- End col-md-12 -->
                            </div>
                            <!-- End Row -->
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

<!-- =========== Emoloyee Salary =========== -->

<script type="text/javascript">
    $(document).on('click', '#search', function() {
        var date = $('#date').val();
        $.ajax({
            url: "{{ route('account.salary.getemployee')}}",
            type: "get",
            data: {
                'date': date
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

<!-- ============ End Employee Salary ================= -->

@endsection
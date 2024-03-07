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
                            <h4 class="box-title">Add <strong>Student Fee</strong></h4>
                        </div>

                        <div class="box-body">
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
                                        <h5> Fee Category <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <select name="fee_category_id" id="fee_category_id" required class="form-control">
                                                <option value="" selected disabled>Select Fee Category</option>
                                                @foreach($fee_categories as $fee)
                                                <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Col-md-3 -->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5> Date </h5>
                                        <div class="controls">
                                            <input type="date" name="date" id="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Col-md-3 -->

                                <div class="col-md-3">
                                    <a id="search" class="btn btn-rounded btn-primary mb-5" name="search">Search</a>
                                </div>
                                <!-- End Col-md-3 -->
                            </div>
                            <!--End Row-->

                            <!-- //////////////// Marks Entry Table ////////////////// -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div id="DocumentResults">
                                        <script id="document-template" type="text/x-handlebars-template">
                                            <div class="table-responsive">
                                                <form action="{{ route('account.fee.store') }}" method="POST">
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

<!-- =========== Student Fee =========== -->

<script type="text/javascript">
    $(document).on('click', '#search', function() {
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var fee_category_id = $('#fee_category_id').val();
        var date = $('#date').val();
        $.ajax({
            url: "{{ route('account.fee.getstudent')}}",
            type: "get",
            data: {
                'year_id': year_id,
                'class_id': class_id,
                'fee_category_id': fee_category_id,
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

<!-- ============ End Student Fee ================= -->

@endsection
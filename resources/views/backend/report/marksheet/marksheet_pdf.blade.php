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
                            <h4 class="box-title">Marksheet <strong>PDF</strong></h4>
                        </div>

                        <div class="box-body" style="border: solid 1px; padding: 10px;">
                            <!-- Start 1st Row -->
                            <div class="row">
                                <!-- Start col-sm-2 -->
                                <div class="col-sm-2 text-center" style="float: right;">
                                    <img src="{{ url('upload/logo.png') }}" style="width: 120px; height:120px;" alt=""
                                        srcset="">
                                </div>

                                <!-- End col-sm-2 -->

                                <!-- Start col-sm-2 -->
                                <div class="col-sm-2 text-center">

                                </div>

                                <!-- End col-sm-2 -->

                                <!-- Start col-sm-4 -->
                                <div class="col-sm-4 text-center" style="float: left;">
                                    <h4><strong>School Name</strong></h4>
                                    <h6><strong>Gujranwala, Pakistan</strong></h6>
                                    <h5><strong><u><i>Academic Transcript</i></u></strong></h5>
                                    <h6><strong>{{ $allMarks['0']['exam_type']['name'] }}</strong></h6>
                                </div>

                                <!-- End col-sm-4 -->
                                <div class="col-md-12">
                                    <hr style="border: solid 1px; width: 100%; color: #ddd; margin-bottom: 0px;">
                                    <p style="text-align: right;"><u><i>Print Date: </i>{{ date('d M Y') }}</u></p>
                                </div>
                            </div>
                            <!-- End 1st Row -->

                            <!-- Start 2nd Row -->
                            <div class="row">

                                <!-- Start col-sm-6 -->
                                <div class="col-sm-6">
                                    <table border="1" style="border-color: white; width: 100%;" cellpadding="8"
                                        cellspacing="2">
                                        @php
                                        $assign_student =
                                        App\Models\AssignStudent::where('year_id',$allMarks['0']->year_id)->where('class_id',$allMarks[0]->class_id)->first();
                                        @endphp
                                        <tr>
                                            <td widt="50%">Student Id</td>
                                            <td widt="50%">{{ $allMarks['0']['id_no'] }}</td>
                                        </tr>
                                        <tr>
                                            <td widt="50%">Roll No</td>
                                            <td widt="50%">{{ $assign_student->roll }}</td>
                                        </tr>
                                        <tr>
                                            <td widt="50%">Name</td>
                                            <td widt="50%">{{ $allMarks['0']['student']['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td widt="50%">Class</td>
                                            <td widt="50%">{{ $allMarks['0']['student_class']['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td widt="50%">Session</td>
                                            <td widt="50%">{{ $allMarks['0']['year']['name'] }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- End col-sm-6 -->

                                <!-- Start col-sm-6 -->
                                <div class="col-sm-6">
                                    <table border="1" style="border-color: white; width: 100%;" cellpadding="8"
                                        cellspacing="2">
                                        <thead>
                                            <tr>
                                                <th>Letter Grade</th>
                                                <th>Marks Interval</th>
                                                <th>Grade Point(GPA)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($allGrades as $mark)
                                            <tr>
                                                <td>{{ $mark->grade_name }}</td>
                                                <td>{{ $mark->start_marks }}-{{ $mark->end_marks }}</td>
                                                <!-- <td>{{ number_format((float)$mark->grade_point,2) }} - {{ ($mark->grade_point == 4)?(number_format((float)$mark->grade_point,2)):(number_format((float)$mark->grade_point+1,2) - (float)0.01) }}</td> -->
                                                <td>{{ number_format((float)$mark->start_point,2) }} - {{
                                                    number_format((float)$mark->end_point,2) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End col-sm-6 -->
                            </div>
                            <!-- End 2nd Row -->

                            <br><br>
                            <!--Start 3rd row -->
                            <div class="row">
                                <div class="col-md-12">

                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="1"
                                        cellspacing="1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">SL</th>
                                                <th class="text-center">Marks</th>
                                                <th class="text-center">Letter Grade</th>
                                                <th class="text-center">Grade Point</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                            $total_marks = 0;
                                            $total_point = 0;
                                            @endphp

                                            @foreach($allMarks as $key => $mark)
                                            @php
                                            $get_mark = $mark->marks;
                                            $total_marks = (float)$total_marks+(float)$get_mark;
                                            $total_subject = App\Models\StudentMarks::where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->get()->count();
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>

                                                <td class="text-center">{{ $get_mark }}</td>

                                                @php
                                                    $grade_marks = App\Models\MarksGrade::where([['start_marks','<=',(int)$get_mark],['end_marks','>=',(int)$get_mark ]])->first();
                                                    $grade_name = $grade_marks->grade_name;
                                                    $grade_point = number_format((float)$grade_marks->grade_point,2);
                                                    $total_point = (float)$total_point+(float)$grade_point;
                                                @endphp
                                                    <td class="text-center">{{ $grade_name }}</td>
                                                    <td class="text-center">{{ $grade_point }}</td>

                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3" class="text-center"><strong style="padding-left: 30px;">Total Marks</strong>
                                                </td>
                                                <td colspan="3" class="text-center"><strong><b>{{ $total_marks }}</b></strong></td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                                <!-- // End Col-md-12    -->
                            </div>
                            <!-- End row -->


                            <br><br>


                            <!--Start 4th row -->
                            <div class="row">
                                <div class="col-md-12">

                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="1"
                                        cellspacing="1">
                                        @php
                                        $total_grade = 0;
                                        $point_for_letter_grade = (float)$total_point/(float)$total_subject;
                                        $total_grade = App\Models\MarksGrade::where([['start_point','<=',$point_for_letter_grade],['end_point','>=',$point_for_letter_grade]])->first();
                                        $grade_point_avg = (float)$total_point/(float)$total_subject;
                                        @endphp
                                            <tr>
                                                <td width="50%"><strong>Grade Point Average</strong></td>
                                                <td width="50%">
                                                    @if($count_fail > 0)
                                                    0.00
                                                    @else
                                                    {{number_format((float)$grade_point_avg,2)}}
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="50%"><strong>Letter Grade </strong></td>
                                                <td width="50%">
                                                    @if($count_fail > 0)
                                                    F
                                                    @else
                                                    {{ $total_grade->grade_name }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%">Total Marks</td>
                                                <td width="50%"><strong>{{ $total_marks }}</strong></td>
                                            </tr>

                                    </table>
                                </div>
                            </div>

                            <!--End 4th row -->


                            <br><br>

                            <!--Start 5th row -->
                            <div class="row">
                                <div class="col-md-12">

                                    <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="1"
                                        cellspacing="1">
                                        <tbody>
                                            <tr>
                                                <td style="text-align: left;"><strong>Remrks:</strong>
                                                    @if($count_fail > 0)
                                                    Fail
                                                    @else
                                                    {{ $total_grade->remarks }}
                                                    @endif
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--  End 5th row -->


                            <br><br><br><br>

                            <!--Start 6th row -->
                            <div class="row">
                                <div class="col-md-4">
                                    <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
                                    <div class="text-center">Teacher</div>
                                </div>

                                <div class="col-md-4">
                                    <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
                                    <div class="text-center">Parents / Guardian </div>
                                </div>

                                <div class="col-md-4">
                                    <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
                                    <div class="text-center">Principal / Headmaster</div>
                                </div>

                            </div>
                            <!--  End 6th row -->


                            <br><br>


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
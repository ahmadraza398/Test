<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountEmployeeSalary;
use App\Models\AccountOtherCost;
use App\Models\AccountStudentFee;
use PDF;

class ProfitController extends Controller
{
    public function MonthlyProfitView()
    {
        return view('backend.report.profit.profit_view');
    } //End Method

    public function MonthlyProfitDateWise(Request $request)
    {

        $start_date = date('Y-m', strtotime($request->start_date));
        $end_date = date('Y-m', strtotime($request->end_date));
        $sdate = date('Y-m-d', strtotime($request->start_date));
        $edate = date('Y-m-d', strtotime($request->end_date));

        //Getting amount data between the selected dates and add them for profit calculation purpose
        $student_fee = AccountStudentFee::whereBetween('date', [$start_date, $end_date])->sum('amount');
        $emp_salary = AccountEmployeeSalary::whereBetween('date', [$start_date, $end_date])->sum('amount');
        $other_cost = AccountOtherCost::whereBetween('date', [$sdate, $edate])->sum('amount');

        //Calculating Profit
        $total_cost = $other_cost + $emp_salary;
        $profit = $student_fee - $total_cost;

        $html['thsource']  = '<th>Students Fee</th>';
        $html['thsource'] .= '<th>Employees Salary</th>';
        $html['thsource'] .= '<th>Others Cost</th>';
        $html['thsource'] .= '<th>Total Cost</th>';
        $html['thsource'] .= '<th>Profit</th>';
        $html['thsource'] .= '<th>Actions</th>';

        $color = 'success';
        $html['tdsource']  = '<td>' . 'Rs:' . ' ' . $student_fee . '</td>';
        $html['tdsource']  .= '<td>' . 'Rs:' . ' ' . $emp_salary . '</td>';
        $html['tdsource']  .= '<td>' . 'Rs:' . ' ' . $other_cost . '</td>';
        $html['tdsource']  .= '<td>' . 'Rs:' . ' ' . $total_cost . '</td>';
        $html['tdsource']  .= '<td>' . 'Rs:' . ' ' . $profit . '</td>';
        $html['tdsource'] .= '<td>';
        $html['tdsource'] .= '<a class="btn btn-sm btn-'.$color.'"title="PDF" target="_blanks" href="'.route("reports.profit.pdf").'?start_date='.$sdate.'&end_date='.$edate.'">Pay Slip</a>';
        $html['tdsource'] .= '</td>';
        return response()->json(@$html);
    } //End method 

    public function MonthlyProfitPdf(Request $request)
    {
        $data['start_date'] = date('Y-m', strtotime($request->start_date));
        $data['end_date'] = date('Y-m', strtotime($request->end_date));
        $data['sdate'] = date('Y-m-d', strtotime($request->start_date));
        $data['edate'] = date('Y-m-d', strtotime($request->end_date));

        $pdf = PDF::loadView('backend.report.profit.profit_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    } //End method 
}

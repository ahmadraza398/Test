<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\Account\AccountSalaryController;
use App\Http\Controllers\Backend\Account\OtherCostController;
use App\Http\Controllers\Backend\Account\StudentFeeController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\MonthlySalaryController;
use App\Http\Controllers\Backend\Marks\GradeController;
use App\Http\Controllers\Backend\Marks\MarksController;
use App\Http\Controllers\Backend\Report\AttendReportController;
use App\Http\Controllers\Backend\Report\MarkSheetController;
use App\Http\Controllers\Backend\Report\ProfitController;
use App\Http\Controllers\Backend\Report\ResultReportController;
use App\Http\Controllers\Backend\Report\StudentIdCardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Admin Logout Route
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::group(['middleware' => 'auth'], function () {

    //User Management All Routes
    Route::prefix('users')->group(function () {
        Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
        //Add New User
        Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');
        //User Store
        Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
        //User Edit Route
        Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
        //User Update Route
        Route::post('/Update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
        //User Delete Route
        Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');
    });

    //User Profile & Change Password All Routes
    Route::prefix('Profile')->group(function () {
        //View User Profile Route
        Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
        //edit User Profile Route
        Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
        //Srore User Profile Route
        Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
        //User Password Change Route
        Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
        //User Password Update Route
        Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
        //
    });

    //Setup Managements Routes
    Route::prefix('setups')->group(function () {
        //Student Class Routes
        Route::get('student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');
        //Student ADD Class Route    
        Route::get('student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');
        //Student AddClass Store Route
        Route::post('student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('store.student.class');
        //Student Class Edit Route
        Route::get('student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
        //Student Class Update Route
        Route::post('student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('update.student.class');
        //Student Class Delete Route
        Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

        //Student Year Routes
        Route::get('student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
        //Student ADD Year Route    
        Route::get('student/year/add', [StudentYearController::class, 'StudentYearAdd'])->name('student.year.add');
        //Student AddYear Store Route
        Route::post('student/year/store', [StudentYearController::class, 'StudentYearStore'])->name('store.student.year');
        //Student Year Edit Route
        Route::get('student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
        //Student Year Update Route
        Route::post('student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('update.student.year');
        //Student Year Delete Route
        Route::get('student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');


        //Student Group Routes
        Route::get('student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
        //Student ADD Group Route    
        Route::get('student/group/add', [StudentGroupController::class, 'StudentGroupAdd'])->name('student.group.add');
        //Student AddGroup Store Route
        Route::post('student/group/store', [StudentGroupController::class, 'StudentGroupStore'])->name('store.student.group');
        //Student Group Edit Route
        Route::get('student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
        //Student Group Update Route
        Route::post('student/group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('update.student.group');
        //Student Group Delete Route
        Route::get('student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');

        //Student Shift Routes
        Route::get('student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');
        //Student ADD Shift Route    
        Route::get('student/shift/add', [StudentShiftController::class, 'StudentShiftAdd'])->name('student.shift.add');
        //Student AddShift Store Route
        Route::post('student/shift/store', [StudentShiftController::class, 'StudentShiftStore'])->name('store.student.shift');
        //Student Shift Edit Route
        Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
        //Student Shift Update Route
        Route::post('student/shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('update.student.shift');
        //Student Shift Delete Route
        Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');

        //Fee Category Routes
        Route::get('fee/category/view', [FeeCategoryController::class, 'ViewFeeCat'])->name('fee.category.view');
        //Fee Category ADD Route    
        Route::get('fee/category/add', [FeeCategoryController::class, 'FeeCatAdd'])->name('fee.category.add');
        //Fee Category Store Route
        Route::post('fee/category/store', [FeeCategoryController::class, 'FeeCatStore'])->name('store.fee.category');
        //Fee Category Edit Route
        Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'FeeCatEdit'])->name('fee.category.edit');
        //Fee Category Update Route
        Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'FeeCatUpdate'])->name('update.fee.category');
        //Fee Category Delete Route
        Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCatDelete'])->name('fee.category.delete');

        //Fee Category Amount Routes
        Route::get('fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
        //Fee Amount ADD Route    
        Route::get('fee/amount/add', [FeeAmountController::class, 'AddFeeAmount'])->name('fee.amount.add');
        //Fee Amount Store Route
        Route::post('fee/amount/store', [FeeAmountController::class, 'StoreFeeAmount'])->name('store.fee.amount');
        //Fee Amount Edit Route
        Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'EditFeeAmount'])->name('fee.amount.edit');
        //Fee Amount Update Route
        Route::post('fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'UpdateFeeAmount'])->name('update.fee.amount');
        //Fee Amount details Route
        Route::get('fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'DetailsFeeAmount'])->name('fee.amount.details');
        //Fee Amount Delete Route
        Route::get('fee/amount/delete/{fee_category_id}', [FeeAmountController::class, 'DeleteFeeAmount'])->name('fee.amount.delete');

        //Exam Type Routes
        Route::get('exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');
        //Exam Type ADD Route    
        Route::get('exam/type/add', [ExamTypeController::class, 'ExamTypeAdd'])->name('exam.type.add');
        //Exam TypeStore Route
        Route::post('exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])->name('store.exam.type');
        //Exam Type Edit Route
        Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');
        //Exam TypeUpdate Route
        Route::post('exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('update.exam.type');
        //Exam Type Delete Route
        Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');

        //School Subject Routes
        Route::get('school/subject/view', [SchoolSubjectController::class, 'ViewSubject'])->name('school.subject.view');
        //School Subject ADD Route    
        Route::get('school/subject/add', [SchoolSubjectController::class, 'SubjectAdd'])->name('school.subject.add');
        //School Subject Store Route
        Route::post('school/subject/store', [SchoolSubjectController::class, 'SubjectStore'])->name('store.school.subject');
        //School Subject Edit Route
        Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'SubjectEdit'])->name('school.subject.edit');
        //School Subject Update Route
        Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'SubjectUpdate'])->name('update.school.subject');
        //School Subject Delete Route
        Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'SubjectDelete'])->name('school.subject.delete');

        //Assign Subjects Routes
        Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');
        //Assign Subjects ADD Route    
        Route::get('assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');
        //Assign Subjects Store Route
        Route::post('assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject');
        //Assign Subjects Edit Route
        Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');
        //Assign Subjects Update Route
        Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject');
        //Assign Subjects details Route
        Route::get('assign/subject/details/{clas_id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');
        //Assign Subjects Delete Route
        Route::get('assign/subject/delete/{fee_category_id}', [AssignSubjectController::class, 'DeleteAssignSubject'])->name('assign.subject.delete');

        //Designation Routes
        Route::get('designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');
        //Designation ADD Route    
        Route::get('designation/add', [DesignationController::class, 'DesignationAdd'])->name('designation.add');
        //Designation Store Route
        Route::post('designation/store', [DesignationController::class, 'DesignationStore'])->name('store.designation');
        //Designation Edit Route
        Route::get('designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');
        //Designation Update Route
        Route::post('designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('update.designation');
        //Designation Delete Route
        Route::get('designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');
    });

    //Students Management Routes
    Route::prefix('students')->group(function () {
        //Student Registration Routes
        Route::get('reg/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');
        //Student ADD Registration Route    
        Route::get('/reg/add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');
        //Student Registration Store Route
        Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');
        //Student Registration Search Route
        Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');
        //Student Registration edit Route
        Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
        //Student Registration update Route
        Route::post('/reg/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');
        //Student Registration Promotion Route
        Route::get('/reg/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');
        //Student Registration Promotion Store Route
        Route::post('/reg/update/promotion/{student_id}', [StudentRegController::class, 'StudentUpdatePromotion'])->name('promotion.student.registration');
        //Student Registration Details Route
        Route::get('/reg/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');

        //Student Roll Generate Routes
        Route::get('roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');
        //Student Roll Generate Routes
        Route::get('roll/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');
        //Student Roll Generate Store Routes
        Route::post('roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');

        //Registration Fee Routes
        Route::get('reg/fee/view', [RegistrationFeeController::class, 'RegFeeView'])->name('registration.fee.view');
        //Registration Fee class wise data route
        Route::get('reg/fee/classwisedata', [RegistrationFeeController::class, 'RegFeeClassData'])->name('student.registration.fee.classwise.get');
        //Registration Fee payslip with discount  route
        Route::get('reg/fee/payslip', [RegistrationFeeController::class, 'RegFeePaySlip'])->name('student.registration.fee.payslip');

        //Monthly Fee Routes
        Route::get('monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
        //Monthly Fee class wise data route
        Route::get('monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
        //Monthly Fee payslip with discount  route
        Route::get('monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePaySlip'])->name('student.monthly.fee.payslip');

        //Exams Fee Routes
        Route::get('exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');
        //Exam Fee class wise data route
        Route::get('exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])->name('student.exam.fee.classwise.get');
        //Monthly Fee payslip with discount  route
        Route::get('exam/fee/payslip', [ExamFeeController::class, 'ExamFeePaySlip'])->name('student.exam.fee.payslip');
    });

    //Employee Management Routes
    Route::prefix('employees')->group(function () {
        //View Employee Registration Route
        Route::get('reg/view', [EmployeeRegController::class, 'EmployeeView'])->name('employee.registration.view');
        //View Employee Registration Add Route
        Route::get('reg/add', [EmployeeRegController::class, 'EmployeeAdd'])->name('employee.registration.add');
        //Employee Registration Store Route
        Route::post('reg/store', [EmployeeRegController::class, 'EmployeeStore'])->name('store.employee.registration');
        //Employee Registration edit Route
        Route::get('/reg/edit/{id}', [EmployeeRegController::class, 'EmployeeRegEdit'])->name('employee.registration.edit');
        //Employee Registration Update Route
        Route::post('reg/update/{id}', [EmployeeRegController::class, 'EmployeeUpdate'])->name('update.employee.registration');
        //Employee Registration edit Route
        Route::get('/reg/details/{id}', [EmployeeRegController::class, 'EmployeeDetails'])->name('employee.registration.details');


        //Employee Salary Routes

        //View Employee salary Route
        Route::get('salary/view', [EmployeeSalaryController::class, 'SalaryView'])->name('employee.salary.view');
        //Increment Employee salary View Route
        Route::get('salary/increment/{id}', [EmployeeSalaryController::class, 'SalaryIncrement'])->name('employee.salary.increment');
        //Increment Employee salary Route
        Route::post('salary/increment/store/{id}', [EmployeeSalaryController::class, 'SalaryStore'])->name('update.increment.store');
        //Details Employee salary Route
        Route::get('salary/details/{id}', [EmployeeSalaryController::class, 'SalaryDetails'])->name('employee.salary.details');


        //Employee Leave Routes
        Route::get('leave/view', [EmployeeLeaveController::class, 'LeaveView'])->name('employee.leave.view');
        //Employee Leave Add Route
        Route::get('leave/add', [EmployeeLeaveController::class, 'LeaveAdd'])->name('employee.leave.add');
        //Leave Store Route
        Route::post('leave/store', [EmployeeLeaveController::class, 'LeaveStore'])->name('store.employee.leave');
        //Employee Leave Edit Route
        Route::get('leave/edit/{id}', [EmployeeLeaveController::class, 'LeaveEdit'])->name('employee.leave.edit');
        //Leave update Route
        Route::post('leave/update/{id}', [EmployeeLeaveController::class, 'LeaveUpdate'])->name('update.employee.leave');
        //Employee Leave Delete Routes
        Route::get('leave/delete/{id}', [EmployeeLeaveController::class, 'LeaveDelete'])->name('employee.leave.delete');

        //Employee Attendance Routes
        Route::get('attendace/view', [EmployeeAttendanceController::class, 'AttendanceView'])->name('employee.attendance.view');
        //Employee Attendance Add Routes
        Route::get('attendace/add', [EmployeeAttendanceController::class, 'AttendanceAdd'])->name('employee.attendance.add');
        //Employee Attendance Store Routes
        Route::post('attendace/store', [EmployeeAttendanceController::class, 'AttendanceStore'])->name('store.employee.attendance');
        //Employee Attendance Add Routes
        Route::get('attendace/edit/{date}', [EmployeeAttendanceController::class, 'AttendanceEdit'])->name('employee.attendance.edit');
        //Employee Attendance Store Routes
        Route::get('attendace/details/{date}', [EmployeeAttendanceController::class, 'AttendanceDetails'])->name('employee.attendance.details');

        //Employee Monthly Salary Routes
        Route::get('monthly/salary/view', [MonthlySalaryController::class, 'MonthlySalaryView'])->name('employee.monthly.salary.view');
        //Employee Monthly Salary get Routes
        Route::get('monthly/salary/get', [MonthlySalaryController::class, 'MonthlySalaryGet'])->name('employee.monthly.salary.get');
        //Employee Monthly Salary get Routes
        Route::get('monthly/salary/payslip/{employee_id}', [MonthlySalaryController::class, 'MonthlySalaryPayslip'])->name('employee.monthly.salary.payslip');
    });

    //Students Marks Management All Routes
    Route::prefix('marks')->group(function () {
        //Marks Entry Routes
        Route::get('entry/add', [MarksController::class, 'MarksAdd'])->name('marks.entry.add');
        //Marks Entry Store Route
        Route::post('entry/add', [MarksController::class, 'MarksStore'])->name('marks.entry.store');
        //Marks Edit Route
        Route::get('entry/edit', [MarksController::class, 'MarksEdit'])->name('marks.entry.edit');
        //Marks Edit Show Value in input types Route
        Route::get('getstudents/edit', [MarksController::class, 'MarksEditGetStudent'])->name('student.edit.getstudents');
        //Marks Entry Update Route
        Route::post('entry/update', [MarksController::class, 'MarksUpdate'])->name('marks.entry.update');
        //Marks Grade Routes
        Route::get('grade/view', [GradeController::class, 'MarksGradeView'])->name('marks.entry.grade');
        //Marks Grade Add Route
        Route::get('grade/add', [GradeController::class, 'MarksGradeAdd'])->name('marks.grade.add');
        //Marks Grade Store Route
        Route::post('grade/store', [GradeController::class, 'MarksGradeStore'])->name('store.marks.grade');
        //Marks Grade Edit Route
        Route::get('grade/edit/{id}', [GradeController::class, 'MarksGradeEdit'])->name('marks.grade.edit');
        //Marks Grade Update Route
        Route::post('grade/update/{id}', [GradeController::class, 'MarksGradeUpdate'])->name('update.marks.grade');
    });
    //Route For Getting All The Subjects Related to that particular class which class is selected in Marks Entry 
    Route::get('marks/getsubjects', [DefaultController::class, 'GetSubject'])->name('marks.getsubject');
    //Route For Marks
    Route::get('student/marks/getsubjects', [DefaultController::class, 'GetStudent'])->name('student.marks.getstudents');

    //Accounts Management Routes
    Route::prefix('accounts')->group(function () {
        //Account Studuent Fee Routes
        Route::get('student/fee/view', [StudentFeeController::class, 'StudentFeeView'])->name('student.fee.view');
        //Studuent Fee Add Route
        Route::get('student/fee/add', [StudentFeeController::class, 'StudentFeeAdd'])->name('student.fee.add');
        //Studuent Get Data Route
        Route::get('student/fee/getstudent', [StudentFeeController::class, 'StudentFeeGetStudent'])->name('account.fee.getstudent');
        //Studuent Fee Store Route
        Route::post('student/fee/store', [StudentFeeController::class, 'StudentFeeStore'])->name('account.fee.store');

        //Account Employee Salary Routes
        Route::get('employee/salary/view', [AccountSalaryController::class, 'AccountSalaryView'])->name('account.salary.view');
        //Account Employee Salary Add Route
        Route::get('employee/salary/add', [AccountSalaryController::class, 'AccountSalaryAdd'])->name('account.salary.add');
        //Get Account Employee Salary Route
        Route::get('employee/salary/getemployee', [AccountSalaryController::class, 'AccountSalaryGetEmployee'])->name('account.salary.getemployee');
        //Account Employee Salary Store Routes
        Route::post('employee/salary/store', [AccountSalaryController::class, 'AccountSalaryStore'])->name('account.salary.store');

        //Account Other Cost Routes
        Route::get('other/cost/view', [OtherCostController::class, 'OtherCostView'])->name('other.cost.view');
        //Account Other Cost Add Route
        Route::get('other/cost/add', [OtherCostController::class, 'OtherCostAdd'])->name('other.cost.add');
        //Account Other Cost Store Route
        Route::post('other/cost/store', [OtherCostController::class, 'OtherCostStore'])->name('store.other.cost');
        //Account Other Cost Edit Route
        Route::get('other/cost/edit/{id}', [OtherCostController::class, 'OtherCostEdit'])->name('edit.other.cost');
        //Account Other Cost Update Route
        Route::post('other/cost/update/{id}', [OtherCostController::class, 'OtherCostUpdate'])->name('update.other.cost');
    });

    //Reports Management Routes
    Route::prefix('reports')->group(function () {
        //Monthly/Yearly Profit Routes
        Route::get('monthly/profit/view', [ProfitController::class, 'MonthlyProfitView'])->name('monthly.profit.view');
        //Monthly/Yearly Profit Get Data Route
        Route::get('monthly/profit/datewise', [ProfitController::class, 'MonthlyProfitDateWise'])->name('report.profit.datewise.get');
        //Monthly/Yearly Profit PDF Route
        Route::get('monthly/profit/pdf', [ProfitController::class, 'MonthlyProfitPdf'])->name('reports.profit.pdf');

        //MarksSheet Generate  Routes
        Route::get('marksheet/generate/view', [MarkSheetController::class, 'MarkSheetView'])->name('marksheet.generate.view');
        //MarksSheet Get Data Routes
        Route::get('marksheet/generate/get', [MarkSheetController::class, 'MarkSheetGet'])->name('report.marksheet.get');

        //Attendance Report  Routes
        Route::get('attendance/view', [AttendReportController::class, 'AttendReportView'])->name('attendance.report.view');
        //Attendance Report Get Route
        Route::get('attendance/get', [AttendReportController::class, 'AttendReportGet'])->name('report.attendance.get');
       
        //Student Result Report  Routes
        Route::get('student/result/view', [ResultReportController::class, 'ResultView'])->name('student.result.view');
        //Student Result Get Report  Routes
        Route::get('student/result/gwt', [ResultReportController::class, 'ResultGet'])->name('report.student.result.get');
   
   //Student ID Card  Routes
   Route::get('student/idcard/view', [StudentIdCardController::class, 'IdCardView'])->name('student.idcard.view');
   //Student ID Card Get Routes
   Route::get('student/idcard/get', [StudentIdCardController::class, 'IdCardGet'])->name('report.student.idcard.get');
   
    });
}); //End Middleware Auth Route
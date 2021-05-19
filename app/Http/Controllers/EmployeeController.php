<?php


namespace App\Http\Controllers;

use App\Account;
use App\Additional;
use App\Attendance;
use App\Classification;
use App\Employee;
use App\Holiday;
use App\MainAccount;
use App\Oncount;
use App\Store;
use App\Transaction;
use App\Warning;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class EmployeeController extends Controller
{

    public function destroy($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = Employee::find($id);
        $slider->delete();
        return redirect()
            ->route("employees.index")
            ->with("success", "employees  deleted successfully");
    }
    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        return view('admin.employees.create');
    }
    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $drivers = Employee::all();
        return view('admin.employees.index', compact('drivers'));
    }
    public function store(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = new Employee();
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->mobile = $request->mobile;
        $admin->national_id = $request->national_id;
        $admin->working_hours = $request->working_hours;
        $admin->birthdate = $request->birthdate;
        $admin->national = $request->national;
        $admin->email = $request->email;
        $admin->salary = $request->salary;
        $admin->branch = $request->branch;
        $admin->social_status = $request->social_status;
        $admin->manges = $request->manges;
        $admin->education_status = $request->education_status;
        $admin->job = $request->job;
        $admin->graduation_date = $request->graduation_date;
        $admin->head_manger = $request->head_manger;

        $admin->save();
        return redirect()
            ->route("employees.index")
            ->with("success", "employees created successfully");

    }

    public function edit($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $driver = Employee::find($id);

        return view('admin.employees.edit', compact('driver'));

    }
    public function show($id)
    {
        $driver = Employee::find($id);

        return view('admin.employees.show', compact('driver'));
    }
    public function update(Request $request, $id)

    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = Employee::find($id);
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->mobile = $request->mobile;
        $admin->national_id = $request->national_id;
        $admin->working_hours = $request->working_hours;
        $admin->birthdate = $request->birthdate;
        $admin->national = $request->national;
        $admin->email = $request->email;
        $admin->salary = $request->salary;
        $admin->branch = $request->branch;
        $admin->social_status = $request->social_status;
        $admin->manges = $request->manges;
        $admin->education_status = $request->education_status;
        $admin->job = $request->job;
        $admin->graduation_date = $request->graduation_date;
        $admin->head_manger = $request->head_manger;
        $admin->save();
        return redirect()
            ->route("employees.index")
            ->with("success", "employees updated successfully");
    }

    public function createAttendance()
    {
        $employees=Employee::all();
        return view('admin.attendance.create',compact('employees'));
    }
    public function storeAttendance(Request $request)
    {
        $att=new Attendance();
        $att->employee_id=$request->employee_id;
        $att->num_days=$request->num_days;
        $att->day_value=$request->day_value;
        $att->total=$request->num_days*$request->day_value;
        $att->save();
        return redirect('admin/attendance');
    }
    public function editAttendance($id)
    {
        $employees=Employee::all();

        $attendance=Attendance::find($id);
        return view('admin.attendance.edit',compact('attendance','employees'));
    }
    public function updateAttendance(Request $request,$id)
    {
        $att=Attendance::find($id);
        $att->num_days=$request->num_days;
        $att->day_value=$request->day_value;
        $att->total=$request->num_days*$request->day_value;
        $att->save();
        return redirect('admin/attendance');
    }
    public function deleteAttendance($id)
    {
        $att=Attendance::find($id);
//        $id=$att->employee_id;
        $att->delete();
        return redirect()->back();
    }
    public function attendance()
    {
       $attendance=Attendance::all();
       return view('admin.attendance.index',compact('attendance'));
    }
    public function createHoliday()
    {
        $employees=Employee::all();
        return view('admin.holiday.create',compact('employees'));
    }
    public function storeHoliday(Request $request)
    {
        $att=new Holiday();
        $att->employee_id=$request->employee_id;
        $att->from=$request->from;
        $att->to=$request->to;
        $att->type=$request->type;
        $att->reason=$request->reason;

        $att->save();
        return redirect('admin/holiday');
    }
    public function editHoliday($id)
    {
        $employees=Employee::all();

        $attendance=Holiday::find($id);
        return view('admin.holiday.edit',compact('attendance','employees'));
    }
    public function updateHoliday(Request $request,$id)
    {
        $att=Holiday::find($id);
        $att->employee_id=$request->employee_id;
        $att->from=$request->from;
        $att->to=$request->to;
        $att->type=$request->type;
        $att->reason=$request->reason;
        $att->save();
        return redirect('admin/holiday');
    }
    public function deleteHoliday($id)
    {
        $att=Holiday::find($id);
//        $id=$att->employee_id;
        $att->delete();
        return redirect()->back();
    }
    public function holiday()
    {
        $attendance=Holiday::all();
        return view('admin.holiday.index',compact('attendance'));
    }
    public function createCount()
    {
        $employees=Employee::all();
        return view('admin.count.create',compact('employees'));
    }
    public function storeCount(Request $request)
    {
        $att=new Oncount();
        $att->employee_id=$request->employee_id;
        $att->money=$request->money;
        $att->num_of_months=$request->num_of_months;
        $att->reason=$request->reason;

        $att->save();
        return redirect('admin/count');
    }
    public function editCount($id)
    {
        $employees=Employee::all();

        $attendance=Oncount::find($id);
        return view('admin.count.edit',compact('attendance','employees'));
    }
    public function updateCount(Request $request,$id)
    {
        $att=Oncount::find($id);
        $att->employee_id=$request->employee_id;
        $att->money=$request->money;
        $att->num_of_months=$request->num_of_months;
        $att->reason=$request->reason;
        $att->save();
        return redirect('admin/count');
    }
    public function deletecCount($id)
    {
        $att=Oncount::find($id);
//        $id=$att->employee_id;
        $att->delete();
        return redirect()->back();
    }
    public function count()
    {
        $attendance=Oncount::all();
        return view('admin.count.index',compact('attendance'));
    }
    public function createWarning()
    {
        $employees=Employee::all();
        return view('admin.warning.create',compact('employees'));
    }
    public function storeWarning(Request $request)
    {
        $att=new Warning();
        $att->employee_id=$request->employee_id;
        $att->reason=$request->reason;

        $att->save();
        return redirect('admin/warning');
    }
    public function editWarning($id)
    {
        $employees=Employee::all();

        $attendance=Warning::find($id);
        return view('admin.warning.edit',compact('attendance','employees'));
    }
    public function updateWarning(Request $request,$id)
    {
        $att=Warning::find($id);
        $att->employee_id=$request->employee_id;

        $att->reason=$request->reason;
        $att->save();
        return redirect('admin/warning');
    }
    public function deletecWarning($id)
    {
        $att=Warning::find($id);
//        $id=$att->employee_id;
        $att->delete();
        return redirect()->back();
    }
    public function warning()
    {
        $attendance=Warning::all();
        return view('admin.warning.index',compact('attendance'));
    }
    public function createadditional()
    {
        $employees=Employee::all();
        return view('admin.additional.create',compact('employees'));
    }
    public function storeadditional(Request $request)
    {
        $att=new Additional();
        $att->employee_id=$request->employee_id;
        $att->value=$request->value;
        $att->hours=$request->hours;
        $att->total=$request->value*$request->hours;

        $att->save();
        return redirect('admin/additional');
    }
    public function editadditional($id)
    {
        $employees=Employee::all();

        $attendance=Additional::find($id);
        return view('admin.additional.edit',compact('attendance','employees'));
    }
    public function updateadditional(Request $request,$id)
    {
        $att=Additional::find($id);
        $att->employee_id=$request->employee_id;
        $att->value=$request->value;
        $att->hours=$request->hours;
        $att->total=$request->value*$request->hours;
        $att->save();
        return redirect('admin/additional');
    }
    public function deletecadditional($id)
    {
        $att=Additional::find($id);
//        $id=$att->employee_id;
        $att->delete();
        return redirect()->back();
    }
    public function additional()
    {
        $attendance=Additional::all();
        return view('admin.additional.index',compact('attendance'));
    }
}

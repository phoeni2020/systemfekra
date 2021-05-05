<?php


namespace App\Http\Controllers;

use App\Account;
use App\MainAccount;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class MainAccountController extends Controller
{

    public function destroy($id)
    {

        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = MainAccount::find($id);
        $slider->delete();

        return redirect()
            ->route("main.index")
            ->with("success", "account  deleted successfully");
    }



    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        return view('admin.main.create');
    }

    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }

        $drivers = MainAccount::all();
        return view('admin.main.index', compact('drivers'));

    }


    public function store(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }

        $admin = new MainAccount();
        $admin->name = $request->name;


        $admin->save();
        return redirect()
            ->route("main.index")
            ->with("success", "main created successfully");

    }

    public function edit($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $driver = MainAccount::find($id);

        return view('admin.main.edit', compact('driver'));

    }

    public function update(Request $request, $id)

    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = MainAccount::find($id);
        $admin->name = $request->name;

        $admin->save();
        return redirect()
            ->route("main.index")
            ->with("success", "main updated successfully");


    }

}

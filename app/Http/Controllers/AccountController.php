<?php


namespace App\Http\Controllers;

use App\Account;
use App\MainAccount;
use App\Purchase;
use App\Suppliers;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class AccountController extends Controller
{
    public function import(Request $request)
    {
        $this->validate($request, [
            'select_file' => 'required|mimes:xlsx,csv'
        ]);

        $path = $request->file('select_file')->getRealPath();
//        $selectedAccount=Account::find($request->name);
//        if (!$selectedAccount)
//        {
//            return back()->with('error', $request->name. 'لايوجد  حساب باسم ');
//
//        }
        //dd($path);
        $collections = (new FastExcel)->import($path);
        $total = 0;
//        $accounts = Account::all();
//        foreach ($accounts as $account) {
//            $account->balance = 0;
//            $account->save();
//        }
        //  dd($collections);
        foreach ($collections as $collection) {
            try {

                //    dd($collection);
                $account = Account::where('number', $collection['رقم الحساب'])->first();
                if (!$account)
                    return back()->with('error', $collection['رقم الحساب'] . '  لايوجد رقم حساب ب ');
                //    dd($request->date_from);


                $transaction = Transaction::find($collection['مسلسل']);
                if (!$transaction) {
                    $transaction = new Transaction();
                    $transaction->id = $collection['مسلسل'];


                }
                $transaction->account_id = $account->id;
                $transaction->details = $collection['تفاصيل'];
                $transaction->branch = $collection['رقم الفرع'];
                $transaction->registration_number = $collection['رقم القيد'];

                $transaction->center = $collection['مركز التكلفة'];
                $transaction->date = date('Y-m-d', strtotime($collection['التاريخ']));


                if ($collection['دائن'] != null && $collection['دائن'] != '') {
                    $account->balance += $collection['دائن'];
                    $transaction->amount = $collection['دائن'];

                }
                if ($collection['مدين'] != null && $collection['مدين'] != '') {
                    $account->balance -= $collection['مدين'];
                    $transaction->amount = -$collection['مدين'];


                }
                $account->save();

                $transaction->save();

            } catch (\Exception $E) {
                return $E;

            }
        }
        //dd($collection);
        return back()->with('success', 'تم ادخال ملف اكسيل بنجاح');
    }

    public function get()
    {
        $accounts = Account::where('name', '!=', 'الصندوق')->get();
        $transaction=Transaction::orderby('id','desc')->first();

        return view('account.catch', compact('accounts','transaction'));
    }
    public function entry()
    {
        $accounts = Account::all();

        $transaction=Transaction::orderby('id','desc')->first();

        return view('account.entry', compact('accounts','transaction'));
    }
    public function storeGet(Request $request)
    {


        $transaction = new Transaction();


        $transaction->account_id = $request->account_id;
        $account = Account::find($request->account_id);
        $transaction->details = 'سند قبض';
        // $transaction->center=$collection['مركز التكلفة'];
        $transaction->date = date('Y-m-d', strtotime($request->date));
        $transaction->registration_number=$request->statement;

        $account->balance -= $request->money;
        $transaction->amount = -$request->money;
        $transaction->notes = $request->notes;

        $account->save();
        $transaction->save();
        $transaction = new Transaction();

        $secondAccount = Account::where('name', '=', 'الصندوق')->first();

        $secondAccount->balance += $request->money;
        $transaction->amount = $request->money;

        $transaction->notes = $request->notes;


        $transaction->account_id = $secondAccount->id;
        $transaction->details = 'سند قبض';
        // $transaction->center=$collection['مركز التكلفة'];
        $transaction->date = date('Y-m-d', strtotime($request->date));
        $transaction->registration_number=$request->statement;


        $secondAccount->save();
        $transaction->save();
        return back()->with('success', 'تم اضافة سند قبض بنجاح');


    }
    public function postentry(Request $request)
    {


        for($i=0;$i<count($request->names);$i++) {
            $transaction = new Transaction();

            $transaction->registration_number=$request->registration_number;
            $transaction->account_id = $request->names[$i];
            $account = Account::find($request->names[$i]);
            $transaction->notes = $request->type;
            $transaction->branch = $request->branch;

            // $transaction->center=$collection['مركز التكلفة'];
            $transaction->date = date('Y-m-d', strtotime($request->date));


            if ($request->debtor[$i]) {
                $account->balance -= $request->debtor[$i];
                $transaction->amount = -$request->debtor[$i];
                $transaction->details = $request->statement[$i];

                $account->save();
                $transaction->save();
            }
            if ($request->creditor[$i]) {
                $account->balance += $request->creditor[$i];
                $transaction->amount = $request->creditor[$i];
                $transaction->details = $request->statement[$i];

                $account->save();
                $transaction->save();
            }
        }

        return back()->with('success', 'تم اضافة قيد يومي بنجاح');


    }
    public function cashing()
    {
        $accounts = Account::where('name', '!=', 'الصندوق')->get();
        $transaction=Transaction::orderby('id','desc')->first();

        return view('account.cache', compact('accounts','transaction'));
    }

    public function storeCashing(Request $request)
    {


        $transaction = new Transaction();


        $transaction->account_id = $request->account_id;
        $account = Account::find($request->account_id);
        $transaction->details = 'سند صرف';
        // $transaction->center=$collection['مركز التكلفة'];
        $transaction->date = date('Y-m-d', strtotime($request->date));

        $transaction->registration_number=$request->statement;

        $account->balance += $request->money;
        $transaction->amount = $request->money;
        $transaction->notes = $request->notes;

        $account->save();
        $transaction->save();
        $transaction = new Transaction();

        $secondAccount = Account::where('name', '=', 'الصندوق')->first();

        $secondAccount->balance -= $request->money;
        $transaction->amount = -$request->money;

        $transaction->notes = $request->notes;


        $transaction->account_id = $secondAccount->id;
        $transaction->details = 'سند صرف';
        // $transaction->center=$collection['مركز التكلفة'];
        $transaction->date = date('Y-m-d', strtotime($request->date));

        $transaction->registration_number=$request->statement;

        $secondAccount->save();
        $transaction->save();
        return back()->with('success', 'تم اضافة سند صرف بنجاح');


    }

    public function destroy($id)
    {

        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = Account::find($id);
        $slider->delete();

        return redirect()
            ->route("account.index")
            ->with("success", "account  deleted successfully");
    }

    public function deleteStatement($id)
    {

        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $slider = Transaction::find($id);
        $account = Account::find($slider->account_id);
        if ($slider->amount > 0) {
            $account->balance-=$slider->amount;



        } else {
            $account->balance+=-$slider->amount;

        }
        $account->save();
        $sliders=Transaction::where('registration_number',$slider->registration_number)->get();
        foreach ($sliders as $s){
            $s->delete();
        }
        $slider->delete();

          return back()
            ->with("success", "تم حذف القيد بنجاح");
    }

    public function upload()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $accounts = Account::all();
        return view('account.upload', compact('accounts'));

    }

    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $mains=MainAccount::all();
        return view('admin.account.create',compact('mains'));
    }

    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }

        $drivers = Account::all();
        return view('admin.account.index', compact('drivers'));

    }

    public function review(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }

        $drivers = Account::all();
        foreach ($drivers as $driver) {
            $driver->credit = 0;
            $driver->depit = 0;
            if ($request->get('branch') && $request->get('from') && $request->get('to')) {
                $credits = Transaction::where('branch',$request->get('branch'))->where('date','>=',$request->get('from'))
                    ->where('date','<=',$request->get('to'))->where('amount', '<', 0)->get();
                $depits = Transaction::where('branch',$request->get('branch'))->where('date','>=',$request->get('from'))
                    ->where('date','<=',$request->get('to'))->where('amount', '>', 0)->get();
            }
            elseif ($request->get('from') && $request->get('to')) {
                $credits = Transaction::where('date','>=',$request->get('from'))
                    ->where('date','<=',$request->get('to'))->where('amount', '<', 0)->get();
                $depits = Transaction::where('date','>=',$request->get('from'))
                    ->where('date','<=',$request->get('to'))->where('amount', '>', 0)->get();
            }elseif ($request->get('from') ) {
                $credits = Transaction::where('date','>=',$request->get('from'))
                    ->where('amount', '<', 0)->get();
                $depits = Transaction::where('date','>=',$request->get('from'))
                    ->where('amount', '>', 0)->get();
            }elseif ( $request->get('to')) {
                $credits = Transaction::where('date','<=',$request->get('to'))->where('amount', '<', 0)->get();
                $depits = Transaction::where('date','<=',$request->get('to'))->where('amount', '>', 0)->get();
            }elseif ($request->get('branch')) {
                $credits = Transaction::where('branch', $request->get('branch'))->where('amount', '<', 0)->get();
                $depits = Transaction::where('branch', $request->get('branch'))->where('amount', '>', 0)->get();
            }else {
                $credits = Transaction::where('account_id', $driver->id)->where('amount', '<', 0)->get();
                $depits = Transaction::where('account_id', $driver->id)->where('amount', '>', 0)->get();
            }
            foreach ($credits as $credit) {
                $driver->credit += $credit->amount;
            }
            foreach ($depits as $credit) {
                $driver->depit += $credit->amount;
            }

        }
        return view('account.review', compact('drivers'));

    }

    public function store(Request $request)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }

        $admin = new Account();
        $admin->number = $request->number;
        $admin->name = $request->name;
        $admin->debit_salary = $request->debit;
        $admin->credit_salary = $request->credit;
        $admin->main_id = $request->main_id;

        $admin->save();
        return redirect()
            ->route("account.index")
            ->with("success", "account created successfully");

    }

    public function edit($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $driver = Account::find($id);
        $mains=MainAccount::all();

        return view('admin.account.edit', compact('driver','mains'));

    }

    public function update(Request $request, $id)

    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $admin = Account::find($id);
        $admin->number = $request->number;
        $admin->name = $request->name;
        $admin->debit_salary = $request->debit;
        $admin->credit_salary = $request->credit;
        $admin->main_id = $request->main_id;

        $admin->save();
        return redirect()
            ->route("account.index")
            ->with("success", "account updated successfully");


    }

    public function show($id)
    {
        if (!isset($_SESSION['admin_id'])) {
            return redirect('/admin/login');
        }
        $trip = Account::find($id);
        return view('admin.account.show', compact('trip'));

    }

    public function search(Request $request)
    {
        $drivers = Transaction::where('account_id', $request->account_id)->where('date', '>=', $request->from)->where('date', '<', $request->to)->get();
        $accounts = Account::all();
        return view('account.statement', compact('accounts', 'drivers'));
    }
    public function daily()
    {
        $drivers = Transaction::all();

        return view('account.daily', compact( 'drivers'));
    }
    public function userTransaction($id)
    {
        $drivers = Transaction::where('account_id',$id)->get();

        return view('account.userTransaction', compact( 'drivers'));
    }
    public function statement()
    {
        $accounts = Account::all();
        return view('account.statement', compact('accounts'));
    }
    public function report(Request $request)
    {
    if ($request->from && $request->to && $request->supplier){
    $accounts=Purchase::where('date','<=',$request->from)->where('date','>=',$request->to)
        ->where('supplier_id',$request->supplier)->get();
    }
    elseif ($request->from && $request->to){
            $accounts=Purchase::where('date','<=',$request->from)->where('date','>=',$request->to)->get();
        }elseif ($request->supplier){
            $accounts=Purchase::where('supplier_id',$request->supplier)->get();
        }else{
            $accounts = array();

        }
        $suppliers=Suppliers::all();
        return view('account.report', compact('accounts','suppliers'));
    }
    public function catch_view()
    {
        $drivers = Transaction::where('details','سند قبض')->get();

        return view('account.catchView', compact( 'drivers'));
    }
    public function cashing_view()
    {
        $drivers = Transaction::where('details','سند صرف')->get();

        return view('account.cashingView', compact( 'drivers'));
    }
}

<?php
namespace App\Http\Controllers;

use App\Tips;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->post()) {
           $user =  Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')]);
            return redirect('/admin/dashboard');
            /*$user = User::where('email', $request->input('email'))->first();
            if ($user == null) {
                return redirect()->back()->with('error', 'email not exist');
            } else {
                if (!Hash::check($request->input('password'), $user->password)) {
                    return redirect()->back()->with('error', 'password not matching');

                } else {
                    $_SESSION['admin_id'] = $user->id;

                    return redirect('/admin/dashboard');
                }
            }*/
        }
        return view('admin.login');
    }
    public function index()
    {
        return view('admin.index');
    }
}

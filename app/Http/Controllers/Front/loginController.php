<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function loginPage()
    {
        return view('front.login');
    }

    public function login(Request $req)
    {
        $account = $req->account;
        $password = $req->password;

        if ($req->whereLogin == "user") {
            $user = (new student())->getStudent($account, $password);

            if (empty($user)) {
                Session::flash("message", "帳號或密碼錯誤!!!");
                return back()->withInput();
                exit;
            } else {
                session(["userId" => $user->id, "userRole" => $user->role]);
                return redirect('/');
            }
        }

        if ($req->whereLogin == "admin") {
            $admin = (new Admin())->getAdmin($account, $password);

            if (empty($admin)) {
                Session::flash("message", "帳號或密碼錯誤!!!");
                return back()->withInput();
                exit;
            } else {
                session(["userId" => $admin->id, "userRole" => $admin->role]);
                return redirect("/admin");
            }
        }
    }

    public function logout()
    {
        if (session("userRole") == "admin") {
            session()->flush();
            return redirect('/admin/login');
        } else {
            session()->flush();
            return redirect('/login');
        }
    }
}

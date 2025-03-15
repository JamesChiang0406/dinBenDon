<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\restaurant;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    public function restaurantListPage()
    {
        $restaurants = restaurant::get();
        return view("admin.adminRestaurantPage", compact("restaurants"));
    }

    public function updateRestaurant(Request $req)
    {
        $restaurant = restaurant::find($req->id);
        $photo = $req->restaurantPic;

        if (!empty($restaurant)) {
            @unlink("images/" . $restaurant->restaurantPic);
            $fileName = time() . "." . $photo->extension();
            $photo->move("images/", $fileName);

            $restaurant->restaurantPic = $fileName;
        }

        $restaurant->restaurantName = $req->restaurantName;
        $restaurant->website = $req->website;
        $restaurant->description = $req->description;
        $restaurant->phone = $req->phone;

        $restaurant->update();

        Session::flash("message", "已修改");
        return redirect('/admin');
    }

    public function deleteRestaurant(Request $req)
    {
        restaurant::destroy($req->id);

        Session::flash("message", "已刪除");
        return redirect('/admin');
    }

    public function studentListPage()
    {
        $students = student::get();
        return view("admin.adminStudentPage", compact("students"));
    }

    public function updateStudent(Request $req)
    {
        $student = student::find($req->id);

        $student->name = $req->name;
        $student->account = $req->account;
        $student->password = $req->password;
        $student->studentNo = $req->studentNo;

        $student->update();

        Session::flash("message", "已修改");
        return redirect("/admin/students");
    }

    public function loginPage()
    {
        return view("admin.adminLogin");
    }
}

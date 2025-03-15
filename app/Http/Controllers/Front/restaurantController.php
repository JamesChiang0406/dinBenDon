<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class restaurantController extends Controller
{
    public function addRestaurantPage()
    {
        return view("front.addPage");
    }

    public function addNewRestaurant(Request $req)
    {
        $restaurantPic = $req->restaurantPic;
        $fileName = time() . "." . $restaurantPic->extension();
        if (!file_exists("images")) {
            mkdir("images", 0777);
        }
        $restaurantPic->move("images", $fileName);

        $restaurant = new restaurant();
        $restaurant->restaurantName = $req->restaurantName;
        $restaurant->website = $req->website;
        $restaurant->description = $req->description;
        $restaurant->phone = $req->phone;
        $restaurant->restaurantPic = $fileName;

        $restaurant->save();
        return redirect("/");
    }

    public function editRestaurantPage()
    {
        return view("front.editPage");
    }

    public function updateRestaurant(Request $req)
    {
        $photo = $req->restaurantPic;
        $restaurant = restaurant::find($req->id);

        if (!empty($restaurant)) {
            @unlink("images/" . $restaurant->restaurantPic);
            $fileName = time() . "." . $photo->extension();
            $photo->move("images", $fileName);

            $restaurant->restaurantPic = $fileName;
        }

        $restaurant->restaurantName = $req->restaurantName;
        $restaurant->website = $req->website;
        $restaurant->description = $req->description;
        $restaurant->phone = $req->phone;

        $restaurant->update();

        Session::flash("message", "已修改!");
        return redirect("/");
    }
}

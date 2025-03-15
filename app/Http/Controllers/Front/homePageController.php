<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\choosedList;
use App\Models\restaurant;
use Illuminate\Http\Request;

class homePageController extends Controller
{
    public function homePage()
    {
        $list = [];
        $restaurants = restaurant::get();
        $choosedList = (new choosedList())->hasList(session('userId'));
        foreach ($choosedList as $item) {
            array_push($list, $item["restaurantId"]);
        }

        return view("front.homePage", compact("restaurants", "list"));
    }
}

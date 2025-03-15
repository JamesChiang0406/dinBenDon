<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\choosedList;
use Illuminate\Http\Request;

class listController extends Controller
{
    public function choosedListPage()
    {
        $choosedList = choosedList::orderBy('restaurantId')->get()->groupBy('restaurantId');

        return view("front.choosedList", compact("choosedList"));
    }

    public function choooseThis(Request $req)
    {
        $choosedItem = new choosedList();
        $choosedItem->studentId  = session("userId");
        $choosedItem->restaurantId = $req->id;

        $choosedItem->save();
    }

    public function cancelThis(Request $req)
    {
        $list = choosedList::where("studentId", session("userId"))->where("restaurantId", $req->id)->first();
        $list->delete();
    }
}

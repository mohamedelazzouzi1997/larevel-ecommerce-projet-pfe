<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {

    }



    public function update(Request $request)
    {

        Order::where('id', $request->id)->update(['livred' => 1]);

        return \redirect()->back()->with([
            'info'=>'Order Updated',
        ]);
    }


    public function destroy(Request $request)
    {
         Order::where('id', $request->id)->delete();
        return \redirect()->back()->with([
            'warning'=>'Order deleted',
        ]);
    }
}

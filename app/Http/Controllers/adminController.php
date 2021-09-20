<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class adminController extends Controller
{

    public function showProducts(){
        $c_order = Order::all();
        $produits = Produit::latest()->paginate(5);
        $orders = Order::latest()->paginate(5);

        return \view('admin.products.index')->with([
            'produits'=> $produits,
            'orders'=> $orders,
            'c_order'=>$c_order

        ]);
    }

    public function showOrders(){
        $produit = Produit::all();
        $c_order = Order::all();
       $orders = Order::latest()->paginate(5);
       $produits = Produit::latest()->paginate(5);

      return \view('admin.orders.index')->with([
            'produits'=> $produits,
            'orders'=> $orders,
            'produit'=>$produit,
            'c_order'=>$c_order

        ]);
    }
}

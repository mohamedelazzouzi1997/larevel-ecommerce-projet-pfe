<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class adminController extends Controller
{

    public function showProducts(){

        $produits = Produit::latest()->paginate(5);
        $orders = Order::latest()->paginate(5);

        return \view('admin.products.index')->with([
            'produits'=> $produits,
            'orders'=> $orders,


        ]);
    }

    public function showOrders(){
        $produit = Produit::all();

       $orders = Order::latest()->paginate(5);
       $produits = Produit::latest()->paginate(5);

      return \view('admin.orders.index')->with([
            'produits'=> $produits,
            'orders'=> $orders,
            'produit'=>$produit,

        ]);
    }
}

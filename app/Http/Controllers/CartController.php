<?php

namespace App\Http\Controllers;
use Cart;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Category;
use App\Models\User;
use App\Models\tag;
class CartController extends Controller
{
    //add produit au panier
    public function __construct(){
        $this->middleware('auth');
    }
   
    public function add(Request $request){
        $produit = Produit::find($request->id);
        $userID = auth()->user()->id;
       
        Cart::session($userID)->add(array(
            array(
                'id' => $produit->id,
                'name' => $produit->nom,
                'price' =>$produit->prix_ht,
                'quantity' => $request->qty,
                'attributes' => array(
                    'size' => $request->size,
                    'color' => $request->color,
                    'img' => $produit->img,
                    'prix_ttc' =>  $produit->prixTTC(),
                    'desc' => $produit->description
                
                )
            ),
          ));
          return redirect(route('cart_index'))->with([
            'success'=>'Product has been added to your cart',
            
        ]);
    }

    public function index(){
        $match = ['is_online'=>1,'parent_id'=>null];
        $Categorys = Category::where($match)->get();
        $userID = auth()->user()->id;
       
        $contents = Cart::session($userID)->getContent();
        
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'VAT 20%',
            'type' => 'tax',
            'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '20%',
        ));
        Cart::condition($condition);

        $tva = Cart::session($userID)->getTotal()* 0.2;
        $total_ttc_panier = Cart::session($userID)->getTotal();

        $total_ht_panier = Cart::session($userID)->getTotal() - $tva;

        if(auth()->check()){
            return view('cart.index',compact('contents','Categorys','total_ttc_panier','total_ht_panier','tva'));

        }
        else{
            
            return redirect(route('index'));
        }
     
       
    }

    public function commande(){
        $match = ['is_online'=>1,'parent_id'=>null];
        $Categorys = Category::where($match)->get();
        $userID = auth()->user()->id;
        
        $contents = Cart::session($userID)->getContent();
        
     
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'VAT 20%',
            'type' => 'tax',
            'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '20%',
        ));
        Cart::session($userID)->condition($condition);

        $tva = Cart::session($userID)->getTotal()* 0.2;
        $total_ttc_panier = Cart::session($userID)->getTotal();

        $total_ht_panier = Cart::session($userID)->getTotal() - $tva;
        return view('cart.commande',compact('contents','Categorys','total_ttc_panier','total_ht_panier','tva'));
    }

    public function update(Request $request){
        // dd($request->hidden_id);
        // $produit = Produit::find($request->hidden_id);
        $userID = auth()->user()->id;
      
        Cart::session($userID)->update($request->hidden_id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qty
            ),
          ));
        return redirect(route('cart_index')) ->with([
            'info'=>'Product has been updated',
        ]);;
    }


    public function remove($id){
       
        $userID = auth()->user()->id;
        Cart::session($userID)->remove($id);
        return redirect(route('cart_index'))->with([
            'warning'=>'Product has been removed from your cart',
        ]);;
    }

 
}

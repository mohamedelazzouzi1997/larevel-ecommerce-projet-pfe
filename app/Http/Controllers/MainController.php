<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Category;
use App\Models\tag;
use WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cart;
class MainController extends Controller

{
    
     
    public function index(){
              //SELECT * FROM PRODUIT
              $match = ['is_online'=>1,'parent_id'=>null];
              $Produits = Produit::with('category')->paginate(12);
              $Categorys = Category::where($match)->get();

        if(auth()->check()){
            $userID = auth()->user()->id;
            $contents = Cart::session($userID)->getContent();
        
               return view('shop.index')-> with([
                   'Produits' => $Produits,
                   'Categorys'=> $Categorys,
                   'contents'=> $contents
               ]);
        }
       else{
            return view('shop.index')-> with([
                'Produits' => $Produits,
                'Categorys'=> $Categorys,
               
            ]);
         }
    }

    public function produit(Request $request){
        $match = ['is_online'=>1,'parent_id'=>null];
        $Categorys = Category::where($match)->get();
        $produit = Produit::find($request->id);

        if(auth()->check()){
            $userID = auth()->user()->id;
            $contents = Cart::session($userID)->getContent();

            return view('shop.produit')-> with([
                'produit' => $produit,
                'contents'=> $contents,
                'Categorys' => $Categorys

            ]);
        }
        else{
            return view('shop.produit')-> with([
                'produit' => $produit,
                'Categorys' => $Categorys
            ]);
        }
    }

    public function category(Request $request){
        
        $match = ['is_online'=>1,'parent_id'=>null];
      
        
        $Categorys = Category::where($match)->get();
        $Category = Category::find($request->id);
        
        $produits = Produit::where('category_id',$request->id)->paginate(12);

        if(auth()->check()){
            $userID = auth()->user()->id;
            $contents = Cart::session($userID)->getContent();

            return view('shop.category')->with([
                'Categorys' => $Categorys, 
                'produits' => $produits,
                'Category'=> $Category,
                'contents'=> $contents,
            
            ]);
        }else{

            return view('shop.category')->with([
                'Categorys' => $Categorys, 
                'produits' => $produits,
                'Category'=> $Category, 
            ]);
        }
    }

    public function viewByTag(Request $request){
        $Category = Category::find($request->id);
        $tag = tag::find($request->id);
        $produits = $tag->produits;
        $match = ['is_online'=>1,'parent_id'=>null];
        $Categorys = Category::where($match)->get();

        if(auth()->check()){
            $userID = auth()->user()->id;
            $contents = Cart::session($userID)->getContent();

            return view('shop.category')->with([
                'produits' => $produits,
                'Category'=> $Category,
                'Categorys' => $Categorys, 
                'tag'=> $tag,
                'contents'=> $contents
            ]);
        }else{

            return view('shop.category')->with([
                'produits' => $produits,
                'Category'=> $Category,
                'Categorys' => $Categorys, 
                'tag'=> $tag,
                
            ]);
        }
    }

  
}

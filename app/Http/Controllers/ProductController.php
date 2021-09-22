<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Order;
use App\Models\Category;
use App\Models\User;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $match = ['is_online'=>1,'parent_id'=>null];
              $categorys = Category::where($match)->get();
        $produit = Produit::all();
        $c_order = Order::all();
        return view('admin.products.creat')->with([
            'produit'=> $produit,
            'c_order' => $c_order,
            'categorys'=>$categorys
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $rules = [
            'name'           => 'required|min:3',
            'prix_ht'       => 'required|numeric',
            'description'   => 'required|max:50',
            'img'           => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'category_id'   => 'required|numeric'
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

    $this->validate($request, $rules, $customMessages);
        //add ata

        if($request->has('img')){
            $file = $request->img;
            $imageName = time()."_".$file->getClientOriginalName();
            $file->move(\public_path('img'), $imageName);

            Produit::create([
                'nom' => $request->name,
                'description' => $request->description,
                'prix_ht' => $request->prix_ht,
                'img' => $imageName,
                'category_id' => $request->category_id
            ]);
             return \redirect()->route('product.admin')->with([
            'success'=>'Product added',
        ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
         $match = ['is_online'=>1,'parent_id'=>null];
              $categorys = Category::where($match)->get();
              $produit = Produit::find($request->id);
        $product = Produit::all();
        $c_order = Order::all();
        return view('admin.products.edit')->with([
            'product'=> $product,
            'c_order' => $c_order,
            'produit' => $produit,
            'categorys'=>$categorys
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $img_name = $request->img_name;


            //validation
        $rules = [
            'name'           => 'required|min:3',
            'prix_ht'       => 'required|numeric',
            'description'   => 'required|max:50',
            'img'           => 'mimes:png,jpg,jpeg|max:2048',
            'category_id'   => 'required|numeric'
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

    $this->validate($request, $rules, $customMessages);
        //add ata

        if($request->has('img')){

            $image_Path = \public_path('img/'.$img_name);
            if(File::exists($image_Path)){
                File::delete($image_Path);
            }
            $file = $request->img;
            $imageName = time()."_".$file->getClientOriginalName();
            $file->move(\public_path('img'), $imageName);
            $img_name =$imageName;
             }

             Produit::where('id', $request->id)->update([
                'nom' => $request->name,
                'description' => $request->description,
                'prix_ht' => $request->prix_ht,
                'img' => $img_name,
                'category_id' => $request->category_id
            ]);
             return \redirect()->route('product.admin')->with([
            'info'=>'Product updated !',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $img_name = Produit::select('img')->where('id', $request->id)->get();
      $image_Path = public_path('img\\'.$img_name);
            if(File::exists($image_Path)){
                unlink($image_Path);
            }


         Produit::where('id', $request->id)->delete();
            return \redirect()->back()->with([
            'warning'=>'Product deleted',
        ]);
    }
}

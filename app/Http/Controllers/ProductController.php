<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Create a new product
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            "product_name" => "required",
            "product_price" => "required",
            "product_category" => "required",            
            "product_status" => "required",

        ], [
            "product_name.required" => "Veuillez rentrer un nom |",
            "product_price.required" => "Veuillez rentrer un prix |",            
            "product_category.required" => "Veuillez choisir une catégorie |",            
            "product_status.required" => "Veuillez choisir un status |",
        ]);

        //HANDLE FILE
        // $this->validate($request, [
        //     'product_image' => 'required|max:1999'
        // ], ["product_image.required" => "Veuillez choisir une image de moins de 2MB",
        //     "product_image.max" => "Taille de l'image 2MB maximum"
        // ]);

        if ($request->hasFile('product_image')){

            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('product_image')->getClientOriginalExtension();            
            $filenameToStore = $filename . '_' . time() . '.' . $extension;            
            $path = $request->file('product_image')->storeAs('public/cover_images', $filenameToStore);
        
        } else {
            $filenameToStore = 'no_image.jpg';
        }
        
        $products = new Product();

        $products->product_name = $request->product_name;
        $products->product_price = $request->product_price;
        $products->product_category = $request->product_category;
        $products->product_image = $filenameToStore;        
        $products->product_status = $request->product_status;

        $products->save();

        return redirect()->to('/admin/add-product')->with("success", "Le produit a bien été ajouté à votre liste.");
        
    }

    /**
     * Fetch products by Category
     */
    public function productByCategory($category)
    {
        $products = DB::table('products')
                        ->where('product_category', $category)
                        ->where('product_status', 1)
                        ->get();
                
        return view('client.shop')->with('products', $products);

    }
    /**
     * Edit a single product
     */
    public function edit($id)
    {
        $product = Product::find($id);        
        return view('backend.edit_product')->with('product', $product);
    }

    /**
     * Update a single product
     */
    public function update(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('product_image')){
            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('product_image')->getClientOriginalExtension();            
            $filenameToStore = $filename . '_' . time() . '.' . $extension;            
            $path = $request->file('product_image')->storeAs('public/cover_images', $filenameToStore);
        
        } else {
            $filenameToStore = 'no_image.jpg';
        }
                
        $data = [];
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_category'] = $request->product_category;   

        if ($request->product_status == null || $request->product_status = ""){
            $data['product_status'] = "0";
        } else{
            $data['product_status'] = $request->product_status;            
        }

        if ($request->hasFile('product_image')){            
            $actual_product_img = DB::table('products')
                                ->where('id', $request->product_id)
                                ->first();
            $data['product_image'] = $filenameToStore;
            if ($actual_product_img->product_image != 'no_image.jpg'){
                Storage::delete('public/storage/cover_images/' . $actual_product_img->product_image);
            }
        }
        DB::table('products')
            ->where('id', $request->product_id)
            ->update($data);
        return redirect()->to('/admin/products')->with('success', 'Update successful');
    }

    /**
     * Delete a single product
     */
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->to('/admin/products')->with('success', 'le produit a bien été supprimé de votre base de donnée.');
    }

    /**
     * 
     */
    public function turnProductOn($id)
    {
        $product  = Product::where('id', $id)
                            ->update(['product_status' => '1']);

        return redirect()->to('/admin/products')->with("success", "le produit est maintenant disponible.");
    }

    /**
     * 
     */
    public function turnProductOff($id)
    {
        $product  = Product::where('id', $id)
                            ->update(['product_status' => '0']);
                            
        return redirect()->to('/admin/products')->with("success", "Le produit est maintenant indisponible.");
    }




}

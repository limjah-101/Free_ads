<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Redirect;
// use Session;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        
    }
    
    
    //
    public function create(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->to('/admin/add-category')->with("success", "Category was created successfully.");
        /**
         *      ANOTHER WAY
         *  return redirect::to('/');
         *  Session::put("success", "Category was created successfully.");
         */
    }
    /**
     * Delete a single category
     */
    public function delete($id)
    {
        $product = Category::find($id);
        $product->delete();

        return redirect()->to('/admin/categories')->with('success', 'la catégorie a bien été supprimé de votre base de donnée.');
    }

    /**
     * Update a category
     */
    public function edit($id)
    {
        $category = Category::find($id);                
        return view('backend.edit_category')->with('category', $category);
    }
    /**
     * Update a category
     */
    public function update(Request $request)
    {
        Category::where('id', $request->category_id)
                ->update(['category_name'=> $request->category_name]);  
        
        return redirect()->to('/admin/categories')->with('success', 'Update successful');
    }
}

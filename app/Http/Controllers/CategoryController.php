<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Theme;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view("Admin.Pages.categories",[
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->json([
            'content' => File::get(resource_path("views/forms/category.blade.php"))
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategorieRequest $request)
    {
        //
        try {
            $data = $request->validated();
            Category::create($data);
            return response()->json([
                "message"=>"the Category has been created successfully"
            ]);
        }catch(\Exception $e){
            return response()->json([
                "error"=>$e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategorieRequest $request, Category $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $categorie)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Http\Requests\StoreThemeRequest;
use App\Http\Requests\UpdateThemeRequest;
use Illuminate\Support\Facades\File;
use Mockery\Exception;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $themes = Theme::whereNull('parent')->with('subthemes')->get();
        return view("Admin.Pages.themes",[
            "themes"=>$themes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->json([
            'content' => File::get(resource_path("views/forms/theme.blade.php")),
        ]);
    }

    public function getAllThemes(){
        $themes = Theme::whereNull('parent')->with('subthemes')->get();
        return response()->json($themes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreThemeRequest $request)
    {
        //
        try {
            $data = $request->validated();
            Theme::create($data);
            return response()->json([
                "message"=>"the theme has been created successfully"
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
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateThemeRequest $request, Theme $theme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        //
    }
}

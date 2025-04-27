<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
class MenuController extends Controller
{
    public static function getMenu($type = 'main')
    {
        return Menu::where('type', $type)
                   ->whereNull('parent_id')
                   ->where('is_active', 1)
                   ->orderBy('position')
                   ->with('children')
                   ->get();
    }
    public function AllMenu()
    {
        //dd('AllMenu');
        $menus = Menu::all();
        return view('backend.menu.all', compact('menus'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function Create()
    {
      // dd('Create');
      return view('backend.menu.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //ws dd($request->all());



        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'type' => 'nullable|string', 
        ]);

        Menu::create($request->all());



        $notification = array(
            'message' => 'Menu Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('allmenu')->with($notification);

      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       // dd($id);
        $menu = Menu::findOrFail($id);
        //dd($menu);
        return view('backend.menu.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */public function update(Request $request, string $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'url' => 'required|string|max:255',
        'type' => 'nullable|string', // Adjust validation rules as needed
        'is_active' => 'required|boolean',
    ]);

    $menu = Menu::findOrFail($id);
    $menu->update($validatedData);


    $notification = array(
        'message' => 'Menu updated successfully!',
        'alert-type' => 'success'
    );

    return redirect()->route('allmenu')->with($notification);

}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dd($id);
        $menu = Menu::findOrFail($id);
        $menu->delete();
    
        $notification = array(
            'message' => 'Menu Removed successfully!',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
       
    }
}

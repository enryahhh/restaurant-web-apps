<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Menu;
use Illuminate\Support\Facades\Redirect;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        return Inertia::render('Koki/ListMenu',['menus'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Koki/CreateMenu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string',
        'stock' => 'required|integer',
        'price' => 'required|numeric',
        'image' => 'required|image|max:2048',
        'description' => 'required'
    ]);

    // store the image file and get its path
    $foto = round(microtime(true) * 1000).'-'.str_replace(' ','-',$validatedData['image']->getClientOriginalName());
    // $validatedData['image']->store('public/images');
    \Storage::putFileAs('public/images', $validatedData['image'], $foto);
    // Storage::putFile('avatars', $request->file('avatar'));

    // create a new menu item in the database
    $menu = Menu::create([
        'name' => $validatedData['name'],
        'category' => $validatedData['category'],
        'stock' => $validatedData['stock'],
        'price' => $validatedData['price'],
        'gambar' => $foto,
        'description' => $validatedData['description']
    ]);

    // return a response
    return Redirect::route('menu.index')->with('success', 'Menu item added successfully.');
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
    public function edit($id)
    {
        $menu = Menu::find($id);
        return Inertia::render('Koki/EditMenu',['menu'=>$menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|in:makanan,minuman',
        ]);
    
        $menu = Menu::find($id);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            \Storage::putFileAs('public/images', $image, $filename);
            $menu->gambar = $filename;
        }
    
        $menu->name = $request->input('name');
        $menu->stock = $request->input('stock');
        $menu->price = $request->input('price');
        $menu->description = $request->input('description');
        $menu->category = $request->input('category');
    
        $menu->save();
    
        return redirect()->route('menu.index')->with('success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::destroy($id);
        return redirect()->route('menu.index');
    }
}

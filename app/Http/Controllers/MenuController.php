<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function addIndex()
    {
        $categories = Category::get();
        return view('menu.manage.addProduct')->with('categories', $categories);
    }

    public function addAction(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|min:5",
            "category_id" => "required|integer",
            "description" => "required|max:1000",
            "price" => "required|integer",
            "photo" => "required|mimes:jpeg,jpg,png"
        ]);

        $menu = new Menu();
        $menu->name = $validated['name'];
        $menu->category_id = $validated['category_id'];
        $menu->description = $validated['description'];
        $menu->price = $validated['price'];

        $imageFile = $validated['photo'];
        $imageName = 'menu' . time() . '.' . $imageFile->getClientOriginalExtension();
        $menu->photo = $imageName;

        $menu->is_recommended = $request->is_recommended == null ? 0 : 1;

        Storage::putFileAs('public/images', $imageFile, $imageName);

        $menu->save();

        return redirect('/menu')->with('success', 'Add menu success');
    }

    public function updateIndex($id)
    {
        $categories = Category::get();
        $menu = Menu::find($id);
        return view('menu.manage.updateProduct')->with('categories', $categories)->with('menu', $menu);
    }

    public function updateAction(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => "required|min:5",
            "category_id" => "required|integer",
            "description" => "required|max:1000",
            "price" => "required|integer",
        ]);

        $menu = new Menu();
        $menu->name = $validated['name'];
        $menu->category_id = $validated['category_id'];
        $menu->description = $validated['description'];
        $menu->price = $validated['price'];

        Storage::delete('public/images/' . $menu->photo);

        $imageFile = $validated['photo'];
        $imageName = 'menu' . time() . '.' . $imageFile->getClientOriginalExtension();
        $menu->photo = $imageName;

        $menu->is_recommended = $request->is_recommended == null ? 0 : 1;

        Storage::putFileAs('public/images', $imageFile, $imageName);

        $menu->save();

        return redirect('/menu')->with('success', 'Update menu success');
    }

    public function delete($id)
    {
        $menu = Menu::find($id);
        $old_name = $menu->name;

        Storage::delete('public/images/' . $menu->photo);
        $menu->delete();

        return redirect('/menu')->with('success', 'Delete '.$old_name.' menu success');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    /**
     * Show the pax & budget input form for normal users.
     */
    public function pax()
    {
        return view('menu.pax');
    }

    /**
     * Store pax & budget in session, then redirect to menu browsing page.
     */
    public function storePax(Request $request)
    {
        $request->validate([
            'pax'    => 'required|integer|min:1',
            'budget' => 'required|numeric|min:0',
        ]);

        session([
            'pax'    => $request->pax,
            'budget' => $request->budget,
        ]);

        return redirect()->route('menu.index');
    }

    /**
     * Display the menu list for normal users.
     */
    public function index()
    {
        $menus  = Menu::all();
        $pax    = session('pax', 1);
        $budget = session('budget', 0);

        return view('menu.index', compact('menus', 'pax', 'budget'));
    }

    /**
     * Display the menu management dashboard for admins.
     */
    public function manage()
    {
        $menus = Menu::all();
        return view('menu.manage', compact('menus'));
    }

    /**
     * Show the form for creating a new menu item.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created menu item in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'category'    => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'category', 'description']);

        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists(public_path('images'))) {
                mkdir(public_path('images'), 0755, true);
            }

            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        Menu::create($data);

        return redirect()->route('menu.manage')->with('success', 'Menu item created successfully!');
    }

    /**
     * Show the form for editing the specified menu item.
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified menu item in the database.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'category'    => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'category', 'description']);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($menu->image && file_exists(public_path('images/' . $menu->image))) {
                File::delete(public_path('images/' . $menu->image));
            }

            $image     = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists(public_path('images'))) {
                mkdir(public_path('images'), 0755, true);
            }

            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $menu->update($data);

        return redirect()->route('menu.manage')->with('success', 'Menu item updated successfully!');
    }

    /**
     * Remove the specified menu item from the database.
     */
    public function destroy(Menu $menu)
    {
        // Delete image if it exists
        if ($menu->image && file_exists(public_path('images/' . $menu->image))) {
            File::delete(public_path('images/' . $menu->image));
        }

        $menu->delete();

        return redirect()->route('menu.manage')->with('success', 'Menu item deleted successfully!');
    }
}

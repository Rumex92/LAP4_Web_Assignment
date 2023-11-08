<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\plantlist;

class PlantlistAdminController extends Controller
{
    public function index()
    {
        $plantlist = Plantlist::get();
        return view('plantlistadmin', ['plantlist' => $plantlist]);
    }

    public function store(Request $request)
    {
        $newPlant = new Plantlist;
        $newPlant->name = $request->name;
        $newPlant->description = $request->description;
        $newPlant->image_url = $request->image_url;
        $newPlant->save();
        return redirect('/plantlistadmin');
    }

    public function update(Plantlist $plantlist, Request $request) 
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required',
        ]);

        $plantlist->update($data);
        return redirect('/plantlistadmin');
    }

    public function destroy(Plantlist $plantlist)
    {
        $plantlist->delete();
        return redirect('/plantlistadmin');
    }

    public function edit(Plantlist $plantlist) {
        return view('edit', ['plantlistadmin' => $plantlist]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plantlist;

class PlantlistAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $plantlist = Plantlist::get();
        return view('plantlistadmin', ['plantlist' => $plantlist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $newPlant = new Plantlist;
        $newPlant->name = $request->name;
        $newPlant->description = $request->description;
        $newPlant->image_url = $request->image_url;
        $newPlant->save();
        return redirect('/plantlistadmin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Plantlist  $plantlist
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plantlist  $plantlist
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Plantlist $plantlist)
    {
        $plantlist->delete();
        return redirect('/plantlistadmin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plantlist  $plantlist
     * @return \Illuminate\View\View
     */
    public function edit(Plantlist $plantlist)
    {
        return view('edit', ['plantlistadmin' => $plantlist]);
    }
}

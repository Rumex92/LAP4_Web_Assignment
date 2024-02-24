<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Plantlist;

class PlantlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $plantlist = Plantlist::get();
        return view('plantlist', ['plantlist' => $plantlist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect('/plantlistadmin')
                ->with('error', 'Validation failed')
                ->withErrors($validator)
                ->withInput();
        }

        $newPlant = new Plantlist;
        $newPlant->name = $request->name;
        $newPlant->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $newPlant->image_url = str_replace('public/', 'storage/', $imagePath);
        }

        $newPlant->save();

        return redirect('/plantlist')->with('success', 'Plant created successfully!');
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $data['image_url'] = str_replace('public/', 'storage/', $imagePath);
        }

        $plantlist->update($data);
        return redirect('/plantlist');
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
        return redirect('/plantlist');
    }

    // API

    /**
     * Get all plant lists.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_plantlist()
    {
        $plantlist = Plantlist::get();
        return response()->json([
            'message' => 'Here are the plantlists',
            'plantlists' => $plantlist,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plantlist  $plantlist
     * @return \Illuminate\View\View
     */
    public function edit(Plantlist $plantlist)
    {
        return view('edit', ['plantlist' => $plantlist]);
    }

    /**
     * Delete a plant list.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete_plantlist($id)
    {
        $plantlist = Plantlist::find($id);

        if (!$plantlist) {
            return response()->json(['message' => 'Plantlist not found'], 404);
        }

        $plantlist->delete();

        return response()->json(['message' => 'Plantlist deleted successfully']);
    }

    /**
     * Update a plant list.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update_plantlist(Request $request, $id)
    {
        $plantlist = Plantlist::find($id);

        if (!$plantlist) {
            return response()->json(['message' => 'Plantlist not found'], 404);
        }

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required',
        ]);

        $plantlist->update($data);

        return response()->json(['message' => 'Plantlist updated successfully', 'plantlist' => $plantlist]);
    }

    /**
     * Create a new plant list.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create_plantlist(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required',
        ]);

        $plantlist = Plantlist::create($data);

        return response()->json(['message' => 'Plantlist created successfully', 'plantlist' => $plantlist], 201);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\plantlist; 
class PlantlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $plantlist = plantlist::get();

        return view('plantlist',[
            'plantlist'=> $plantlist
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

        $newPlant = new plantlist;
        $newPlant->name =$request->name;
        $newPlant->description= $request->description;
        $newPlant->image_url=$request->image_url;
        $newPlant->save();
        return redirect('/plantlist');
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
    //public function edit(string $id)
    //{
        //
   // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Plantlist $plantlist, Request $request) 
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required',
        ]);
        
        $plantlist->update($data);
        return redirect('/plantlist');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plantlist $plantlist)
    {
        $plantlist->delete();
        return redirect('/plantlist');
    }

 
/**
 *   @return JSON $plantlist
 * 
 */

    

    public function get_plantlist()
    {
        $plantlist = plantlist::get();
        return response()->json([
            'message' =>'Here are the plantlists',
            'plantlists' => $plantlist
        ]);
    }
   
        public function edit(Plantlist $plantlist) {
          
        
            return view('edit', ['plantlist' => $plantlist]);
        }



        public function delete_plantlist($id)
{
    $plantlist = Plantlist::find($id);

    if (!$plantlist) {
        return response()->json(['message' => 'Plantlist not found'], 404);
    }

    $plantlist->delete();

    return response()->json(['message' => 'Plantlist deleted successfully']);
}


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
    
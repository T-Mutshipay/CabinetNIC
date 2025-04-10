<?php

namespace App\Http\Controllers;

use App\Models\Avocat;
use App\Models\SocialLink;
use App\Models\Actualite;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $commentaires = Commentaire::orderBy('created_at', 'desc')->get();
        $actualites = Actualite::orderBy('created_at','desc')->get();
        $avocats = Avocat::with('social_links')->get();
        $socialLinks = SocialLink::all();
        return view('welcome', compact('actualites', 'avocats','commentaires', 'socialLinks'));
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
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'contenu' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $imagePath = $request->file('image')->store('img', 'public'); 
    
        Actualite::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'contenu' => $request->contenu,
            'image' => $imagePath,
        ]);
    
        return redirect()->back()->with('success', 'Actualité créée avec succès.');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $actualites = Actualite::findOrFail($id); 
        return view('articles', compact('actualites'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

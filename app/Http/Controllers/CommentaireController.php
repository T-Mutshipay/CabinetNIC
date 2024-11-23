<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validation des données entrantes
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email', 
            // 'actualite_id' => 'required|integer', 
            'comment' => 'required|string|max:500', 
        ]);
        $user = User::where('email', $request->email)->first();
            if (!$user) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            }
            $commentaire = Commentaire::create([
                'actualite_id' => $request->actualite_id,
                'user_id' => $user->id, 
                'contenu' => $request->comment,
            ]);
            dd($user);
            return response()->json([
                'message' => 'Commentaire ajouté avec succès.',
                'commentaire' => $commentaire,
            ], 201); 
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

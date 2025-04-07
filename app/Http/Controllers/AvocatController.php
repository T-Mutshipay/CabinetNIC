<?php

namespace App\Http\Controllers;

use App\Models\Avocat;
use App\Models\Collaborateur;
use Illuminate\Http\Request;
use App\Models\SocialLink;
class AvocatController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $collaborateurs = Collaborateur::all();
        $avocats = Avocat::with('social_links')->get();
        return view('avocats', compact('avocats', 'collaborateurs'));
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
        //
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EtudiantApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $etudiants = Etudiant::with('classe')->get();
        return response()->json([
            'success' => true,
            'data' => $etudiants,
            'count' => $etudiants->count()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:etudiants,email',
            'classe_id' => 'required|exists:classes,id'
        ]);

        $etudiant = Etudiant::create($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Etudiant created successfully',
            'data' => $etudiant
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $etudiant = Etudiant::with('classe')->find($id);
        
        if (!$etudiant) {
            return response()->json([
                'success' => false,
                'message' => 'Etudiant not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $etudiant
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $etudiant = Etudiant::find($id);
        
        if (!$etudiant) {
            return response()->json([
                'success' => false,
                'message' => 'Etudiant not found'
            ], 404);
        }

        $validated = $request->validate([
            'nom' => 'sometimes|string|max:255',
            'prenom' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:etudiants,email,' . $id,
            'classe_id' => 'sometimes|exists:classes,id'
        ]);

        $etudiant->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Etudiant updated successfully',
            'data' => $etudiant
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $etudiant = Etudiant::find($id);
        
        if (!$etudiant) {
            return response()->json([
                'success' => false,
                'message' => 'Etudiant not found'
            ], 404);
        }

        $etudiant->delete();

        return response()->json([
            'success' => true,
            'message' => 'Etudiant deleted successfully'
        ]);
    }
}

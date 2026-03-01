<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ClasseApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $classes = Classe::with('etudiants')->get();
        return response()->json([
            'success' => true,
            'data' => $classes,
            'count' => $classes->count()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:classes,nom',
            'description' => 'nullable|string'
        ]);

        $classe = Classe::create($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Classe created successfully',
            'data' => $classe
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $classe = Classe::with('etudiants')->find($id);
        
        if (!$classe) {
            return response()->json([
                'success' => false,
                'message' => 'Classe not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $classe
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $classe = Classe::find($id);
        
        if (!$classe) {
            return response()->json([
                'success' => false,
                'message' => 'Classe not found'
            ], 404);
        }

        $validated = $request->validate([
            'nom' => 'sometimes|string|max:255|unique:classes,nom,' . $id,
            'description' => 'sometimes|string|nullable'
        ]);

        $classe->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Classe updated successfully',
            'data' => $classe
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $classe = Classe::find($id);
        
        if (!$classe) {
            return response()->json([
                'success' => false,
                'message' => 'Classe not found'
            ], 404);
        }

        $classe->delete();

        return response()->json([
            'success' => true,
            'message' => 'Classe deleted successfully'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(UserRole::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_role = $request->validate([
            'role_name' => 'require|string|max:255',
            'description' => 'nullable|string'
        ]);

        $role = UserRole::create($user_role);
        return response()->json([
            'message' => 'Roled is Successfully created',
            'role' => $role
        ]);

        }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(UserRole::findOrFail($id));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = UserRole::findOrFail($id);

        $role->update($request->validate([
            'role_name' => 'required|string|max:255',
            'role' => $role
        ]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}

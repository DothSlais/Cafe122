<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'numcontrol' => 'required|string|max:255|unique:usuarios,numcontrol',
            'password' => 'required|string|min:8|confirmed',
            'grado' => 'required|integer|min:1|max:6',
            'grupo' => 'required|string|max:1'
        ]);

        // Creación del nuevo usuario
        $user = new User();
        $user->name = $validatedData['name'];
        $user->numcontrol = $validatedData['numcontrol'];
        $user->password = Hash::make($validatedData['password']); 
        $user->grado = $validatedData['grado'];
        $user->grupo = $validatedData['grupo'];
        $user->save();

        return redirect()->route('cafe.index')->with('success', 'Usuario registrado exitosamente');
    }
}
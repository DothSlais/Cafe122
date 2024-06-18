<?php

namespace App\Http\Controllers;

use App\Models\Burrito;
use App\Models\Pane;
use App\Models\Papita;
use App\Models\Producto;
use App\Models\Soda;
use App\Models\Tarjeta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CafeController extends Controller
{   //función para controlar la página principal
    public function index (){


        return view('cafe.index');
    }
    //Función de la vista "create"
    public function create (){
        return view('cafe.create');
    }
    //Función para guardar registros
    public function store (Request $request){
        //Validación
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

        return redirect()->route('login.form')->with('success', 'Usuario registrado exitosamente');
    }

     // Función para mostrar el pan
     public function pan() {
        $panes = Pane::all();
        return view('cafe.pan', compact('panes'));
    }

     // Función para mostrar las papitas
     public function papitas() {
        $papitas = Papita::all();
        return view('cafe.papitas', compact('papitas'));
    }

     // Función para mostrar las bebidas
     public function bebidas() {
        $bebidas = Soda::all();
        return view('cafe.bebidas', compact('bebidas'));
    }

     // Función para mostrar los burritos
     public function burritos() {
        $burritos = Burrito::all();
        return view('cafe.burritos', compact('burritos'));
    }

    // Función para mostrar los burritos
    public function productos() {
        $productos = Producto::all();
        return view('cafe.productos', compact('productos'));
    }
}


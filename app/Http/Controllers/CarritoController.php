<?php

// app\Http\Controllers\CarritoController.php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Burrito;
use App\Models\Pane;
use App\Models\Papita;
use App\Models\Producto;
use App\Models\Soda;
// Importa los demás modelos de productos que tengas
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    // Función para mostrar el carrito
    public function index()
    {
        $carritos = Carrito::with('productable')->where('user_id', Auth::id())->get();
        return view('carrito.index', compact('carritos'));
    }

    // Función para agregar un producto al carrito
    public function add(Request $request, $productId)
    {
        $productType = $request->input('product_type');
        
        switch($productType) {
            case 'burrito':
                $product = Burrito::find($productId);
                break;
            case 'bebida':
                $product = Soda::find($productId);
                break;
            case 'papita':
                $product = Papita::find($productId);
                break;
            case 'pan':
                $product = Pane::find($productId);
                break;
            case 'producto':
                $product = Producto::find($productId);
                break;
            default:
                return redirect()->back()->with('error', 'Tipo de producto no válido');
        }

        if (!$product) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        $carrito = Carrito::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'productable_id' => $product->id,
                'productable_type' => get_class($product)
            ],
            [
                'cantidad' => 1
            ]
        );

        if (!$carrito->wasRecentlyCreated) {
            $carrito->cantidad += 1;
            $carrito->save();
        }

        return redirect()->route('carrito.index')->with('success', 'Producto agregado al carrito');
    }

    // Función para remover un producto del carrito
    public function remove($itemId)
    {
        $carrito = Carrito::find($itemId);

        if (!$carrito || $carrito->user_id != Auth::id()) {
            return redirect()->route('carrito.index')->with('error', 'Producto no encontrado o no autorizado');
        }

        $carrito->delete();

        return redirect()->route('carrito.index')->with('success', 'Producto removido del carrito');
    }
}

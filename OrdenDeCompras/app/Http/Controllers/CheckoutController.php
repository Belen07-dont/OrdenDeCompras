<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Cart;

use App\Models\Pedido;
use App\Models\Checkout;
use App\Models\PedidoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        
        $cartItems = Cart::with('product')
                        ->where('user_id', $userId)
                        ->get();

        // Calcular totales
        $subtotal = $cartItems->sum('subtotal');
        $envio = $this->calculateShipping($subtotal);
        $impuesto = $this->calculateTax($subtotal);
        $total = $subtotal + $envio + $impuesto;

        return view('checkout.index', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'envio' => $envio,
            'impuesto' => $impuesto,
            'total' => $total
        ]);
    }

    
    public function processCheckout(Request $request)
{
    try {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
        
        if ($cartItems->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Your cart is empty'
            ], 400);
        }

        Log::info("=== CHECKOUT START ===");

        // Calcular totales
        $subtotal = $cartItems->sum('subtotal');
        $envio = $this->calculateShipping($subtotal);
        $impuesto = $this->calculateTax($subtotal);
        $total = $subtotal + $envio + $impuesto;

        // Crear pedido
        $pedido = Pedido::create([
            'user_id' => $userId,
            'SubTotal' => $subtotal,
            'Envio' => $envio,
            'Impuesto' => $impuesto,
            'Total' => $total,
        ]);

        Log::info("Pedido created with ID: " . $pedido->id);

        // Crear pedidos de items individuales
        foreach ($cartItems as $cartItem) {
            PedidoItem::create([
                'pedido_id' => $pedido->id,
                'product_id' => $cartItem->product_id,
                'product_name' => $cartItem->name,
                'product_description' => $cartItem->description,
                'image' => $cartItem->image,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
                'subtotal' => $cartItem->subtotal,
            ]);
            Log::info("PedidoItem created for product: " . $cartItem->product_id);
        }

        // limpiar el carrito
        $deletedCount = Cart::where('user_id', $userId)->delete();
        Log::info("Deleted $deletedCount cart items");

        //Verificacion final
        $finalPedidoCount = Pedido::count();
        $finalPedidoItemsCount = PedidoItem::where('pedido_id', $pedido->id)->count();
        
        Log::info("Final pedidos: $finalPedidoCount, Items: $finalPedidoItemsCount");
        Log::info("=== CHECKOUT COMPLETE ===");

        return view('/carrito');

    } catch (Exception $e) {
        Log::error("Checkout error: " . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Failed to process order: ' . $e->getMessage()
        ], 500);
    }
}

    private function calculateShipping($subtotal)
    {
        return $subtotal * 0.02;
    }
    
    private function calculateTax($subtotal)
    { 
        return $subtotal * 0.15;
    }

    

}
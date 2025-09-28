<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nav extends Controller
{
    public function index()
    {
        return view ('index');
    }
    public function productos()
    {
        return view ('pages/productos');
    }
    public function pedidos()
    {
        return view ('pages/login/Pedidosprevios');
    }
    public function perfil()
    {
        return view ('pages/login/perfil');
    }
}

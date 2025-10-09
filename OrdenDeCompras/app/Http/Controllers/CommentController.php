<?php
// app/Http/Controllers/CommentController.php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created comment.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
            'user_id' => 'required|exists:users,id',
        ]);

        // Crear comentario
        $comment = Comment::create($validated);

        // Redireccion con comentario de confirmacion
        return back()->with('success', '¡Comentario enviado correctamente!');
    }

    //Lista de Comentarios para usuario admin
    public function index()
    {
        $comments = Comment::with('user')->latest()->get();
        
        return view('comments.index', compact('comments'));
    }

}
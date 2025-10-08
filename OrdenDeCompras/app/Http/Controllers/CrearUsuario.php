<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;





class CrearUsuario extends Controller
{
   public function login(Request $request){
      $usuario = $request->validate([
         'Nombre' =>       'required',
         'Contraseña' =>   'required'
      ]);

      if(Auth::attempt(['name' => $usuario['Nombre'], 'password' => $usuario['Contraseña']])){
         $request->session()->regenerate();
      }else{
         
          return back()->with('error', 'Usuario o contraseña incorrectos');
      }
      return redirect('/');
   }

   public function logout(){
      Auth::logout();
      return redirect('/');
   }

   public function guardar(Request $request): string{
    $usuario = $request->validate(rules: [
      'name' =>      ['required', 'min:3', 'max:20', Rule::unique('users', 'name')],
      'email' =>     ['required', 'email', Rule::unique('users', 'email')],
      'password' =>  ['required', 'min:8', 'max:200']
    ]);

   $usuario['password'] = bcrypt($usuario["password"]);
   $user = User::create($usuario);

   Auth::login(user: $user);
   return redirect('/');
   }
   

     
   public function edituser(CrearUsuario $actualizacion, Request $request){
         $userid     = Auth::user()->id;
         

         $usernewname   = $request->input('name');
         $usernewemail  = $request->input('email');
         $usernewimage  = $request->input('image');

         $actualizacion =User::where('id', $userid)->limit(1)->update([
            'name' => $usernewname,
            'email'=> $usernewemail,
            'image'=> $usernewimage
         ]);
         $username   = Auth::user()->name;
         $useremail  = Auth::user()->email;
         $userimage  = Auth::user()->image;
       return redirect('/perfil');
   }


   

}

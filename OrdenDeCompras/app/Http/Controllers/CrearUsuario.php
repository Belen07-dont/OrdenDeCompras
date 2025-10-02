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
         'loginname' => 'required',
         'loginpassword' => 'required'
      ]);

      if(Auth::attempt(['name' => $usuario['loginname'], 'password' => $usuario['loginpassword']])){
         $request->session()->regenerate();
      }else{
         
      }
      return redirect('/');
   }



   public function logout(){
      Auth::logout();
      return redirect('/');
   }



   public function guardar(Request $request): string{
    $usuario = $request->validate(rules: [
      'name' =>      ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
      'email' =>     ['required', 'email', Rule::unique('users', 'email')],
      'password' =>  ['required', 'min:8', 'max:200']
    ]);

   $usuario['password'] = bcrypt($usuario["password"]);
   $user = User::create($usuario);

   Auth::login(user: $user);
   return redirect('/');
   }
   

     
   public function edituser(CrearUsuario $actualizacion, Request $request){
         $userid     = auth()->user()->id;
         $username   = auth()->user()->name;
         $useremail  = auth()->user()->email;
         $userimage  = auth()->user()->image;

         $usernewname   = $request->input('name');
         $usernewemail  = $request->input('email');
         $usernewimage  = $request->input('image');

         $actualizacion =User::where('id', $userid)->limit(1)->update([
            'name' => $usernewname,
            'email'=> $usernewemail,
            'image'=> $usernewimage
         ]);
       return view('index');
   }


   

}

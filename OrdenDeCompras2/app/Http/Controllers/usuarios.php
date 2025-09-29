<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usuarios extends Controller
{
    public function registrar(Request $request)
    {
        $campos     =$request->validate(
        [
            'name'      =>['required','min:3','max:10'],
            'email'     =>['required','email','max:10'],
            'password'  =>['required','min:8','max:200'],
        ]);

        $campos['password'] = bcrypt($campos['password']);
        User::create($campos);

        return 'ello from controler';
    }
}

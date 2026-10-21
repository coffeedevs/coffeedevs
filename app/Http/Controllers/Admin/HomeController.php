<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\PasswordChangeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }


    public function changePassword()
    {
        return view('admin.password');
    }

    public function postPassword(PasswordChangeRequest $request)
    {
        try {
            $user = Auth::user();
            $user->password = Hash::make($request->password);
            $user->save();
            Session::flash('success', 'Se ha cambiado la contraseña correctamente');
        } catch (\Throwable $ex) {
            Session::flash('error', 'Hubo un error al cambiar la contraseña');
        }
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactaMail;
use Illuminate\Support\Facades\Mail;

class ContactaController extends Controller
{
    public function index(){
        return view('contacta.index');
    }

    public function store(){

       
        return redirect(route('contacta.index'))->with('success','Email enviado');
    }

}

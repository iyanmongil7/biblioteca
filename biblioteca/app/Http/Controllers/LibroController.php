<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\User;
use App\Models\Prestamo;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{
    public function __contruct()
    {
        $this->middleware("auth");
    }
    //cambiar index
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
     public function prestamos()
    {
        $prestamos=Prestamo::all();
        return view("prestamos", compact("prestamos"));
    }
    public function index()
    {
        $user =  User::find(Auth::user()->id);
        $prestamos=User::find(Auth::user()->id)->prestamos()->get();
        $libros = [];
        foreach ($prestamos as $prestamo) {
            $libros[] = $prestamo->libro()->first();
        }
        return view("libros", compact("libros"));
    }

    public function catalogolibros(Request $request){
        $titulo = $request->get('buscarpor');
        if ($titulo == NULL) {
            $libros = Libro::all();
        }
        else {
            $libros = Libro::where('nombre','like',"%$titulo%")->get();
        }
        return view('admin.users.libros.libroslistas', compact('libros'));
    }

    public function crearPrestamo($idLibro)
    {
        $prestado = Prestamo::where('libros', '=', $idLibro)->count();
        $libro = Libro::find($idLibro);
        if ($prestado < $libro->unidades) {
            $idUsuario = Auth::user()->id;
            $fecha = date('Y-m-d');
            Prestamo::create([
                'usuario'=> $idUsuario,
                'libros'=>$idLibro,
                'fecha'=>$fecha,
            ]);
            return redirect(route("librosUser"))
            ->with("success", __("Prestamo creado!"));
        }
        else {
            return redirect(route("librosUser"))
            ->with("success", __("Prestamo no creado!"));
        }
    }

    public function pagar(){
        return view('/pagar');
    }
    
}

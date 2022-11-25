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
    /*public function mostrar(Request $request)
    {
        $genero = $request->get('buscarpor');

        $libros = Libros::where('Genero','like',"%$genero%")->paginate(6);

        return view('libros.index', compact('libros'));
    }*/
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
    
}

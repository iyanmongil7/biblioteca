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
        return view("libros", compact("prestamos"));
    }

    public function catalogolibros(Request $request){
        $titulo = $request->get('buscarpor');
        if ($titulo == NULL) {
            $libros = Libro::paginate(4);
        }
        else {
            $libros = Libro::where('nombre','like',"%$titulo%")->paginate(4);
        }
        return view('admin.users.libros.libroslistas', compact('libros'));
    }

    public function crearPrestamo($idLibro)
    {
        $prestado = Prestamo::where('libros', '=', $idLibro)->count();
        $tieneUsuario = Prestamo::where('usuario', '=', Auth::user()->id)->count();
        $tieneEseLibro = Prestamo::where('usuario', '=', Auth::user()->id)
            ->where('libros', '=', $idLibro)
            ->count();
            $libro = Libro::find($idLibro);

        if($tieneUsuario == 5){
            return redirect(route("librosUser"))
            ->with("error", __("Tienes el maximo de prestamos"));
        }
        else if ($tieneEseLibro == 1) {
            return redirect(route("librosUser"))
            ->with("error", __("Tienes ese libro"));
        }
        else if ($prestado < $libro->unidades) {
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
            ->with("error", __("Prestamo no creado!"));
        }
    }

    public function pagar(){
        return view('/pagar');
    }
    
    public function pagado(Request $request){

        $this->validate($request, [
            "N_tarjeta"=>"required|max:3",
            "Fecha_caducidad" =>"required",
            "Codigo_seguridad" =>"required|max:3"
        ],[
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute tiene un tamaño maximo.'
        ]);

        $usuario = User::find(Auth::user()->id);
        $usuario->removeRole('basico');
        $usuario->assignRole('premium');

        return view('/pagado');
    }

    public function devolverPremium($id)
    {
        $prestamos = Prestamo::find($id);
        $prestamos->delete();
        return back()->with("error", __("Prestamo eliminado!")); 
        
    }

   
}

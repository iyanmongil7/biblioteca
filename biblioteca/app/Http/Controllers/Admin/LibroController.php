<?php

namespace App\Http\Controllers\Admin;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Prestamo;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
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
    public function index()
    {
        if(auth()->user()->id==1){
            $libros = Libro::paginate(10);
        }else{
        $libros = Libro::where("user_id" , "=", auth()->user()->id)->paginate(10);
    }
        return view("admin/libros.index", compact("libros"));
    }

    public function verprestamo()
    {
        $prestamos = Prestamo::paginate(10); 
        return view("admin/libros/vistaPrestamos", compact("prestamos"));
    }
    
    public function vistaPrestamos(){
        $users = User::all();
        return view('admin.libros.vistaPrestamos', compact("users"));
    }
    
    public function devolver($id)
    {
        $prestamos = Prestamo::find($id);
        $prestamos->delete();
        return back()->with("success", __("Prestamo eliminado!")); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libro = new Libro;
        $title = __("Crear libro");
        $textButton= __("Crear");
        $route = route("libros.store");
       /* dd(compact("title", "textButton", "route", "project"));*/
        return view("admin.libros.create", compact("title", "textButton", "route", "libro"));

    }
    
    /*dolomiti*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            "nombre"=>"required|max:140",
            "autor" => "required|string",
            "editorial" => "required|string",
            "a??o" => "required|integer",
            "unidades" => "required|integer",
            "imagen" => "required|image|mimes:jpg,gif,png,jpeg",
        ],[
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute es un n??mero.'
        ]);
        Libro::create([
            'nombre'=>$request->input("nombre"),
            'autor'=>$request->input("autor"),
            'editorial'=>$request->input("editorial"),
            'a??o'=>$request->input("a??o"),
            'unidades'=>$request->input("unidades"),
            'imagen'=>$request->file("imagen")->store('', 'images'),
        ]);
        return redirect(route("libros.index"))
        ->with("success", __("Libro creado!"));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro=Libro::find($id);
        $update=true;
        $title= __("editar libro");
        $textButton=__("actualizar");
        $route=route("libros.update", $libro->id);
        return view("admin.libros.edit", compact("update", "title", "textButton","route","libro"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "nombre"=>"required|max:140",
            "autor" => "required|string",
            "editorial" => "required|string",
            "a??o" => "required|string",
            "unidades" => "required|integer",
            "imagen" => "image|mimes:jpg,gif,png,jpeg",
        ],[
            'required' => 'El campo :attribute esta mal.',
        ]);


        $libro = Libro::find($id);
        $libro -> nombre = $request->get('nombre');
        $libro -> autor = $request->get('autor');
        $libro -> editorial = $request->get('editorial');
        $libro -> a??o = $request->get('a??o');
        if($request->hasFile('imagen')){
            Storage::disk('images')->delete('images/'.$libro ->Imagen);
            $libro -> Imagen = $request->file('imagen')->store('','images');
        }

        $libro -> save();
        return redirect(route("libros.index"))
        ->with("success", __("Libro creado!"));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestado = Prestamo::where('libros', '=', $id)->count();

        if ($prestado > 0) {
            return redirect("admin/libros")
            ->with("error", __("No se puede borrar el libro"));
        }
        else {
            $libros = Libro::find($id);
            $libros->delete();
            return redirect('admin/libros')->with("success", __("Libro eliminado!"));
        }
    }

    public function confirmarEliminar($id){
        return view('admin/libros/confirmarEliminar', compact('id')) ;
    }
}

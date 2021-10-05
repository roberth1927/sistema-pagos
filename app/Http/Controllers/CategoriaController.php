<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categoria;
 
class CategoriaController extends Controller
{
  
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar == '') {
             $categorias = Categoria::orderBy('id', 'desc')->paginate(3);
            
        }else {
            $categorias = Categoria::where($criterio, 'like', '%' . $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }

        return[
            'pagination' => [
                'total'         => $categorias->total(),
                'current_page'  => $categorias->currentPage(),
                'per_page'      => $categorias->perPage(),
                'last_page'     => $categorias->lastPage(),
                'from'          => $categorias->firstItem(),
                'to'            => $categorias->lastItem(),
            ],
            'categorias' => $categorias
        ];
    }
    
    public function selectCategoria(Request $request){

        if (!$request->ajax()) return redirect('/');
        $categorias = Categoria::where('condicion', '=', '1')
                                ->select('id', 'nombre')->orderBy('nombre', 'asc')->get();
        return ['categorias' => $categorias];
    }
    
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        $catgoria = new Categoria();
        $catgoria->nombre = $request->nombre;
        $catgoria->descripcion = $request->descripcion;
        $catgoria->condicion = '1';
        $catgoria->save();
    }
 
   
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        $catgoria = Categoria::findOrFail($request->id);
        $catgoria->nombre = $request->nombre;
        $catgoria->descripcion = $request->descripcion;
        $catgoria->condicion = '1';
        $catgoria->save();
    }
 
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        $catgoria = Categoria::findOrFail($request->id);
        $catgoria->condicion = '0';
        $catgoria->save();
    }
 
    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
         
        $catgoria = Categoria::findOrFail($request->id);
        $catgoria->condicion = '1';
        $catgoria->save();
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Muestra el formulario para registrar un producto.
     */
    public function crear()
    {
        $categorias = DB::table('categorias')
            ->orderBy('nombre')
            ->get();

        $proveedores = DB::table('proveedor')
            ->orderBy('razonsocial')
            ->get();

        return view('productos.crear', [
            'categorias' => $categorias,
            'proveedores' => $proveedores
        ]);
    }

    /**
     * Recibe, valida y guarda el producto.
     */
    public function guardar(Request $request)
    {
        $datosValidados = $request->validate(
            [
                'nombre' => [
                    'required',
                    'string',
                    'max:150'
                ],

                'codigo' => [
                    'required',
                    'string',
                    'max:50',
                    'unique:productos,codigo'
                ],

                'descripcion' => [
                    'nullable',
                    'string'
                ],

                'precio' => [
                    'required',
                    'numeric',
                    'min:0'
                ],

                'stock' => [
                    'required',
                    'integer',
                    'min:0'
                ],

                'proveedor' => [
                    'nullable',
                    'integer',
                    'exists:proveedor,id_proveedor'
                ],

                'id_categoria' => [
                    'required',
                    'integer',
                    'exists:categorias,id_categoria'
                ],
                'imagen' => [
                    'nullable',
                    'image',
                    'max:2048'
                ]
            ],
            [
                'nombre.required' => 'El nombre es obligatorio.',
                'nombre.max' => 'El nombre no puede superar los 150 caracteres.',

                'codigo.required' => 'El código es obligatorio.',
                'codigo.unique' => 'Ya existe un producto con ese código.',
                'codigo.max' => 'El código no puede superar los 50 caracteres.',

                'precio.required' => 'El precio es obligatorio.',
                'precio.numeric' => 'El precio debe ser un número.',
                'precio.min' => 'El precio no puede ser negativo.',

                'stock.required' => 'El stock es obligatorio.',
                'stock.integer' => 'El stock debe ser un número entero.',
                'stock.min' => 'El stock no puede ser negativo.',

                'proveedor.exists' => 'El proveedor seleccionado no existe.',

                'id_categoria.required' => 'Debe seleccionar una categoría.',
                'id_categoria.exists' => 'La categoría seleccionada no existe.'
            ]
        );

        $nombreImagen = null;
        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombreImagen = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('Imagenes'), $nombreImagen);
        }

        DB::table('productos')->insert([
            'nombre' => $datosValidados['nombre'],
            'codigo' => $datosValidados['codigo'],
            'descripcion' => $datosValidados['descripcion'] ?? null,
            'precio' => $datosValidados['precio'],
            'stock' => $datosValidados['stock'],
            'proveedor' => $datosValidados['proveedor'] ?? null,
            'id_categoria' => $datosValidados['id_categoria'],
            'imagen' => $nombreImagen
        ]);

        return redirect()
            ->route('productos.index')
            ->with('mensaje', 'Producto guardado correctamente.');
    }

    /**
     * Muestra todos los productos.
     */
    public function index()
    {
        $productos = DB::table('productos')
            ->join(
                'categorias',
                'productos.id_categoria',
                '=',
                'categorias.id_categoria'
            )
            ->leftJoin(
                'proveedor',
                'productos.proveedor',
                '=',
                'proveedor.id_proveedor'
            )
            ->select(
                'productos.id_producto',
                'productos.nombre',
                'productos.codigo',
                'productos.descripcion',
                'productos.precio',
                'productos.stock',
                'categorias.nombre as categoria_nombre',
                'proveedor.razonsocial as proveedor_nombre',
                'proveedor.rut as proveedor_rut'
            )
            ->orderBy('productos.nombre')
            ->get();

        return view('productos.index', [
            'productos' => $productos
        ]);
    }
}

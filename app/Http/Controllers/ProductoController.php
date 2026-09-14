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
        $archivo = $request->file('imagen');
        $nombreTemp = null;

        if ($archivo) {
            $nombreTemp = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('Imagenes'), $nombreTemp);
        }

        try {
            $id = DB::table('productos')->insertGetId([
                'nombre' => $datosValidados['nombre'],
                'codigo' => $datosValidados['codigo'],
                'descripcion' => $datosValidados['descripcion'] ?? null,
                'precio' => $datosValidados['precio'],
                'stock' => $datosValidados['stock'],
                'proveedor' => $datosValidados['proveedor'] ?? null,
                'id_categoria' => $datosValidados['id_categoria'],
                'imagen' => $nombreTemp
            ], 'id_producto');

            // Renombrar imagen a producto_(ID) si existe
            if ($nombreTemp && $id) {
                $rutaVieja = public_path('Imagenes/' . $nombreTemp);
                $nombreFinal = 'producto_' . $id . '.' . $archivo->getClientOriginalExtension();
                $rutaNueva = public_path('Imagenes/' . $nombreFinal);
                if (file_exists($rutaVieja)) {
                    rename($rutaVieja, $rutaNueva);
                }
                // Actualizar DB con nombre final
                DB::table('productos')->where('id_producto', $id)->update(['imagen' => $nombreFinal]);
            }

            return redirect()
                ->route('productos.index')
                ->with('mensaje', 'Producto guardado correctamente (ID: ' . $id . ').');
        } catch (\Exception $e) {
            return back()
                ->withErrors(['db' => 'Error al guardar: ' . $e->getMessage()])
                ->withInput();
        }

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

    public function editar($id)
    {
        try {
            $producto = DB::table('productos')->where('id_producto', $id)->first();
            if (!$producto) {
                return redirect()->route('productos.index')->with('error', 'Producto no encontrado.');
            }
            $categorias = DB::table('categorias')->orderBy('nombre')->get();
            $proveedores = DB::table('proveedor')->orderBy('razonsocial')->get();
            return view('productos.editar', compact('producto', 'categorias', 'proveedores'));
        } catch (\Exception $e) {
            return back()->withErrors(['db' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function actualizar(Request $request, $id)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'codigo' => ['required', 'string', 'max:50', 'unique:productos,codigo,' . $id . ',id_producto'],
            'descripcion' => ['nullable', 'string'],
            'precio' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'proveedor' => ['nullable', 'integer', 'exists:proveedor,id_proveedor'],
            'id_categoria' => ['required', 'integer', 'exists:categorias,id_categoria'],
            'imagen' => ['nullable', 'image', 'max:2048']
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'codigo.unique' => 'Ya existe un producto con ese código.',
            'precio.required' => 'El precio es obligatorio.',
            'stock.required' => 'El stock es obligatorio.',
            'id_categoria.required' => 'Debe seleccionar una categoría.',
        ]);

        try {
            $nombreImagen = null;
            $archivo = $request->file('imagen');
            if ($archivo) {
                $nombreImagen = time() . '_' . $archivo->getClientOriginalName();
                $archivo->move(public_path('Imagenes'), $nombreImagen);
            }

            $updateData = [
                'nombre' => $datos['nombre'],
                'codigo' => $datos['codigo'],
                'descripcion' => $datos['descripcion'] ?? null,
                'precio' => $datos['precio'],
                'stock' => $datos['stock'],
                'proveedor' => $datos['proveedor'] ?? null,
                'id_categoria' => $datos['id_categoria']
            ];

            if ($nombreImagen) {
                // Si hay nueva imagen, renombrar a producto_(ID)
                $nombreFinal = 'producto_' . $id . '.' . $archivo->getClientOriginalExtension();
                $rutaVieja = public_path('Imagenes/' . $nombreImagen);
                $rutaNueva = public_path('Imagenes/' . $nombreFinal);
                if (file_exists($rutaVieja)) {
                    rename($rutaVieja, $rutaNueva);
                }
                $updateData['imagen'] = $nombreFinal;
            }

            DB::table('productos')->where('id_producto', $id)->update($updateData);

            return redirect()->route('productos.index')
                ->with('mensaje', 'Producto actualizado correctamente (ID: ' . $id . ').');
        } catch (\Exception $e) {
            return back()->withErrors(['db' => 'Error al actualizar: ' . $e->getMessage()])->withInput();
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    // Mostrar todos los reportes
    public function index()
    {
        $reportes = Reporte::latest()->get();
        return view('home', compact('reportes'));
    }

    // Formulario para crear nuevo reporte
    public function create()
    {
        return view('reporte');
    }

    // Guardar un nuevo reporte
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $ruta = null;

        if ($request->hasFile('foto')) {
            $ruta = $request->file('foto')->store('fotos', 'public');
        }

        // Crear reporte asociado al usuario autenticado
        $reporte = new Reporte([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'foto' => $ruta,
        ]);

        // Asociar el reporte al usuario actual
        $reporte->user()->associate(Auth::user());
        $reporte->save();

        return redirect()->route('home')->with('success', 'Reporte enviado correctamente');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $reporte = Reporte::findOrFail($id);
        
        // Verificar que el usuario sea el creador del reporte
        if ($reporte->user_id !== Auth::id()) {
            return redirect()->route('home')->with('error', 'No tienes permiso para editar este reporte');
        }

        return view('editar_reporte', compact('reporte'));
    }

    // Actualizar un reporte
    public function update(Request $request, $id)
    {
        $reporte = Reporte::findOrFail($id);

        // Verificar que el usuario sea el creador del reporte
        if ($reporte->user_id !== Auth::id()) {
            return redirect()->route('home')->with('error', 'No tienes permiso para actualizar este reporte');
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($reporte->foto) {
                Storage::delete('public/' . $reporte->foto);
            }
            $reporte->foto = $request->file('foto')->store('fotos', 'public');
        }

        $reporte->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'foto' => $reporte->foto,
        ]);

        return redirect()->route('home')->with('success', 'Reporte actualizado correctamente');
    }

    // Eliminar todos los reportes (solo para administradores)
    public function borrarTodo()
    {
        // Verificar si el usuario es administrador
        if (!Auth::user()->is_admin) {
            return redirect()->route('home')->with('error', 'No tienes permisos para esta acción');
        }

        $reportes = Reporte::all();

        foreach ($reportes as $reporte) {
            if ($reporte->foto) {
                Storage::delete('public/' . $reporte->foto);
            }
        }

        Reporte::truncate();

        return redirect()->route('home')->with('status', 'Todos los reportes han sido eliminados.');
    }

    // Eliminar un reporte individual
    public function destroy($id)
    {
        $reporte = Reporte::findOrFail($id);

        // Verificar que el usuario sea el creador del reporte o administrador
        if ($reporte->user_id !== Auth::id() && !Auth::user()->is_admin) {
            return redirect()->route('home')->with('error', 'No tienes permiso para eliminar este reporte');
        }

        if ($reporte->foto) {
            Storage::delete('public/' . $reporte->foto);
        }

        $reporte->delete();

        return redirect()->route('home')->with('status', 'Reporte eliminado correctamente.');
    }
}
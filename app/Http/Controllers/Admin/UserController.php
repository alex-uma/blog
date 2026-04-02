<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:Gestion de usuarios']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'nullable|array',
        ]);

        $user = User::create($request->all());

        $user->roles()->attach($request->roles);

        return redirect()->route('admin.users.edit', $user)->with('info', 'El usuario fue creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:users,email,{$user->id}",
            'password' => 'nullable|string|min:8|confirmed',
            'roles' => 'nullable|exists:roles,id',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($user->password) {
            $user->password = bcrypt($request->password);
        }

        if ($request->input('roles') == '') {
            $user->roles()->detach();  // Detach elimina todos los roles asignados
        } else {
            // Asignar el rol nuevo
            $user->roles()->sync($request->roles);  // Usa syncRoles para asignar el nuevo rol
        }

        return redirect()->route('admin.users.edit', $user)->with('info', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Verificar si el usuario tiene un rol restringido
        if ($user->hasRole(['Admin', 'Blogger'])) {
            // Si el usuario tiene un rol asignado que no puede ser eliminado
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Error!',
                'text' => 'Este usuario no puede ser eliminado porque tiene un rol asignado.',
                'confirmButtonText' => 'Aceptar',
            ]);

            // Redirigir a la edición del usuario
            return redirect()->route('admin.users.edit', $user);
        }

        // Verificar si el usuario tiene posts asociados
        $posts = Post::where('user_id', $user->id)->exists();

        if ($posts) {
            // Si tiene posts asociados, mostrar mensaje de error
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Error!',
                'text' => 'El usuario no se puede eliminar porque tiene posts asociadas.',
                'confirmButtonText' => 'Aceptar',
            ]);

            // Redirigir a la edición del usuario
            return redirect()->route('admin.users.edit', $user);
        }

        // Proceder con la eliminación del usuario si no tiene posts ni roles restringidos
        $user->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.users.index')->with('info', 'Usuario eliminado correctamente');
    }
}

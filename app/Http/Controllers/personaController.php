<?php


namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class personaController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->get('buscar');
        $registros = Persona::where('name', 'LIKE', "%$query%")
            ->orWhere('lastname', 'LIKE', "%$query%")
            ->paginate(5);
        return view('home', compact('registros'));
    }

    public function createPdf()
    {
        $persona = Persona::all();
        $pdf = Pdf::loadView('components.pdf', compact('persona'));
        return $pdf->stream();
    }

    public function pdfUsuario($id)
    {
        $persona = Persona::find($id);
        $pdf = Pdf::loadView('components.user', compact('persona'));
        return $pdf->stream();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:100',
            'lastname' => 'required|string|min:4|max:100',
            'birthdate' => 'required|date',
            'email' => 'required|string|email|max:255',
            'user_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $fechaFormulario = $request->input('birthdate');
        $fecha_nacimiento = Carbon::createFromFormat('Y-m-d', $fechaFormulario);


        $user = new Persona();
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->birthdate = $fecha_nacimiento;
        $user->email = $request->input('email');

        if ($request->hasFile('user_photo')) {
            $file = $request->file('user_photo');
            $fileName = 'user_photo_' . time() . '.' . $file->getClientOriginalExtension();
            $imagePath = $file->storeAs('user_photos', $fileName, 'public');
            $user->user_photo = $imagePath;
        }

        $user->save();


        return redirect()->route('personas.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personas = Persona::find($id);
        return view('components.delete', compact('personas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editar = Persona::find($id);
        return view('components.update', compact('editar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:100',
            'lastname' => 'required|string|min:4|max:100',
            'birthdate' => 'required|date',
            'email' => 'required|string|email|max:255',
            'user_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);


        $persona = Persona::findOrFail($id);

        if ($request->hasFile('user_photo')) {
            $file = $request->file('user_photo');
            $fileName = 'user_photo_' . time() . '.' . $file->getClientOriginalExtension();
            $imagePath = $file->storeAs('user_photos', $fileName, 'public');

            // Eliminar la foto antigua si existe
            if (!is_null($persona->user_photo) && Storage::disk('public')->exists($persona->user_photo)) {
                Storage::disk('public')->delete($persona->user_photo);
            }

            $persona->user_photo = $imagePath;
        }

        $persona->name = $request->input('name');
        $persona->lastname = $request->input('lastname');
        $persona->birthdate = $request->input('birthdate');
        $persona->email = $request->input('email');

        $persona->save();
        return redirect()->route('personas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        if (!is_null($persona->user_photo) && Storage::disk('public')->exists($persona->user_photo)) {
            Storage::disk('public')->delete($persona->user_photo);
        }
        $persona->delete();
        return redirect()->route('personas.index');
    }
}

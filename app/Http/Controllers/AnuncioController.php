<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnuncioRequest;
use App\Models\Anuncio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnuncioController extends Controller
{
    public function __construct(private Anuncio $anuncioModel)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anuncios = $this->anuncioModel->paginate(10);

        return view('anuncios.index', compact('anuncios')); // php.net/compact
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $usuarios)
    {
        $usuarios = $usuarios->all(['id', 'name']);

        return view('anuncios.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnuncioRequest $request)
    {
        $data = $request->except('anunciante');
        $data['user_id'] = $request->anunciante;

        if (isset($data['photo'])) {
            $data['photo'] = $data['photo']->store('anuncios', 'public');
        }

        $this->anuncioModel->create($data);

        return redirect()->route('anuncios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('anuncios.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, User $usuarios)
    {
        $anuncio = $this->anuncioModel->findOrFail($id);
        $usuarios = $usuarios->all(['id', 'name']);

        return view('anuncios.edit', compact('anuncio', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnuncioRequest $request, string $id)
    {
        $data = $request->except('anunciante');
        $anuncio = $this->anuncioModel->findOrFail($id);

        if ($request->photo) {
            if ($anuncio->photo) Storage::disk('public')->delete($anuncio->photo);

            $data['photo'] = $data['photo']->store('anuncios', 'public');
        }


        $anuncio->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anuncio = $this->anuncioModel->findOrFail($id);

        $anuncio->delete();

        return redirect()->back();
    }
}

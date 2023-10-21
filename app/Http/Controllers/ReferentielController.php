<?php

namespace App\Http\Controllers;

use App\Models\DetailReferentiel;
use App\Models\Referentiel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReferentielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Referentiel::query()
            ->when(request()->has('search'), function ($query) {
                $query->where(function ($query) {
                    $query->where('code', 'like', '%'.request('search').'%')
                        ->orWhere('libelle', 'like', '%'.request('search').'%');
                });
            })
            ->orderby('code', 'asc')
            ->get();
        return view('referentiels.index', compact('datas'));
    }
    /**
     * Display a listing of the resource.
     */
    public function indexSousReferentiel(Referentiel $referentiel)
    {
        $laligne = $referentiel;
        $datas = DetailReferentiel::where('referentiel_id', '=', $laligne?->id)
            ->when(request()->has('search'), function ($query) {
                $query->where(function ($query) {
                    $query->where('code', 'like', '%'.request('search').'%')
                        ->orWhere('libelle', 'like', '%'.request('search').'%');
                })
                    ->orWhere(function ($q) {
                        $q->whereRelation('detail_referentiel', 'libelle', 'like', '%'.request('search').'%');
                    });
            })
            ->orderby('code', 'asc')
            ->get();
        return view('referentiels.detailreferentiels.index', compact('datas', 'laligne'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('referentiels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'code' => 'string|required|max:5|unique:referentiels',
                'libelle' => 'string|required|max:50|unique:referentiels',
            ],
            [
                'code' => [
                    'required' => 'Le code est obligatoire',
                    'max' => 'Il faut 5 caractères au trop',
                    'unique' => 'Ce code existe déjà dans la base',
                ],
                'libelle' => [
                    'required' => 'Le libellé est obligatoire',
                    'max' => 'Il faut 50 caractères au trop',
                    'unique' => 'Ce libellé existe déjà dans la base',
                ]
            ]);

        try {
            $insert = new Referentiel();
            $insert->code = request('code');
            $insert->libelle = request('libelle');
            if($insert->save()){
                Alert::success(request('libelle'), 'ajouté avec succès');
                return redirect()->route('referentiels.index');
            }
        }
        catch (\Exception $e){
            Alert::error('Erreur', $e->getMessage());
            return redirect()->route('referentiels.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Referentiel $referentiel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Referentiel $referentiel)
    {
        $laligne = Referentiel::findOrFail($referentiel->id);

        return view('referentiels.edit', compact('laligne'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Referentiel $referentiel, Request $request)
    {
        $validated = $this->validate($request,
            [
                'code' => 'string|required|max:5',
                'libelle' => 'string|required|max:50',
            ],
            [
                'code' => [
                    'required' => 'Le code est obligatoire',
                    'max' => 'Il faut 5 caractères au trop',
                ],
                'libelle' => [
                    'required' => 'Le libellé est obligatoire',
                    'max' => 'Il faut 50 caractères au trop',
                ]
            ]);

        $referentiel = Referentiel::find($referentiel->id);
        try {
            $referentiel->update([
                'code' => request('code'),
                'libelle' => request('libelle'),
            ]);
            if($referentiel->update()){
                Alert::success(request('libelle'), 'modifié avec succès');
                return redirect()->route('referentiels.index');
            }
        }
        catch (\Exception $e) {
            Alert::error('Erreur', $e->getMessage());
            return redirect()->route('referentiels.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Referentiel $referentiel)
    {
        $referentiel = Referentiel::find($referentiel->id);
        try {
            if($referentiel->delete()){
                Alert::warning('Référentiel', 'supprimé avec succès');
                return redirect()->route('referentiels.index');
            }
        }
        catch (\Exception $e){
            Alert::error('Erreur', $e->getMessage());
            return redirect()->route('referentiels.index');
        }
    }
}

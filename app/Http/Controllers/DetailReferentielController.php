<?php

namespace App\Http\Controllers;

use App\Models\DetailReferentiel;
use App\Models\Referentiel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DetailReferentielController extends Controller
{
//    l'index du detailReferentiel se trouve dans le controlleur referentiel

    /**
     * Show the form for creating a new resource.
     */
    public function createDetailReferentiel(Referentiel $referentiel){
        $laligne = Referentiel::findOrFail($referentiel->id);
        $datas['leparent'] = DetailReferentiel::all();

        return view('referentiels.detailreferentiels.create', compact('laligne'))->with($datas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'code' => 'string|required|max:5|unique:detail_referentiels',
                'libelle' => 'string|required|max:50|unique:detail_referentiels',
                'referentiel_id' => 'integer|required',
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
            $insert = new DetailReferentiel();
            $insert->code = request('code');
            $insert->libelle = request('libelle');
            $insert->referentiel_id = request('referentiel_id');
            $insert->parent_id = request('parent_id');
            if($insert->save()){
                Alert::success(request('libelle'), 'ajouté avec succès');
                return redirect()->route('sousRef.index', request('referentiel_id'));
            }
        }
        catch (\Exception $e){
            Alert::error('Erreur', $e->getMessage());
            return redirect()->route('sousRef.index', request('referentiel_id'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailReferentiel $detailreferentiel)
    {
        $laligne = DetailReferentiel::findOrFail($detailreferentiel->id);
        $laligne['leparent'] = DetailReferentiel::all();
        return view('referentiels.detailreferentiels.edit', compact('laligne'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailReferentiel $detailreferentiel)
    {
        $this->validate($request,
            [
                'code' => 'string|required|max:5',
                'libelle' => 'string|required|max:50',
                'referentiel_id' => 'integer|required',
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

        $detailreferentiel = DetailReferentiel::find($detailreferentiel->id);
        try {
            $detailreferentiel->update([
                'code' => request('code'),
                'libelle' => request('libelle'),
                'referentiel_id' => request('referentiel_id'),
                'parent_id' => request('parent_id'),
            ]);
            if($detailreferentiel->update()){
                Alert::success(request('libelle'), 'modifié avec succès');
                return redirect()->route('sousRef.index', request('referentiel_id'));
            }
        }
        catch (\Exception $e) {
            Alert::error('Erreur', $e->getMessage());
            return redirect()->route('sousRef.index', request('referentiel_id'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailReferentiel $detailreferentiel)
    {
        $detailreferentiel = DetailReferentiel::find($detailreferentiel->id);
        try {
            if($detailreferentiel->delete()){
                Alert::warning('Détail référentiel', 'supprimé avec succès');
                return redirect()->route('sousRef.index', $detailreferentiel?->referentiel_id);
            }
        }
        catch (\Exception $e){
            Alert::error('Erreur', $e->getMessage());
            return redirect()->route('sousRef.index', $detailreferentiel?->referentiel_id);
        }
    }
}

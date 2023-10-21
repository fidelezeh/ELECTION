<?php

namespace App\Http\Controllers;

use App\Models\DetailReferentiel;
use App\Models\Election;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Election::query()
            ->when(request()->has('search'), function ($query) {
                $query->where(function ($query) {
                    $query->where('session_election', 'like', '%'.request('search').'%');
                })
                    ->orWhere(function ($q) {
                        $q->whereRelation('electionType', 'libelle', 'like', '%'.request('search').'%');
                    });
            })
            ->orderBy('session_election', 'desc')
            ->get();
        return view('elections.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas['lestypes'] = DetailReferentiel::query()
            ->whereRelation('detail_referentiel', 'code', '=', 'T-E')->get();
        $datas['lestatuts'] = DetailReferentiel::query()
            ->where('code', '=', 'LCM')->get();
        return view('elections.create')->with($datas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'type_election_id' => 'integer|required',
                'session_election' => 'date|required|unique:elections',
                'statut_election_id' => 'integer|required',
                'date_d_verif_list' => 'date',
                'date_f_verif_list' => 'date',
                'date_d_campagne' => 'date',
                'date_f_campagne' => 'date',
                'date_d_vote' => 'date',
                'date_f_vote' => 'date',
            ],
            [
                'type_election_id' => [
                    'required' => 'Préciser le type d\'élection est obligatoire',
                ],
                'session_election' => [
                    'required' => 'La session de l\'élection est obligatoire',
                    'max' => 'Il faut 15 caractères au trop',
                    'unique' => 'Cette élection s\'est déjà déroulée',
                ]
            ]);

        try {
            $insert = new Election();
            $insert->type_election_id = request('type_election_id');
            $insert->session_election = request('session_election');
            $insert->statut_election_id = request('statut_election_id');
            $insert->date_d_verif_list = request('date_d_verif_list');
            $insert->date_f_verif_list = request('date_f_verif_list');
            $insert->date_d_campagne = request('date_d_campagne');
            $insert->date_f_campagne = request('date_f_campagne');
            $insert->date_d_vote = request('date_d_vote');
            $insert->date_f_vote = request('date_f_vote');
            if (request('session_election') < request('date_d_verif_list') &&
                request('date_d_verif_list') < request('date_f_verif_list') &&
                request('date_f_verif_list') < request('date_d_campagne')&&
                request('date_d_campagne') < request('date_f_campagne') &&
                request('date_f_campagne') < request('date_d_vote') &&
                request('date_d_vote') < request('date_f_vote'))
            {
                if ($insert->save()){
                    Alert::success('Election', 'créée avec succès');
                    return redirect()->route('election.index');
                }
            }
            else{
                Alert::warning('Problème des dates', 'Merci de vérifier la cohérence des dates');
                return redirect()->route('election.index');
            }
        }
        catch (\Exception $e){
            Alert::error('Erreur', $e->getMessage());
            return redirect()->route('election.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Election $election)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Election $election)
    {
        $laligne = Election::findOrFail($election->id);
        $laligne['lestypes'] = DetailReferentiel::query()
            ->whereRelation('detail_referentiel', 'code', '=', 'T-E')->get();
        $laligne['lestatuts'] = DetailReferentiel::query()
            ->whereRelation('detail_referentiel', 'code', '=', 'S-E')->get();
        return view('elections.edit', compact('laligne'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Election $election)
    {
        $this->validate($request,
            [
                'type_election_id' => 'integer|required',
                'session_election' => 'date|required',
                'statut_election_id' => 'integer|required',
                'date_d_verif_list' => 'date',
                'date_f_verif_list' => 'date',
                'date_d_campagne' => 'date',
                'date_f_campagne' => 'date',
                'date_d_vote' => 'date',
                'date_f_vote' => 'date',
            ],
            [
                'type_election_id' => [
                    'required' => 'Préciser le type d\'élection est obligatoire',
                ],
                'session_election' => [
                    'required' => 'La session de l\'élection est obligatoire',
                    'max' => 'Il faut 15 caractères au trop',
                    'unique' => 'Cette élection s\'est déjà déroulée',
                ]
            ]);

        $election = Election::find($election->id);
        try {
            $election->update([
                'type_election_id' => request('type_election_id'),
                'session_election' => request('session_election'),
                'statut_election_id' => request('statut_election_id'),
                'date_d_verif_list' => request('date_d_verif_list'),
                'date_f_verif_list' => request('date_f_verif_list'),
                'date_d_campagne' => request('date_d_campagne'),
                'date_f_campagne' => request('date_f_campagne'),
                'date_d_vote' => request('date_d_vote'),
                'date_f_vote' => request('date_f_vote'),
            ]);
            if (request('session_election') < request('date_d_verif_list') &&
                request('date_d_verif_list') < request('date_f_verif_list') &&
                request('date_d_campagne') < request('date_f_campagne') &&
                request('date_f_campagne') < request('date_d_vote') &&
                request('date_d_vote') < request('date_f_vote')){
                if ($election->update()){
                    Alert::success('Election', 'modifiée avec succès');
                    return redirect()->route('election.index');
                }
            }
            else{
                Alert::warning('Problème des dates', 'Merci de vérifier la cohérence des dates');
            }
        }
        catch (\Exception $e) {
            Alert::error('Erreur', $e->getMessage());
            return redirect()->route('election.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Election $election)
    {
        $election = Election::find($election->id);
        try {
            if($election->delete()){
                Alert::warning('Election', 'supprimée avec succès');
                return redirect()->route('election.index');
            }
        }
        catch (\Exception $e){
            Alert::error('Erreur', $e->getMessage());
            return redirect()->route('election.index');
        }
    }
}

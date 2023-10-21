@extends('layouts.app')
@section('content')
    <div class="mb-2 text-xl font-light text-gray-700">
        <div class="p-2 bg-white rounded-tl-lg rounded-tr-lg">
            <div class="flex items-center justify-between">
                <h2 class="p-1 text-lg md:text-lg text-black font-normalleading-tight flex items-center justify-start">
                    MODIFICATION DE L'ELECTION
                </h2>
            </div>
        </div>
    </div>

    <div class="bg-white -mt-3 overflow-hidden border border-gray-200 shadow-sm sm:rounded-lg">
        <section class="container w-full p-6 pb-0 mx-auto shadow-md shadow-black rounded-bl-lg rounded-br-lg">
            <div class="-mt-6 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{route('election.update', $laligne?->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4">
                        <div class="pt-4">
                            <label for="type_election_id" class="block text-sm font-medium leading-6 text-gray-900">Type d'élection <span class="text-red-600">(*)</span></label>
                            <div class="relative mt-1">
                                <select name="type_election_id" required class="peer block w-full border-0 bg-gray-50 py-0.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
                                    @forelse  ($laligne?->lestypes as $v)
                                        <option value=" {{ $v?->id }} " {{ ($v->id == $laligne->type_election_id)?"selected":"" }}> {{ $v?->libelle }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('type_election_id')
                                <div class="text-red-500 text-sm">{{$message}}</div>
                                @enderror
                                <div class="absolute inset-x-0 bottom-0 border-t border-ventis_color peer-focus:border-t-2 peer-focus:border-color_att" aria-hidden="true"></div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <label for="session_election" class="block text-sm font-medium leading-6 text-gray-900">Session <span class="text-red-600">(*)</span></label>
                            <div class="relative mt-1">
                                <input type="date" name="session_election" id="session_election" value="{{ $laligne?->session_election }}" class="peer block w-full border-0 bg-gray-50 py-0.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
                                @error('session_election')
                                <div class="text-red-500 text-sm">{{$message}}</div>
                                @enderror
                                <div class="absolute inset-x-0 bottom-0 border-t border-ventis_color peer-focus:border-t-2 peer-focus:border-color_att" aria-hidden="true"></div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <label for="date_d_verif_list" class="block text-sm font-medium leading-6 text-gray-900">Début vérification des listes</label>
                            <div class="relative mt-1">
                                <input type="date" name="date_d_verif_list" id="date_d_verif_list" value="{{ $laligne?->date_d_verif_list }}" class="peer block w-full border-0 bg-gray-50 py-0.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
                                @error('date_d_verif_list')
                                <div class="text-red-500 text-sm">{{$message}}</div>
                                @enderror
                                <div class="absolute inset-x-0 bottom-0 border-t border-ventis_color peer-focus:border-t-2 peer-focus:border-color_att" aria-hidden="true"></div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <label for="date_f_verif_list" class="block text-sm font-medium leading-6 text-gray-900">Fin vérification des listes</label>
                            <div class="relative mt-1">
                                <input type="date" name="date_f_verif_list" id="date_f_verif_list" value="{{ $laligne?->date_f_verif_list }}" class="peer block w-full border-0 bg-gray-50 py-0.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
                                @error('date_f_verif_list')
                                <div class="text-red-500 text-sm">{{$message}}</div>
                                @enderror
                                <div class="absolute inset-x-0 bottom-0 border-t border-ventis_color peer-focus:border-t-2 peer-focus:border-color_att" aria-hidden="true"></div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <label for="date_d_campagne" class="block text-sm font-medium leading-6 text-gray-900">Début de la campagne</label>
                            <div class="relative mt-1">
                                <input type="date" name="date_d_campagne" id="date_d_campagne" value="{{ $laligne?->date_d_campagne }}" class="peer block w-full border-0 bg-gray-50 py-0.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
                                @error('date_d_campagne')
                                <div class="text-red-500 text-sm">{{$message}}</div>
                                @enderror
                                <div class="absolute inset-x-0 bottom-0 border-t border-ventis_color peer-focus:border-t-2 peer-focus:border-color_att" aria-hidden="true"></div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <label for="date_f_campagne" class="block text-sm font-medium leading-6 text-gray-900">Fin de la campagne</label>
                            <div class="relative mt-1">
                                <input type="date" name="date_f_campagne" id="date_f_campagne" value="{{ $laligne?->date_f_campagne }}" class="peer block w-full border-0 bg-gray-50 py-0.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
                                @error('date_f_campagne')
                                <div class="text-red-500 text-sm">{{$message}}</div>
                                @enderror
                                <div class="absolute inset-x-0 bottom-0 border-t border-ventis_color peer-focus:border-t-2 peer-focus:border-color_att" aria-hidden="true"></div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <label for="date_d_vote" class="block text-sm font-medium leading-6 text-gray-900">Début des votes</label>
                            <div class="relative mt-1">
                                <input type="date" name="date_d_vote" id="date_d_vote" value="{{ $laligne?->date_d_vote }}" class="peer block w-full border-0 bg-gray-50 py-0.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
                                @error('date_d_vote')
                                <div class="text-red-500 text-sm">{{$message}}</div>
                                @enderror
                                <div class="absolute inset-x-0 bottom-0 border-t border-ventis_color peer-focus:border-t-2 peer-focus:border-color_att" aria-hidden="true"></div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <label for="date_f_vote" class="block text-sm font-medium leading-6 text-gray-900">Fin des votes</label>
                            <div class="relative mt-1">
                                <input type="date" name="date_f_vote" id="date_f_vote" value="{{ $laligne?->date_f_vote }}" class="peer block w-full border-0 bg-gray-50 py-0.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
                                @error('date_f_vote')
                                <div class="text-red-500 text-sm">{{$message}}</div>
                                @enderror
                                <div class="absolute inset-x-0 bottom-0 border-t border-ventis_color peer-focus:border-t-2 peer-focus:border-color_att" aria-hidden="true"></div>
                            </div>
                        </div>

                        <div class="pt-4">
                            <label for="statut_election_id" class="block text-sm font-medium leading-6 text-gray-900">Statut <span class="text-red-600">(*)</span></label>
                            <div class="relative mt-1">
                                <select name="statut_election_id" required class="peer block w-full border-0 bg-gray-50 py-0.5 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
                                    @forelse  ($laligne?->lestatuts as $v)
                                        <option value=" {{ $v?->id }} " {{ ($v->id == $laligne->statut_election_id)?"selected":"" }}> {{ $v?->libelle }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('statut_election_id')
                                <div class="text-red-500 text-sm">{{$message}}</div>
                                @enderror
                                <div class="absolute inset-x-0 bottom-0 border-t border-ventis_color peer-focus:border-t-2 peer-focus:border-color_att" aria-hidden="true"></div>
                            </div>
                        </div>
                    </div>
                    {{--butons de navigation--}}
                    <div class="grid md:flex grid-cols-2 justify-end gap-4 mt-3 p-2">
                        <a href="{{route('election.index')}}">
                            <p class="py-1 px-4 border rounded-md border-ventis_color text-ventis_color cursor-pointer uppercase text-sm font-extralight hover:bg-ventis_color hover:text-white hover:shadow">
                                Retour
                            </p>
                        </a>
                        <button type="submit" class="py-1 px-4 border rounded-md border-ventis_color text-ventis_color cursor-pointer uppercase text-sm font-extralight hover:bg-ventis_color hover:text-white hover:shadow">
                            Appliquer la modification
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

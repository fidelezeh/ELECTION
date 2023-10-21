@extends('layouts.app')
@section('content')
    <div class="mb-2 text-xl font-light text-gray-700 border-b-2">
        <div class="p-2 bg-white rounded-tl-lg rounded-tr-lg">
            <div class="flex items-center justify-between">
                <h2 class="p-1 text-lg md:text-lg text-black font-normalleading-tight flex items-center justify-start">
                    {{ __('Tableau de bord élection') }}
                </h2>
            </div>
        </div>
    </div>

    <div class="bg-white -mt-3 overflow-hidden border border-gray-200 shadow-sm sm:rounded-lg">
        <section class="container w-full p-6 pb-0 mx-auto shadow-md shadow-black rounded-bl-lg rounded-br-lg">
            <div class="flex flex-col">
                <div class="-mx-4 -my-2 overflow-x-auto overflow-auto sm:-mx-6 lg:-mx-8">
                    <div class="flex justify-end gap-3 px-1 lg:px-4">
                        <div class="mb-4 pb-5">
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                </div>
                                <form>
                                    <input type="text" id="search" name="search" value="{{ request('search') }}" class="block p-1.5 pl-10 w-80 text-sm text-color_rem bg-gray-50 rounded-lg border border-gray-300 focus:ring-color_att focus:border-ventis_color" placeholder="Rechercher par type/session (aaaa-mm-jj)">
                                </form>
                            </div>
                        </div>
                        <span class="mb-4 pb-5 p-1">
                            <a href="{{ route('election.create') }}" title="Créer ici..">
                                <button class="flex items-center px-2 py-1 text-sm tracking-wide text-color_rej transition-colors duration-200 bg-color_att rounded-lg shrink-0 sm:w-auto gap-x-1 hover:bg-ventis_color">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                      <path fill-rule="evenodd" d="M12 5.25a.75.75 0 01.75.75v5.25H18a.75.75 0 010 1.5h-5.25V18a.75.75 0 01-1.5 0v-5.25H6a.75.75 0 010-1.5h5.25V6a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </a>
                        </span>
                    </div>
                    <div class="inline-block min-w-full h-screen -mt-6 align-middle md:px-6 lg:px-4">
                        <div class="border border-gray-200 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-color_att text-white">
                                <tr class="border-gray-400 border-b">
                                    <th scope="col" class="py-2 px-2 text-sm text-left rtl:text-right text-white">
                                        #
                                    </th>
                                    <th scope="col" class="py-2 px-3 text-sm text-left rtl:text-right text-white">
                                        TYPE D'ELECTION
                                    </th>
                                    <th scope="col" class="py-2 px-4 text-sm text-left rtl:text-right text-white">
                                        SESSION
                                    </th>
                                    <th scope="col" class="py-2 px-4 text-sm text-left rtl:text-right text-white">
                                        STATUT
                                    </th>
                                    <th scope="col" class="py-2 px-3 text-sm text-left rtl:text-right text-white">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-gray-50 divide-y divide-color_rem">
                                @forelse ($datas as $data)
                                    <tr class="hover:bg-color_rej">
                                        <td class="px-2 py-2 text-sm font-normalwhitespace-nowrap">
                                            <div>
                                                <p class="text-sm text-gray-600">
                                                    {{$loop->iteration }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-3 py-2 text-sm font-normalwhitespace-nowrap">
                                            <div>
                                                <p class="text-sm text-gray-600">
                                                    {{ $data?->electionType->libelle }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 text-sm font-normalwhitespace-nowrap">
                                            <div>
                                                <p class="text-sm text-gray-600">
                                                    {{ date('d-M-Y', strtotime($data?->session_election)) }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-3 py-2 text-sm font-normalwhitespace-nowrap">
                                            <div>
                                                <p class="text-sm text-gray-600">
                                                    @if($data?->electionStatut->libelle == "Lancement")
                                                        <span class="fade-in text-black">{{ $data?->electionStatut->libelle }}</span>
                                                    @elseif($data?->electionStatut->libelle == "Vérification des listes")
                                                        <span class="text-sfe_color font-bold">{{ $data?->electionStatut->libelle }}</span>
                                                    @elseif($data?->electionStatut->libelle == "Campagne électorale")
                                                        <span class="text-ventis_color font-bold">{{ $data?->electionStatut->libelle }}</span>
                                                    @elseif($data?->electionStatut->libelle == "Période du vote")
                                                        <span class="text-red-800 font-bold shadow-lg">{{ $data?->electionStatut->libelle }}</span>
                                                    @else
                                                        <span class="font-extralight">{{ $data?->electionStatut->libelle }}</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-3 py-2 text-sm whitespace-nowrap flex items-center justify-start">
                                            <a href="{{route('election.edit', $data?->id)}}" title="Modifier" class="font-light hover:underline">
                                                <button class="flex items-center gap-1 py-1 px-2 text-black/40 hover:text-black dark:text-white/40 dark:hover:text-white transition-all duration-300">
                                                    <svg class="w-4 h-4 text-ventis_color" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </button>
                                            </a>

                                            <a href="{{ route('election.destroy', $data?->id) }}" title="Supprimer" class="font-light hover:underliner">
                                                <form method="post" action="{{route('election.destroy', $data?->id)}}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="flex items-center gap-1 py-1 px-2 text-black/40 hover:text-black dark:text-white/40 dark:hover:text-white transition-all duration-300">
                                                        <svg class="w-4 h-4 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                @empty
                                    <div class="flex item-center justify-center p-6 text-lg font-medium">
                                        Aucun enregistrement trouvé
                                    </div>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

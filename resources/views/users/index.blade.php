{{--<x-app-layout>--}}
@extends('layouts.app')
@section('content')
{{--    <x-slot name="header">--}}
{{--        {{ __('Utilisateurs') }}--}}
{{--    </x-slot>--}}
    <div class="mb-2 text-xl font-light text-gray-700 border-b-2">
        <div class="p-2 bg-white rounded-tl-lg rounded-tr-lg">
            <div class="flex items-center justify-between">
                <h2 class="p-1 text-lg md:text-lg text-black font-normalleading-tight flex items-center justify-start">
                    {{ __('Tableau de bord utilisateurs') }}
                </h2>
            </div>
        </div>
    </div>
    <div class="mb-4 inline-flex overflow-hidden w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-12 bg-blue-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
            </svg>
        </div>
        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold text-blue-500">Informations</span>
                <p class="text-sm text-gray-600">Liste des utlisateurs enrégistrés.</p>
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
                                <input type="text" id="search" name="search" value="{{ request('search') }}" class="block p-1.5 pl-10 w-80 text-sm text-color_rem bg-gray-50 rounded-lg border border-gray-300 focus:ring-color_att focus:border-ventis_color" placeholder="Rechercher par code/libellé">
                            </form>
                        </div>
                    </div>
                    <span class="mb-4 pb-5 p-1">
                        <a href="{{ route('user-create') }}" title="Créer ici..">
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
                                    NOM D'UTILISATEUR
                                </th>
                                <th scope="col" class="py-2 px-4 text-sm text-left rtl:text-right text-white">
                                    PROFIL
                                </th>
                                <th scope="col" class="py-2 px-4 text-sm text-left rtl:text-right text-white">
                                    E-MAIL
                                </th>
                                <th scope="col" class="py-2 px-4 text-sm text-left rtl:text-right text-white">
                                    ETAT
                                </th>
                                <th scope="col" class="py-2 px-3 text-sm text-left rtl:text-right text-white">

                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-gray-50 divide-y divide-color_rem">
                            @forelse ($users as $user)
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
                                                {{ $user?->name }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 text-sm font-normalwhitespace-nowrap">
                                        <div>
                                            <p class="text-sm text-gray-600">
                                                Profil en cours..
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 text-sm font-normalwhitespace-nowrap">
                                        <div>
                                            <p class="text-sm text-gray-600">
                                                {{ $user->email }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 text-sm font-normalwhitespace-nowrap">
                                        <div>
                                            <p class="text-sm text-gray-600">
                                                Etat ici..
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 text-sm whitespace-nowrap flex items-center justify-start">
                                        <a href="#!" class="font-light hover:underline" title="Modifier">
                                            <button class="flex items-center gap-1 py-1 px-2 text-black/40 hover:text-black dark:text-white/40 dark:hover:text-white transition-all duration-300">
                                                <svg class="w-4 h-4 text-ventis_color" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </button>
                                        </a>
                                        <a href="#!" title="Supprimer" class="font-light hover:underliner">
                                            <form method="post" action="#!" enctype="multipart/form-data">
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



{{--    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">--}}
{{--        <table class="min-w-full leading-normal">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">--}}
{{--                    Nom d'utilisateur--}}
{{--                </th>--}}
{{--                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">--}}
{{--                    Adresse email--}}
{{--                </th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($users as $user)--}}
{{--                <tr>--}}
{{--                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">--}}
{{--                        <p class="text-gray-900 whitespace-no-wrap">{{ $user->name }}</p>--}}
{{--                    </td>--}}
{{--                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">--}}
{{--                        <p class="text-gray-900 whitespace-no-wrap">{{ $user->email }}</p>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}

{{--        <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">--}}
{{--            {{ $users->links() }}--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
{{--</x-app-layout>--}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6">
                    <h1 class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200 py-4 block sm:inline-block flex">{{ __('Enregistrer une  offre') }}</h1>
                    <a href="{{route('offre.index')}}" class="no-underline hover:underline text-cyan-600 dark:text-cyan-400">{{ __('<< Retour à la liste') }}</a>
                    @if ($errors->any())
                    <ul class="mt-3 list-none list-inside text-sm text-red-400">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="w-full px-6 py-4 bg-white overflow-hidden">
                        <form method="POST" action="{{ route('offre.update', $offre->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="py-2">
                            <label for="lieu" class="block font-medium text-sm text-gray-700{{$errors->has('lieu') ? ' text-red-400' : ''}}">{{ __('Lieu') }}</label>
                            <input id="lieu" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->has('lieu') ? ' border-red-400' : ''}}" type="text" name="lieu" value="{{ old('lieu', $offre->lieu) }}" />
                        </div>
                        <div class="py-2">
                            <label for="temps" class="block font-medium text-sm text-gray-700{{$errors->has('temps') ? ' text-red-400' : ''}}">{{ __('Temps') }}</label>
                            <select required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->has('temps') ? ' border-red-400' : ''}}"  name="temps" value="{{ old('temps', $offre->temps) }}" >
                                <option value="">Selectionnez</option>
                                <option value="Temps Plein">Temps Plein</option>
                                <option value="Temps partiel">Temps partiel</option>
                            </select>
                        </div>
                        <div class="py-2">
                            <label for="salaire" class="block font-medium text-sm text-gray-700{{$errors->has('salaire') ? ' text-red-400' : ''}}">{{ __('Salaire') }}</label>
                            <input id="salaire" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->has('salaire') ? ' border-red-400' : ''}}" type="text" name="salaire" value="{{ old('salaire', $offre->salaire) }}" />
                        </div>
                        <div class="py-2">
                            <label for="secteur_activite_id" class="block font-medium text-sm text-gray-700{{$errors->has('secteur_activite_id') ? ' text-red-400' : ''}}">{{ __('Secteur activite') }}</label>
                            <select required class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->has('secteur_activite_id') ? ' border-red-400' : ''}}" name="secteur_activite_id" value="{{ old('secteur_activite_id', $offre->secteur_activite_id) }}" >
                                <option value="">Selectionnez</option>
                                @forelse ($secteurActivites as $secteurActivite)
                                <option value="{{ $secteurActivite->id }}">{{ $secteurActivite->nom }}</option>
                                @empty
                                ----
                                @endforelse
                            </select>
                            {{-- <input id="secteur_activite_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->has('secteur_activite_id') ? ' border-red-400' : ''}}" type="text" name="secteur_activite_id" value="{{ old('secteur_activite_id') }}" /> --}}
                        </div>
                        <div class="py-2">
                            <label for="titre" class="block font-medium text-sm text-gray-700{{$errors->has('titre') ? ' text-red-400' : ''}}">{{ __('Titre') }}</label>
                            <input id="titre" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->has('titre') ? ' border-red-400' : ''}}" type="text" name="titre" value="{{ old('titre' , $offre->titre) }}" />
                        </div>
                        <div class="py-2">
                            <label for="description" class="block font-medium text-sm text-gray-700{{$errors->has('description') ? ' text-red-400' : ''}}">{{ __('Description') }}</label>
                            <textarea id="description" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->has('description') ? ' border-red-400' : ''}}" type="text" name="description" value="{{ old('description', $offre->description) }}" >{{ old('description', $offre->description) }}</textarea>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type='submit' class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                                {{ __('Enregistrer') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>

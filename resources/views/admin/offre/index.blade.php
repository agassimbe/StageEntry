<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col mt-8">
                        @can('offre create')
                        <div class="d-print-none with-border mb-8">
                            <a href="{{ route('offre.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('Ajouter une Offre') }}</a>
                        </div>
                        @endcan
                        <div class="py-2">
                            @if(session()->has('message'))
                            <div class="mb-8 text-green-400 font-bold">
                                {{ session()->get('message') }}
                            </div>
                            @endif
                            <div class="min-w-full border-b border-gray-200 shadow">
                                <form method="GET" action="{{ route('offre.index') }}">
                                    <div class="py-2 flex">
                                        <div class="overflow-hidden flex pl-4">
                                            <input type="search" name="search" value="{{ request()->input('search') }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Recherche">
                                            <button type='submit' class='ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                                                {{ __('Rechercher') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <table class="border-collapse table-auto w-full text-sm">
                                    <thead>
                                        <tr>
                                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light text-left">
                                                @include('admin.includes.sort-link', ['label' => 'Titre', 'attribute' => 'titre'])
                                            </th>
                                            @canany(['offre edit', 'offre delete'])
                                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light text-left">
                                                {{ __('Actions') }}
                                            </th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-slate-800">
                                        @foreach($offres as $offre)
                                        <tr>
                                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                                <div class="text-sm text-gray-900">
                                                    <a href="{{route('offre.show', $offre->id)}}" class="no-underline hover:underline text-cyan-600 dark:text-cyan-400">{{ $offre->titre }}</a>
                                                </div>
                                            </td>
                                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                                @can('offre edit')
                                                <form action="{{ route('offre.destroy', $offre->id) }}" method="POST">
                                                    <a href="{{route('offre.edit', $offre->id)}}" class="px-4 py-2 text-white mr-4 bg-blue-600">
                                                        {{ __('Modifier') }}
                                                    </a>
                                                    @endcan
                                                    <!-- <a href="{{route('offre.show', $offre->id)}}" class="px-4 py-2 text-white mr-4 bg-blue-600">
                                                        {{ __('Detail') }}
                                                    </a> -->
                                                    @can('offre delete')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="px-4 py-2 text-white bg-red-600">
                                                        {{ __('Supprimer') }}
                                                    </button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="py-8">
                            {{ $offres->appends(request()->query())->links() }}
                                <!-- {{ $offres->links() }} -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
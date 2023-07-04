@extends('layouts.app')
@section('content')
<div class="py-12  mx-64">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="  overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
            <div class="flex justify-center items-center ">
                <form  action="{{ route('task.update', $tasks->id) }}" method="POST" class="w-1/2 p-8 bg-gray-100 rounded-lg">
                    @csrf
                    @method('PUT')
                    <h2 class="text-2xl mb-4">Modifer la categorie</h2>
            
                    <div class="mb-4">
                        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de Categorie</label>
                        <input type="text" value="{{$tasks->nom}}" name="nom" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('name')
                            <span class="text-red-400 font-bold">{{$message}}</span>
                        @enderror

                        <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">description</label>
                        <input type="text" value="{{$tasks->description}}"  name="description" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('description')
                            <span class="text-red-400 font-bold">{{$message}}</span>
                        @enderror

                        <div class="form-check form-switch my-3">
                            <input class="form-check-input" name="terminer" type="checkbox" role="switch"
                                id="flexSwitchCheckDefault" value="1"
                                {{ $tasks->terminer ? 'checked' : '' }}>
                        </div>
                        
                        
                        
                    </div>
                    <button type="submit" class="text-white bg-black focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <div class="flex justify-center items-center ">
        <form action="{{ route('task.store') }}" method="POST" class="w-1/2 p-8 bg-gray-100 rounded-lg mt-60 ml-64"
            enctype="multipart/form-data">
            @csrf
            <h2 class="text-2xl mb-4">Créer un nouveau blog</h2>
            <div class="mb-4">
                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom 
                    </label>
                <input type="text" value="{{ old('nom') }}" name="nom" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description
                </label>
                <input type="text" value="{{ old('description') }}" name="description" id="small-input"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               


                @error('nom')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
                @error('description')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
                
            </div>
            <button
                class="text-white bg-black focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enregistrer</button>
        </form>
    </div>

@endsection

@extends('layouts.app')
@section('title', 'post details')

@section('content')
 
<div class="  py-12 justify-center mx-auto max-w-4xl">
    <div class=" w-[100%] mx-28 justify-center flex-1 py-12"> <!-- Contenu principal -->
        <div class="  justify-center max-w-4xl mx-auto">
            <div class="mx-auto w-9/10">
                <h1 style="font-weight:700" class="px-4 text-bold text-balck font-mono text-4xl">{{ $details->nom }}</h1>
                
                <div class="mt-10">
                    
                    <p class="pt-4 text-gray-500 text-xl text-justify">{{ $details->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
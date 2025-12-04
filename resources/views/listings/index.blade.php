@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4"> Annonces </h1>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">

    @if($listings->isEmpty())
        <p>Aucune annonce disponible.</p>
    @else
        @foreach($listings as $listing)
            <div class="bg-white p-4 rounded shadow">
                <article class="text-blue-500 hover:underline"> 
                    Voir l'annonce 
                </article>
                {{ $listing->title }}
                <p class="text-gray-600 mt-2"> {{ Str::limit($listing->description, 100) }} </p>

            </div>
        @endforeach
    @endif

        {{ $listings->links() }}
       
    </div>
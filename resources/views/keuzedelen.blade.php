@extends('layouts.app')

@section('title', 'Keuzedeel Detail')

@section('content')
    <nav class="mb-8">
        <a href="/dashboard" class="inline-flex items-center text-tcr-green hover:text-tcr-lime transition-all duration-300 group">
            <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Terug naar overzicht
        </a>
    </nav>
    @if(isset($keuzedeel))
        <h1 class="text-3xl font-bold text-tcr-green mb-4">{{ $keuzedeel->naam }}</h1>
        <p class="text-gray-700 mb-6">{{ $keuzedeel->beschrijving }}</p>


    @elseif(isset($keuzedelen))

    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="h-64 gradient-green flex items-center justify-center relative">
                    <div class="absolute inset-0 bg-black/10"></div>
                    <span class="text-8xl text-white/90 font-bold relative z-10">{{ $letter }}</span>
                </div>

                <div class="p-8">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-tcr-green mb-2">{{ $keuzedeel->naam }}</h1>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-tcr-lime/20 text-tcr-green rounded-full text-sm font-medium">Periode {{ $keuzedeel->periode }}</span>
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">Code: {{ $keuzedeel->code }}</span>
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">{{ $bezetting }}/{{ $keuzedeel->max_studenten }} plaatsen</span>
                            </div>
                        </div>
                    </div>

                    <section class="mb-8">
                        <h2 class="text-xl font-bold text-tcr-green mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-tcr-lime" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                            </svg>
                            Beschrijving
                        </h2>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $keuzedeel->beschrijving }}
                        </p>
                    </section>

                    <section class="mb-8">
                        <h2 class="text-xl font-bold text-tcr-green mb-4">Wat ga je leren?</h2>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-tcr-lime mt-1 mr-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">Responsive web design met moderne CSS technieken</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-tcr-lime mt-1 mr-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">JavaScript programmeren en DOM manipulatie</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-tcr-lime mt-1 mr-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">Werken met moderne frameworks en libraries</span>
                            </li>
                        </ul>
                    </section>

                    <div class="bg-green-50 rounded-xl p-6">
                        <h3 class="font-bold text-tcr-green mb-3">Capaciteit</h3>
                        <div class="mb-3">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-600">Bezetting</span>
                                <span class="font-medium text-tcr-green">{{ $bezetting }} van {{ $keuzedeel->max_studenten }} plaatsen</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="gradient-lime h-3 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600">Er zijn nog {{ $beschikbaar }} plaatsen beschikbaar voor dit keuzedeel.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-2xl shadow-xl p-6">
                <h3 class="font-bold text-tcr-green mb-4 text-lg">Details</h3>
                <dl class="space-y-4">
                    @if($keuzedeel->docent)
                    <div>
                        <dt class="text-sm text-gray-500 mb-1">Docent</dt>
                        <dd class="font-medium text-gray-900">{{$keuzedeel-> docent}}</dd>
                    </div>
                    @endif
                    @if($keuzedeel->locatie)
                    <div>
                        <dt class="text-sm text-gray-500 mb-1">Locatie</dt>
                        <dd class="font-medium text-gray-900">{{$keuzedeel-> locatie}}</dd>
                    </div>
                    @endif
                    <div>
                        <dt class="text-sm text-gray-500 mb-1">Periode</dt>
                        <dd class="font-medium text-gray-900">{{$keuzedeel-> periode}}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500 mb-1">Studiepunten</dt>
                        <dd class="font-medium text-gray-900"></dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500 mb-1">Minimum deelnemers</dt>
                        <dd class="font-medium text-gray-900">{{$keuzedeel-> min_studenten}}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500 mb-1">Maximum deelnemers</dt>
                        <dd class="font-medium text-gray-900">{{$keuzedeel-> max_studenten}}</dd>
                    </div>
                </dl>
            </div>

            <div class="gradient-green text-white rounded-2xl shadow-xl p-6">
                <h3 class="font-bold mb-4 text-lg">Direct inschrijven?</h3>
                <p class="text-sm mb-6 text-gray-200">Schrijf je nu in voor dit keuzedeel en start je leertraject.</p>
                <button id="inschrijf-btn" 
                        data-keuzedeel-id="{{ $keuzedeel->id }}" 
                        class="w-full bg-tcr-lime text-tcr-green py-3 rounded-xl font-bold hover:bg-tcr-gold hover:text-white transform hover:scale-105 transition-all duration-300">
                    Inschrijven
                </button>
                <p id="inschrijf-message" class="text-xs mt-4 text-gray-300">Je kunt je inschrijving altijd annuleren voor de startdatum.</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const button = document.getElementById('inschrijf-btn');
            const message = document.getElementById('inschrijf-message');
            
            if (button) {
                button.addEventListener('click', function() {
                    const keuzedeelId = this.getAttribute('data-keuzedeel-id');
                    
                    button.disabled = true;
                    button.textContent = 'Bezig met inschrijven...';
                    
                    fetch('/inschrijven', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            keuzedeel_id: keuzedeelId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            message.textContent = data.message;
                            message.className = 'text-xs mt-4 text-green-300 font-bold';
                            button.textContent = 'Ingeschreven!';
                            button.className = 'w-full bg-green-500 text-white py-3 rounded-xl font-bold cursor-not-allowed';
                        } else {
                            message.textContent = data.message;
                            message.className = 'text-xs mt-4 text-red-300 font-bold';
                            button.disabled = false;
                            button.textContent = 'Inschrijven';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        message.textContent = 'Er is een fout opgetreden. Probeer het opnieuw.';
                        message.className = 'text-xs mt-4 text-red-300 font-bold';
                        button.disabled = false;
                        button.textContent = 'Inschrijven';
                    });
                });
            }
        });
    </script>
@endsection

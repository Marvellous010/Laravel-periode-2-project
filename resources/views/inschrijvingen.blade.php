@extends('layouts.app')

@section('title', 'Mijn Inschrijvingen')

@section('content')
    <nav class="mb-8">
        <a href="/dashboard" class="inline-flex items-center text-tcr-green hover:text-tcr-lime transition-all duration-300 group">
            <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Terug naar overzicht
        </a>
    </nav>

    <h1 class="text-3xl font-bold text-tcr-green mb-6">MIJN INSCHRIJVINGEN</h1>

    <section class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-xl font-bold text-tcr-green mb-4">HUIDIGE INSCHRIJVING</h2>
        @forelse($huidigeInschrijvingen as $inschrijving)
            @php
                $letter = strtoupper(substr($inschrijving->naam ?? 'K', 0, 1));
                $bezetting = $inschrijving->inschrijvingen()->count();
            @endphp
            <div class="flex items-center gap-4 p-4 border border-gray-200 rounded mb-3">
                <div class="w-16 h-16 bg-tcr-green rounded flex items-center justify-center">
                    <span class="text-2xl text-white">{{ $letter }}</span>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-tcr-green">{{ strtoupper($inschrijving->naam) }}</p>
                    <p class="text-gray-600">PERIODE: {{ $inschrijving->periode }} | PLAATSEN: {{ $bezetting }}/{{ $inschrijving->max_studenten }}</p>
                </div>
                <button class="bg-red-500 text-white px-4 py-2 rounded font-semibold hover:bg-red-600 transition-colors">UITSCHRIJVEN</button>
            </div>
        @empty
            <p class="text-gray-500 text-center py-4">Je hebt momenteel geen actieve inschrijvingen.</p>
        @endforelse
    </section>

    <section class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-tcr-green mb-4">GESCHIEDENIS</h2>
        <ul class="space-y-2">
            @forelse($geschiedenis as $keuzedeel)
                @php
                    $jaar = $keuzedeel->pivot->created_at ? $keuzedeel->pivot->created_at->format('Y') : date('Y');
                @endphp
                <li class="p-3 bg-gray-50 rounded flex items-center justify-between">
                    <span>{{ strtoupper($keuzedeel->naam) }} (PERIODE {{ $keuzedeel->periode }}, {{ $jaar }})</span>
                    <div class="flex items-center gap-3">
                        @if($keuzedeel->pivot->cijfer)
                            <span class="text-tcr-green font-bold">CIJFER: {{ number_format($keuzedeel->pivot->cijfer, 1) }}</span>
                        @endif
                        <span class="text-green-600 font-semibold">AFGEROND</span>
                    </div>
                </li>
            @empty
                <li class="p-3 bg-gray-50 rounded text-center text-gray-500">
                    Je hebt nog geen afgeronde keuzedelen.
                </li>
            @endforelse
        </ul>
    </section>
@endsection
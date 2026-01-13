@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-tcr-green mb-3">Student Dashboard</h1>
        <p class="text-gray-600">Beheer je keuzedelen en inschrijvingen</p>
    </div>

    <div class="gradient-green text-white rounded-2xl shadow-xl p-6 mb-10">
        <div class="flex items-center justify-between">
            <div>
               <p class="text-2xl font-bold mb-2">Hallo, {{ auth()->user()->voornaam }}!</p>
               <p class="text-gray-300">Studentnummer: {{ auth()->user()->studentnummer }}</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-300 mb-1">Inschrijvingen status</p>
                <span class="inline-flex items-center px-4 py-2 bg-tcr-lime text-tcr-green rounded-full font-bold">
                    <span class="w-2 h-2 bg-green-600 rounded-full mr-2"></span>
                    OPEN
                </span>
            </div>
        </div>
    </div>

    <h2 class="text-2xl font-bold text-tcr-green mb-6">Beschikbare Keuzedelen</h2><h2 class="text-2xl font-bold text-tcr-green mb-6">Beschikbare Keuzedelen</h2>
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse($keuzedelen as $k)
            @php
                // Later wordt bezetting echt via inschrijvingen geteld. Voor nu 0.
                $bezetting = $k->bezetting ?? 0;
                $max = $k->max_studenten ?? 0;

                $isVol = ($max > 0 && $bezetting >= $max);
                $percentage = ($max > 0) ? min(100, round(($bezetting / $max) * 100)) : 0;

                $letter = strtoupper(substr($k->naam ?? 'K', 0, 1));
            @endphp

            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 {{ $isVol ? 'opacity-60 cursor-not-allowed' : '' }}">
                <div class="h-40 gradient-green flex items-center justify-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-all duration-300"></div>

                    @if($isVol)
                        <span class="absolute top-2 right-2 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">VOL</span>
                    @endif

                    <span class="text-5xl text-white font-bold relative z-10">{{ $letter }}</span>
                </div>

                <div class="p-6">
                    <h3 class="text-xl font-bold text-tcr-green mb-3">{{ $k->naam }}</h3>

                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-gray-500">Periode {{ $k->periode }}</span>
                        <span class="text-sm font-medium {{ $isVol ? 'text-red-600' : 'text-gray-700' }}">
                        {{ $bezetting }}/{{ $max }} plaatsen
                    </span>
                    </div>

                    <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                        <div class="bg-tcr-lime h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                    </div>

                    <a href="{{ route('keuzedeel', $k->id) }}"
                       class="block text-center w-full bg-tcr-lime text-tcr-green py-3 rounded-lg font-bold hover:bg-tcr-gold hover:text-white transition-all duration-300 {{ $isVol ? 'pointer-events-none opacity-60' : '' }}">
                        Meer informatie
                    </a>
                </div>
            </div>

        @empty
            <div class="col-span-full bg-white rounded-2xl shadow p-6 text-center text-gray-600">
                Er zijn nog geen keuzedelen beschikbaar.
            </div>
        @endforelse

        <a href="/keuzedelen" class="group bg-gray-100 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 flex items-center justify-center h-full min-h-[320px] border-2 border-dashed border-gray-300 hover:border-tcr-lime">
            <div class="text-center">
                <span class="text-6xl text-gray-300 group-hover:text-tcr-lime transition-colors">+</span>
                <p class="text-gray-500 group-hover:text-tcr-green mt-4 font-medium">Bekijk alle keuzedelen</p>
            </div>
        </a>

    </section>
@endsection

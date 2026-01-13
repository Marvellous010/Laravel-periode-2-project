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

    <h2 class="text-2xl font-bold text-tcr-green mb-6">Beschikbare Keuzedelen</h2>
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
            <div class="h-40 gradient-green flex items-center justify-center relative overflow-hidden">
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-all duration-300"></div>
                <span class="text-5xl text-white font-bold relative z-10">A</span>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-tcr-green mb-3">Keuzedeel A</h3>
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm text-gray-500">Periode 1</span>
                    <span class="text-sm font-medium text-gray-700">15/30 plaatsen</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                    <div class="bg-tcr-lime h-2 rounded-full" style="width: 50%"></div>
                </div>
                <button class="w-full bg-tcr-lime text-tcr-green py-3 rounded-lg font-bold hover:bg-tcr-gold hover:text-white transition-all duration-300">
                    Meer informatie
                </button>
            </div>
        </div>

        <div class="group bg-white rounded-2xl shadow-lg overflow-hidden opacity-60 cursor-not-allowed">
            <div class="h-40 gradient-gray flex items-center justify-center relative">
                <span class="absolute top-2 right-2 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">VOL</span>
                <span class="text-5xl text-white font-bold">B</span>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-600 mb-3">Keuzedeel B</h3>
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm text-gray-500">Periode 1</span>
                    <span class="text-sm font-medium text-red-600">30/30 plaatsen</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                    <div class="bg-red-500 h-2 rounded-full" style="width: 100%"></div>
                </div>
                <button disabled class="w-full bg-gray-200 text-gray-500 py-3 rounded-lg font-bold cursor-not-allowed">
                    Niet beschikbaar
                </button>
            </div>
        </div>

        <div class="group bg-white rounded-2xl shadow-lg overflow-hidden opacity-60">
            <div class="h-40 gradient-gold flex items-center justify-center relative">
                <span class="absolute top-2 right-2 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">AFGEROND</span>
                <span class="text-5xl text-white font-bold">C</span>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-tcr-gold mb-3">Keuzedeel C</h3>
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm text-gray-500">Periode 2</span>
                    <span class="text-sm font-medium text-green-600">Voltooid</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                    <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                </div>
                <button class="w-full bg-green-100 text-green-700 py-3 rounded-lg font-bold">
                    Bekijk resultaten
                </button>
            </div>
        </div>

        <a href="/keuzedelen" class="group bg-gray-100 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 flex items-center justify-center h-full min-h-[320px] border-2 border-dashed border-gray-300 hover:border-tcr-lime">
            <div class="text-center">
                <span class="text-6xl text-gray-300 group-hover:text-tcr-lime transition-colors">+</span>
                <p class="text-gray-500 group-hover:text-tcr-green mt-4 font-medium">Bekijk alle keuzedelen</p>
            </div>
        </a>
    </section>
@endsection

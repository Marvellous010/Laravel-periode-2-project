@extends('layouts.admin')

@section('title', 'Instellingen')

@section('content')
    <h1 class="text-3xl font-bold text-tcr-green mb-6">INSTELLINGEN</h1>

    <section class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-xl font-bold text-tcr-green mb-4">INSCHRIJVINGEN BEHEER</h2>
        <div class="space-y-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="inschrijvingen_status" value="gesloten" class="w-4 h-4 text-tcr-green">
                <span>INSCHRIJVINGEN GESLOTEN</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="inschrijvingen_status" value="open" class="w-4 h-4 text-tcr-green" checked>
                <span>INSCHRIJVINGEN OPEN</span>
            </label>
        </div>
    </section>

    <section class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-xl font-bold text-tcr-green mb-4">DATA BEHEER</h2>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="{{ route('admin.inschrijvingen.deleteOld') }}" method="POST" onsubmit="return confirm('Weet je zeker dat je alle oude inschrijvingen wilt verwijderen? Dit kan niet ongedaan worden!');">
            @csrf
            @method('DELETE')
            <div class="mb-2">
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded font-semibold hover:bg-red-600 transition-colors">VERWIJDER ALLE OUDE INSCHRIJVINGEN</button>
            </div>
        </form>
        <p class="text-red-500 text-sm">LET OP: DEZE ACTIE KAN NIET ONGEDAAN WORDEN</p>
    </section>

    <section class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-xl font-bold text-tcr-green mb-4">GEBRUIKERS BEHEER</h2>
        <p class="text-gray-600 mb-2">ADMIN GEBRUIKERS:</p>
        <ul class="space-y-2 mb-4">
            <li class="p-3 bg-gray-50 rounded flex justify-between items-center">
                <span>admin@school.nl</span>
                <span class="bg-tcr-lime text-tcr-green px-2 py-1 rounded text-sm">HOOFDBEHEERDER</span>
            </li>
            <li class="p-3 bg-gray-50 rounded flex justify-between items-center">
                <span>docent1@school.nl</span>
                <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded text-sm">BEHEERDER</span>
            </li>
        </ul>
        <button class="text-tcr-green hover:text-tcr-lime font-semibold">+ NIEUWE ADMIN TOEVOEGEN</button>
    </section>

    <section class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-tcr-green mb-4">SYSTEEM INFORMATIE</h2>
        <div class="grid grid-cols-2 gap-4">
            <p class="text-gray-700"><span class="font-semibold">VERSIE:</span> 1.0.0</p>
            <p class="text-gray-700"><span class="font-semibold">LAATSTE UPDATE:</span> 11-12-2025</p>
            <p class="text-gray-700"><span class="font-semibold">DATABASE:</span> <span class="text-green-600">VERBONDEN</span></p>
        </div>
    </section>
@endsection

@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1 class="text-3xl font-bold text-tcr-green mb-6">ADMIN DASHBOARD</h1>

    <section class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-gray-600 mb-2">TOTAAL STUDENTEN</p>
            <p class="text-4xl font-bold text-tcr-green">150</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-gray-600 mb-2">INGESCHREVEN</p>
            <p class="text-4xl font-bold text-tcr-green">120</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-gray-600 mb-2">ACTIEVE KEUZEDELEN</p>
            <p class="text-4xl font-bold text-tcr-green">12</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-gray-600 mb-2">STATUS</p>
            <p class="text-xl font-bold text-tcr-lime">INSCHRIJVINGEN OPEN</p>
        </div>
    </section>

    <section class="bg-white rounded-lg shadow p-6 mb-8">
        <h2 class="text-xl font-bold text-tcr-green mb-4">SNELLE ACTIES</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <button class="bg-tcr-lime text-tcr-green py-3 px-4 rounded font-semibold hover:bg-opacity-90 transition-colors inline-block">
                <a href="{{ route('admin.keuzedelen.create') }}">+ NIEUW KEUZEDEEL TOEVOEGEN</a>
            </button>
            <button class="bg-tcr-green text-white py-3 px-4 rounded font-semibold hover:bg-opacity-90 transition-colors">
                <a href="{{ route('admin.studenten.inlezen') }}">STUDENTEN INLEZEN (CSV)</a>
            </button>
            <button class="bg-tcr-green text-white py-3 px-4 rounded font-semibold hover:bg-opacity-90 transition-colors">INSCHRIJVINGEN OPENEN/SLUITEN</button>
            <button class="bg-tcr-green text-white py-3 px-4 rounded font-semibold hover:bg-opacity-90 transition-colors">EXPORT INSCHRIJVINGEN</button>
        </div>
    </section>

    <section class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-tcr-green mb-4">RECENTE ACTIVITEIT</h2>
        <ul class="space-y-2">
            <li class="p-3 bg-gray-50 rounded border-l-4 border-tcr-lime">STUDENT X INGESCHREVEN VOOR KEUZEDEEL Y (2 MIN GELEDEN)</li>
            <li class="p-3 bg-gray-50 rounded border-l-4 border-tcr-gold">KEUZEDEEL Z BEREIKT MINIMUM (5 MIN GELEDEN)</li>
            <li class="p-3 bg-gray-50 rounded border-l-4 border-blue-500">ADMIN A HEEFT KEUZEDEEL B AANGEPAST (10 MIN GELEDEN)</li>
            <li class="p-3 bg-gray-50 rounded border-l-4 border-red-500">KEUZEDEEL C IS VOL (15 MIN GELEDEN)</li>
        </ul>
    </section>
@endsection

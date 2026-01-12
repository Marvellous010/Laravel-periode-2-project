@extends('layouts.admin')

@section('title', 'Studenten Inlezen')

@section('content')
    <h1 class="text-3xl font-bold text-tcr-green mb-6">STUDENTEN INLEZEN</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <p class="text-gray-700 mb-2">UPLOAD EEN CSV BESTAND MET STUDENTGEGEVENS EN KEUZEDEEL HISTORIE.</p>
        <p class="text-red-500 text-sm">OUDE INSCHRIJVINGEN WORDEN AUTOMATISCH BIJGEWERKT.</p>
    </div>

    <form action="{{ route('admin.studenten.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="bg-white rounded-lg shadow p-8 mb-6 border-2 border-dashed border-gray-300 hover:border-tcr-lime transition-colors">
            <div class="text-6xl text-gray-300 mb-4 text-center">📁</div>
            <p class="text-gray-600 mb-2 text-center">SELECTEER CSV BESTAND</p>
            <p class="text-gray-400 text-sm text-center mb-4">ONDERSTEUNDE FORMATEN: CSV (met ; als scheidingsteken)</p>
            
            <div class="flex justify-center">
                <input type="file" 
                       name="csv_file" 
                       accept=".csv" 
                       required
                       class="block w-full max-w-md text-sm text-gray-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-sm file:font-semibold
                              file:bg-tcr-lime file:text-tcr-green
                              hover:file:bg-tcr-gold hover:file:text-white
                              cursor-pointer">
            </div>
            
            @error('csv_file')
                <p class="text-red-500 text-sm mt-2 text-center">{{ $message }}</p>
            @enderror
        </div>

        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-xl font-bold text-tcr-green mb-4">INSTRUCTIES:</h2>
            <ul class="list-disc list-inside space-y-2 text-gray-700">
                <li>CSV bestand moet een ; (puntkomma) als scheidingsteken gebruiken</li>
                <li>Studentnummer staat in kolom 3</li>
                <li>Naam staat in kolom 4</li>
                <li>Keuzedeel codes staan in de header (regel 5)</li>
                <li>Studenten krijgen automatisch email: [studentnummer]@student.tcr.nl</li>
                <li>Standaard wachtwoord: password123</li>
                <li>Status 'x' of 'pv' = pending, anders = completed</li>
            </ul>
        </div>

        <div>
            <button type="submit" 
                    class="bg-tcr-lime text-tcr-green px-6 py-3 rounded font-semibold hover:bg-tcr-gold hover:text-white transition-colors">
                BESTAND INLEZEN EN VERWERKEN
            </button>
        </div>
    </form>
@endsection
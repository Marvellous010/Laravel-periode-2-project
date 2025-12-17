@extends('layouts.admin')

@section('title', 'Keuzedeel Toevoegen/Bewerken')

@section('content')
    <h1 class="text-3xl font-bold text-tcr-green mb-6">KEUZEDEEL TOEVOEGEN</h1>
    <form method="POST"
          action="{{ route('admin.keuzedelen.store') }}"
          enctype="multipart/form-data"
          class="bg-white rounded-lg shadow p-6">
        @csrf

    {{-- success message --}}
    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-800 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- error message --}}
    @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-800 p-3 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.keuzedelen.store') }}" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">NAAM *</label>
                <input type="text" name="naam" value="{{ old('naam') }}" placeholder="Keuzedeel naam invoeren" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">CODE * (VERPLICHT)</label>
                <input type="text" name="code" value="{{ old('code') }}" placeholder="B.V. 26604K0059" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime">
            </div>

            <div class="md:col-span-2">
                <label class="block text-gray-700 font-semibold mb-2">BESCHRIJVING *</label>
                <textarea name="beschrijving" placeholder="Beschrijving invoeren" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime">{{ old('beschrijving') }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">AFBEELDING</label>
                <input type="file" name="afbeelding" class="w-full border border-gray-300 rounded px-3 py-2 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-tcr-lime file:text-tcr-green file:font-semibold">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">PERIODE *</label>
                <select name="periode" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime">
                    <option value="1" {{ old('periode') == '1' ? 'selected' : '' }}>Periode 1</option>
                    <option value="2" {{ old('periode') == '2' ? 'selected' : '' }}>Periode 2</option>
                    <option value="3" {{ old('periode') == '3' ? 'selected' : '' }}>Periode 3</option>
                    <option value="4" {{ old('periode') == '4' ? 'selected' : '' }}>Periode 4</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">DOCENT</label>
                <input type="text" name="docent" value="{{ old('docent') }}" placeholder="Docent naam" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">LOCATIE</label>
                <input type="text" name="locatie" value="{{ old('locatie') }}" placeholder="Locatie" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">MAX STUDENTEN *</label>
                <input type="number" name="max_studenten" value="{{ old('max_studenten') }}" placeholder="30" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">MIN STUDENTEN *</label>
                <input type="number" name="min_studenten" value="{{ old('min_studenten') }}" placeholder="15" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime">
            </div>

            <div class="md:col-span-2">
                <h3 class="text-gray-700 font-semibold mb-3">OPTIES</h3>
                <div class="space-y-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="herhaalbaar" value="1" class="w-4 h-4 text-tcr-green rounded" {{ old('herhaalbaar') ? 'checked' : '' }}>
                        <span>HERHAALBAAR (MAG MEERDERE KEREN GEVOLGD WORDEN)</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="actief" value="1" class="w-4 h-4 text-tcr-green rounded" {{ old('actief', 1) ? 'checked' : '' }}>
                        <span>ACTIEF (ZICHTBAAR VOOR STUDENTEN)</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex gap-4 mt-6 pt-6 border-t border-gray-200">
            <button type="button" class="bg-gray-200 text-gray-700 px-6 py-2 rounded font-semibold hover:bg-gray-300 transition-colors">ANNULEREN</button>
            <button type="submit" class="bg-tcr-lime text-tcr-green px-6 py-2 rounded font-semibold hover:bg-opacity-90 transition-colors">OPSLAAN</button>
        </div>
    </form>
@endsection

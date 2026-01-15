@extends('layouts.admin')

@section('title', 'Keuzedeel bewerken')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Keuzedeel bewerken</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.keuzedelen.update', $keuzedeel) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Naam</label>
            <input name="naam" value="{{ old('naam', $keuzedeel->naam) }}" class="border rounded w-full px-3 py-2">
        </div>

        <div>
            <label class="block font-semibold">Code</label>
            <input name="code" value="{{ old('code', $keuzedeel->code) }}" class="border rounded w-full px-3 py-2">
        </div>

        <div>
            <label class="block font-semibold">Beschrijving</label>
            <textarea name="beschrijving" class="border rounded w-full px-3 py-2" rows="5">{{ old('beschrijving', $keuzedeel->beschrijving) }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Periode</label>
                <input name="periode" value="{{ old('periode', $keuzedeel->periode) }}" class="border rounded w-full px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold">Locatie</label>
                <input name="locatie" value="{{ old('locatie', $keuzedeel->locatie) }}" class="border rounded w-full px-3 py-2">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Docent</label>
                <input name="docent" value="{{ old('docent', $keuzedeel->docent) }}" class="border rounded w-full px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold">Afbeelding</label>
                <input type="file" name="afbeelding" class="border rounded w-full px-3 py-2">
                @if($keuzedeel->afbeelding)
                    <p class="text-sm text-gray-500 mt-1">Huidig: {{ $keuzedeel->afbeelding }}</p>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Max studenten</label>
                <input type="number" name="max_studenten" value="{{ old('max_studenten', $keuzedeel->max_studenten) }}" class="border rounded w-full px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold">Min studenten</label>
                <input type="number" name="min_studenten" value="{{ old('min_studenten', $keuzedeel->min_studenten) }}" class="border rounded w-full px-3 py-2">
            </div>
        </div>

        <div class="flex gap-6">
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="actief" {{ old('actief', $keuzedeel->actief) ? 'checked' : '' }}>
                <span>Actief</span>
            </label>

            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="herhaalbaar" {{ old('herhaalbaar', $keuzedeel->herhaalbaar) ? 'checked' : '' }}>
                <span>Herhaalbaar</span>
            </label>
        </div>

        <div class="flex gap-3">
            <button class="bg-tcr-lime text-tcr-green px-4 py-2 rounded font-semibold">Opslaan</button>
            <a href="{{ route('admin.keuzedelen.index') }}" class="px-4 py-2 rounded border">Terug</a>
        </div>
    </form>
@endsection

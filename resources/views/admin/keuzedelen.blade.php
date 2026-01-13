@extends('layouts.admin')

@section('title', 'Keuzedelen Beheren')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-tcr-green">KEUZEDELEN BEHEREN</h1>
        <a href="{{ route('admin.keuzedelen.create') }}"
           class="bg-tcr-lime text-tcr-green py-3 px-4 rounded font-semibold">
            + NIEUW KEUZEDEEL TOEVOEGEN
        </a>

    </div>

    <div class="bg-white rounded-lg shadow p-4 mb-6 flex gap-4 items-center">
        <select class="border border-gray-300 rounded px-3 py-2">
            <option>ALLE</option>
            <option>ACTIEF</option>
            <option>INACTIEF</option>
        </select>
        <input type="text" placeholder="Zoeken..." class="border border-gray-300 rounded px-3 py-2 flex-1">
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-tcr-green text-white">
                <tr>
                    <th class="px-4 py-3 text-left">NAAM</th>
                    <th class="px-4 py-3 text-left">CODE</th>
                    <th class="px-4 py-3 text-left">PERIODE</th>
                    <th class="px-4 py-3 text-left">STATUS</th>
                    <th class="px-4 py-3 text-left">PLAATSEN</th>
                    <th class="px-4 py-3 text-left">ACTIES</th>
                </tr>
            </thead>
            <tbody>
            @if($keuzedelen->isEmpty())
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                        Nog geen keuzedelen toegevoegd.
                    </td>
                </tr>
            @else
                @foreach($keuzedelen as $k)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $k->naam }}</td>
                        <td class="px-4 py-3">{{ $k->code }}</td>
                        <td class="px-4 py-3">{{ $k->periode }}</td>

                        <td class="px-4 py-3">
                            @if($k->actief)
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">ACTIEF</span>
                            @else
                                <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-sm">INACTIEF</span>
                            @endif
                        </td>

                        <td class="px-4 py-3">
                            @php
                                $bezetting = $k->bezetting ?? 0;
                            @endphp

                            @if($bezetting >= $k->max_studenten)
                                <span class="text-red-600 font-semibold">{{ $bezetting }}/{{ $k->max_studenten }}</span>
                            @else
                                {{ $bezetting }}/{{ $k->max_studenten }}
                            @endif
                        </td>

                        <td class="px-4 py-3">
                            <button class="text-tcr-green hover:text-tcr-lime mr-2">BEWERKEN</button>
                            <button class="text-red-500 hover:text-red-700">ANNULEREN</button>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>

        </table>
    </div>

    <p class="text-center text-gray-400 mt-4">...</p>
@endsection

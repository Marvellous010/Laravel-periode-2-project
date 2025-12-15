@extends('layouts.admin')

@section('title', 'Keuzedeel Toevoegen/Bewerken')

@section('content')
    <h1>KEUZEDEEL TOEVOEGEN</h1>

    <form method="POST" action="">
        <div>
            <label>NAAM *</label>
            <input type="text" name="naam" placeholder="[KEUZEDEEL NAAM INVOEREN]">
        </div>

        <div>
            <label>CODE * (VERPLICHT)</label>
            <input type="text" name="code" placeholder="B.V. 26604K0059">
        </div>

        <div>
            <label>BESCHRIJVING *</label>
            <textarea name="beschrijving" placeholder="[BESCHRIJVING INVOEREN]"></textarea>
        </div>

        <div>
            <label>AFBEELDING</label>
            <input type="file" name="afbeelding">
            <span>[BESTAND KIEZEN]</span>
        </div>

        <div>
            <label>PERIODE *</label>
            <select name="periode">
                <option>[DROPDOWN: 1, 2, 3, 4]</option>
            </select>
        </div>

        <div>
            <label>DOCENT</label>
            <input type="text" name="docent" placeholder="[DOCENT NAAM]">
        </div>

        <div>
            <label>LOCATIE</label>
            <input type="text" name="locatie" placeholder="[LOCATIE]">
        </div>

        <div>
            <label>MAX STUDENTEN *</label>
            <input type="number" name="max_studenten" placeholder="[30]">
        </div>

        <div>
            <label>MIN STUDENTEN *</label>
            <input type="number" name="min_studenten" placeholder="[15]">
        </div>

        <div>
            <h3>OPTIES</h3>
            <label>
                <input type="checkbox" name="herhaalbaar">
                HERHAALBAAR (MAG MEERDERE KEREN GEVOLGD WORDEN)
            </label>
            <label>
                <input type="checkbox" name="actief">
                ACTIEF (ZICHTBAAR VOOR STUDENTEN)
            </label>
        </div>

        <div>
            <button type="button">ANNULEREN</button>
            <button type="submit">OPSLAAN</button>
        </div>
    </form>
@endsection
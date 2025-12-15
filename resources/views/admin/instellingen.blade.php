@extends('layouts.admin')

@section('title', 'Instellingen')

@section('content')
    <h1>INSTELLINGEN</h1>

    <section>
        <h2>INSCHRIJVINGEN BEHEER</h2>
        <label>
            <input type="radio" name="inschrijvingen_status" value="gesloten">
            INSCHRIJVINGEN GESLOTEN
        </label>
        <label>
            <input type="radio" name="inschrijvingen_status" value="open">
            INSCHRIJVINGEN OPEN
        </label>
    </section>

    <section>
        <h2>DATA BEHEER</h2>
        <div>
            <button>VERWIJDER ALLE OUDE INSCHRIJVINGEN</button>
        </div>
        <p>LET OP: DEZE ACTIE KAN NIET ONGEDAAN WORDEN</p>
    </section>

    <section>
        <h2>GEBRUIKERS BEHEER</h2>
        <p>ADMIN GEBRUIKERS:</p>
        <ul>
            <li>- admin@school.nl (HOOFDBEHEERDER)</li>
            <li>- docent1@school.nl (BEHEERDER)</li>
        </ul>
        <p>[+ NIEUWE ADMIN TOEVOEGEN]</p>
    </section>

    <section>
        <h2>SYSTEEM INFORMATIE</h2>
        <p>VERSIE: 1.0.0</p>
        <p>LAATSTE UPDATE: 11-12-2025</p>
        <p>DATABASE: VERBONDEN</p>
    </section>
@endsection

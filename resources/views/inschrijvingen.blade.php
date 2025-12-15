@extends('layouts.app')

@section('title', 'Mijn Inschrijvingen')

@section('content')
    <h1>MIJN INSCHRIJVINGEN</h1>

    <section>
        <h2>HUIDIGE INSCHRIJVING</h2>
        <div>
            <div>
                <p>X</p>
            </div>
            <div>
                <p>KEUZEDEEL A</p>
                <p>PERIODE: 1 | PLAATSEN: 15/30</p>
            </div>
            <button>UITSCHRIJVEN</button>
        </div>
    </section>

    <section>
        <h2>GESCHIEDENIS</h2>
        <ul>
            <li>KEUZEDEEL X (PERIODE 1, 2024) - AFGEROND</li>
            <li>KEUZEDEEL Y (PERIODE 2, 2024) - AFGEROND</li>
            <li>KEUZEDEEL Z (PERIODE 3, 2024) - AFGEROND</li>
        </ul>
    </section>
@endsection
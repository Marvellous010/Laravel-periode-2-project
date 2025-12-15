@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>ADMIN DASHBOARD</h1>

    <section>
        <div>
            <p>TOTAAL STUDENTEN</p>
            <p>150</p>
        </div>
        <div>
            <p>INGESCHREVEN</p>
            <p>120</p>
        </div>
        <div>
            <p>ACTIEVE KEUZEDELEN</p>
            <p>12</p>
        </div>
        <div>
            <p>INSCHRIJVINGEN OPEN</p>
        </div>
    </section>

    <section>
        <h2>SNELLE ACTIES</h2>
        <div>
            <button>+ NIEUW KEUZEDEEL TOEVOEGEN</button>
            <button>STUDENTEN INLEZEN (CSV)</button>
        </div>
        <div>
            <button>INSCHRIJVINGEN OPENEN/SLUITEN</button>
            <button>EXPORT INSCHRIJVINGEN</button>
        </div>
    </section>

    <section>
        <h2>RECENTE ACTIVITEIT</h2>
        <ul>
            <li>STUDENT X INGESCHREVEN VOOR KEUZEDEEL Y (2 MIN GELEDEN)</li>
            <li>KEUZEDEEL Z BEREIKT MINIMUM (5 MIN GELEDEN)</li>
            <li>ADMIN A HEEFT KEUZEDEEL B AANGEPAST (10 MIN GELEDEN)</li>
            <li>KEUZEDEEL C IS VOL (15 MIN GELEDEN)</li>
        </ul>
    </section>
@endsection
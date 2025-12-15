@extends('layouts.admin')

@section('title', 'Studenten Inlezen')

@section('content')
    <h1>STUDENTEN INLEZEN</h1>

    <p>UPLOAD EEN OF MEERDERE CSV BESTANDEN MET STUDENTGEGEVENS EN KEUZEDEEL HISTORIE.</p>
    <p>OUDE INSCHRIJVINGEN WORDEN AUTOMATISCH VERWIJDERD.</p>

    <div>
        <p>X</p>
        <p>SLEEP BESTANDEN HIERHEEN OF KLIK OM TE UPLOADEN</p>
        <p>ONDERSTEUNDE FORMATEN: CSV</p>
    </div>

    <section>
        <h2>GESELECTEERDE BESTANDEN:</h2>
        <ul>
            <li>- SD2A_KEUZEDELEN.CSV [VERWIJDEREN]</li>
            <li>- SD2B_KEUZEDELEN.CSV [VERWIJDEREN]</li>
            <li>- SD2C_KEUZEDELEN.CSV [VERWIJDEREN]</li>
        </ul>
    </section>

    <div>
        <button>BESTANDEN INLEZEN EN VERWERKEN</button>
    </div>
@endsection
@extends('layouts.admin')

@section('title', 'Keuzedelen Beheren')

@section('content')
    <h1>KEUZEDELEN BEHEREN</h1>

    <div>
        <button>+ NIEUW KEUZEDEEL</button>
    </div>

    <div>
        <p>[FILTER: ALLE / ACTIEF / INACTIEF] [ZOEKEN...]</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>NAAM</th>
                <th>CODE</th>
                <th>PERIODE</th>
                <th>STATUS</th>
                <th>PLAATSEN</th>
                <th>ACTIES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Keuzedeel A</td>
                <td>26604K0059</td>
                <td>1</td>
                <td>ACTIEF</td>
                <td>15/30</td>
                <td>[BEWERKEN] [ANNUIT]</td>
            </tr>
            <tr>
                <td>Keuzedeel B</td>
                <td>26604K0060</td>
                <td>1</td>
                <td>ACTIEF</td>
                <td>30/30</td>
                <td>[BEWERKEN] [ANNUIT]</td>
            </tr>
            <tr>
                <td>Keuzedeel C</td>
                <td>26604K0061</td>
                <td>2</td>
                <td>INACTIEF</td>
                <td>0/30</td>
                <td>[BEWERKEN] [ANNUIT]</td>
            </tr>
        </tbody>
    </table>

    <p>...</p>
@endsection

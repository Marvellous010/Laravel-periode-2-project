<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Keuzedeel Systeem')</title>
</head>
<body>
    <header>
        <nav>
            <span>LOGO</span> |
            <a href="#">KEUZEDELEN</a> |
            <a href="#">MIJN INSCHRIJVINGEN</a> |
            <a href="#">UITLOGGEN</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>

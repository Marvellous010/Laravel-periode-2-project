<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Keuzedeel Systeem')</title>
</head>
<body>
    <header>
        <nav>
            <span>LOGO</span> |
            <a href="#">KEUZEDELEN BEHEREN</a> |
            <a href="#">INSCHRIJVINGEN</a> |
            <a href="#">STUDENTEN INLEZEN</a> |
            <a href="#">INSTELLINGEN</a> |
            <a href="#">UITLOGGEN</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>

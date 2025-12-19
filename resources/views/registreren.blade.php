<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren - Techniek College Rotterdam</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'tcr-green': '#003d2b',
                        'tcr-dark': '#1a3a2f',
                        'tcr-lime': '#d4e600',
                        'tcr-gold': '#f39200',
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-green {
            background: linear-gradient(to bottom right, #003d2b, #1a3a2f);
        }
        .gradient-lime {
            background: linear-gradient(to bottom right, #d4e600, #f39200);
        }
        .bg-pattern {
            background-color: #003d2b;
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(212, 230, 0, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(243, 146, 0, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.03) 0%, transparent 70%);
        }
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>
<body class="bg-pattern min-h-screen font-sans">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-tcr-lime/10 rounded-full blur-3xl floating"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-tcr-gold/10 rounded-full blur-3xl floating" style="animation-delay: -3s;"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-white/5 rounded-full blur-2xl"></div>
    </div>
    <div class="relative min-h-screen flex">
        <!-- Linker helft - Informatie -->
        <div class="hidden lg:flex lg:w-1/2 flex-col justify-center p-12 text-white">
            <div class="max-w-lg">
                <div class="flex items-center space-x-3 mb-8">
                    <img src="/images/techniek-college-rotterdam.webp" alt="TCR Logo" class="h-12 w-auto rounded-lg shadow-lg">
                </div>
                <h1 class="text-4xl font-bold mb-6">Word lid van ons platform</h1>
                <p class="text-xl text-gray-200 mb-8">
                    Maak een account aan om toegang te krijgen tot het Keuzedeel Systeem van Techniek College Rotterdam.
                </p>
                <ul class="space-y-4 text-gray-200">
                    <li class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-tcr-lime" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Gratis registratie</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-tcr-lime" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Direct toegang tot keuzedelen</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-tcr-lime" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Beheer je inschrijvingen</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Rechter helft - Registreer formulier -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
            <div class="bg-white rounded-2xl shadow-2xl p-6 w-full max-w-md">
                <div class="text-center mb-4">
                    <div class="flex justify-center mb-4 lg:hidden">
                        <img src="/images/techniek-college-rotterdam.webp" alt="TCR Logo" class="h-12 w-auto rounded-lg shadow-lg">
                    </div>
                    <h2 class="text-3xl font-bold text-tcr-green mb-2">Registreren</h2>
                    <p class="text-gray-600">Maak een nieuw account aan</p>
                </div>

               <form method="POST" action="/registreren" class="space-y-3">
    @csrf

    @if($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded-xl mb-4">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">Voornaam</label>
                            <input type="text" name="voornaam" placeholder="Jan" 
                                   class="w-full border-2 border-gray-200 rounded-lg py-2 px-3 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime/20 transition-all duration-300">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">Achternaam</label>
                            <input type="text" name="achternaam" placeholder="de Vries" 
                                   class="w-full border-2 border-gray-200 rounded-lg py-2 px-3 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime/20 transition-all duration-300">
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">E-mailadres</label>
                        <input type="email" name="email" placeholder="Jan@gmail.com" 
                               class="w-full border-2 border-gray-200 rounded-lg py-2 px-3 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime/20 transition-all duration-300">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">Studentnummer</label>
                       <input type="text" name="studentnummer" placeholder="90259567" 
                               class="w-full border-2 border-gray-200 rounded-lg py-2 px-3 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime/20 transition-all duration-300">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">Wachtwoord</label>
                        <input type="password" name="password" placeholder="••••••••" 
                               class="w-full border-2 border-gray-200 rounded-lg py-2 px-3 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime/20 transition-all duration-300">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">Bevestig wachtwoord</label>
                        <input type="password" name="password_confirmation" placeholder="••••••••" 
                               class="w-full border-2 border-gray-200 rounded-lg py-2 px-3 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime/20 transition-all duration-300">
                    </div>

                    <div class="flex items-start">
                        <input type="checkbox" name="terms" id="terms" required class="w-4 h-4 mt-1 text-tcr-lime border-gray-300 rounded focus:ring-tcr-lime">
                        <label for="terms" class="ml-2 text-sm text-gray-600">
                            Ik ga akkoord met de <a href="#" class="text-tcr-green hover:text-tcr-gold font-medium">algemene voorwaarden</a> en het <a href="#" class="text-tcr-green hover:text-tcr-gold font-medium">privacybeleid</a>
                        </label>
                    </div>

                    <div>
                        <button type="submit" class="w-full gradient-lime text-tcr-green py-3 px-6 rounded-lg font-bold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300">
                            Account aanmaken
                        </button>
                    </div>
                </form>

                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-500">Heb je al een account? <a href="/login" class="text-tcr-green font-semibold hover:text-tcr-gold transition-colors">Inloggen</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

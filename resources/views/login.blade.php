<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Techniek College Rotterdam</title>
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
        .gradient-bg {
            background: linear-gradient(135deg, #003d2b 0%, #1a3a2f 100%);
        }
        .gradient-text {
            background: linear-gradient(135deg, #d4e600 0%, #f39200 50%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .bg-school {
            background-image: url('/images/tcr.gebouw.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
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
                    <img src="/images/techniek-college-rotterdam.webp" alt="TCR Logo" class="h-10 w-auto rounded">
                </div>
                <h1 class="text-4xl font-bold mb-6">Keuzedeel Systeem</h1>
                <p class="text-xl text-gray-200 mb-8">
                    Welkom bij het Keuzedeel Systeem van Techniek College Rotterdam. 
                    Hier kun je je inschrijven voor keuzedelen, je voortgang bekijken en je inschrijvingen beheren.
                </p>
                <ul class="space-y-4 text-gray-200">
                    <li class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-tcr-lime" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Bekijk beschikbare keuzedelen</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-tcr-lime" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Schrijf je eenvoudig in</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-tcr-lime" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Volg je voortgang</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Rechter helft - Login formulier -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
            <div class="bg-white rounded-2xl shadow-2xl p-6 w-full max-w-md">
              <div class="text-center mb-4">
    <div class="flex justify-center mb-4 lg:hidden">
        <img src="/images/techniek-college-rotterdam.webp" alt="TCR Logo" class="h-12 w-auto rounded-lg shadow-lg">
    </div>
    <h2 class="text-3xl font-bold text-tcr-green mb-2">Inloggen</h2>
    <p class="text-gray-600">Log in op je account</p>
</div>

               <form method="POST" action="/login" class="space-y-4">
    @csrf
                    <div class="relative">
                        <button type="button" disabled class="w-full gradient-green text-white py-4 px-6 rounded-xl font-semibold opacity-60 cursor-not-allowed flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M3 3h8v8H3V3zm10 0h8v8h-8V3zM3 13h8v8H3v-8zm10 0h8v8h-8v-8z"/></svg>
                            Login met Microsoft
                        </button>
                        <p class="text-xs text-center text-gray-500 mt-2">Binnenkort beschikbaar</p>
                    </div>

                    <div class="relative py-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-gray-500">Of log in met je account</span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">E-mailadres</label>
                        <input type="email" name="email" placeholder="Jan@gmail.com" 
                               class="w-full border-2 border-gray-200 rounded-lg py-2 px-3 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime/20 transition-all duration-300">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">Wachtwoord</label>
                        <input type="password" name="password" placeholder="••••••••" 
                               class="w-full border-2 border-gray-200 rounded-lg py-2 px-3 focus:outline-none focus:border-tcr-lime focus:ring-2 focus:ring-tcr-lime/20 transition-all duration-300">
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" class="w-4 h-4 text-tcr-lime border-gray-300 rounded focus:ring-tcr-lime">
                            <span class="ml-2 text-gray-600">Onthoud mij</span>
                        </label>
                        <a href="/wachtwoord-vergeten" class="text-tcr-green hover:text-tcr-gold transition-colors font-medium">Wachtwoord vergeten?</a>
                    </div>

                    <div>
                        <button type="submit" class="w-full gradient-lime text-tcr-green py-4 px-6 rounded-xl font-bold hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300">
                            Inloggen
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-500">Nog geen account? <a href="/registreren" class="text-tcr-green font-semibold hover:text-tcr-gold transition-colors">Registreren</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
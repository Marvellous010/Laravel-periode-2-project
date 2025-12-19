<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Keuzedeel Systeem') - Techniek College Rotterdam</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #003d2b 0%, #1a3a2f 100%);
        }
        .gradient-green {
            background: linear-gradient(to bottom right, #003d2b, #1a3a2f);
        }
        .gradient-lime {
            background: linear-gradient(to bottom right, #d4e600, #f39200);
        }
        .gradient-gray {
            background: linear-gradient(to bottom right, #9ca3af, #6b7280);
        }
        .gradient-gold {
            background: linear-gradient(to bottom right, #f39200, #d97706);
        }
        .shadow-soft {
            box-shadow: 0 10px 40px -15px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen font-sans antialiased">
    <header class="gradient-bg text-white sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto px-6">
            <nav class="flex items-center justify-between h-20">
                <div class="flex items-center space-x-3">
                   <img src="/images/techniek-college-rotterdam.webp" alt="TCR Logo" class="h-10 w-auto rounded">
                    <div>
                        <span class="text-xl font-bold">Techniek College Rotterdam</span>
                        <p class="text-xs text-gray-300">Keuzedeel Systeem</p>
                    </div>
                </div>
                <div class="flex items-center space-x-8">
                    <a href="/dashboard" class="hover:text-tcr-lime transition-all duration-300 font-medium">Dashboard</a>
                    <a href="/keuzedelen" class="hover:text-tcr-lime transition-all duration-300 font-medium">Keuzedelen</a>
                    <a href="/inschrijvingen" class="hover:text-tcr-lime transition-all duration-300 font-medium">Mijn Inschrijvingen</a>
                    <a href="/login" class="bg-tcr-lime text-tcr-green px-6 py-2.5 rounded-lg font-semibold hover:bg-tcr-gold hover:text-white transition-all duration-300 transform hover:scale-105">Uitloggen</a>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12 animate-fade-in">
        @yield('content')
    </main>

    <footer class="bg-tcr-dark text-white mt-20">
        <div class="container mx-auto px-6 py-8">
            <div class="flex justify-between items-center">
                <p class="text-sm text-gray-400">© 2025 Techniek College Rotterdam. Alle rechten voorbehouden.</p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-tcr-lime transition-colors">Privacy</a>
                    <a href="#" class="text-gray-400 hover:text-tcr-lime transition-colors">Contact</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

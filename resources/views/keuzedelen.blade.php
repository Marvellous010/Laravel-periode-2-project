@extends('layouts.app')

@section('title', 'Keuzedeel')

@section('content')
    <nav class="mb-8">
        <a href="/dashboard" class="inline-flex items-center text-tcr-green hover:text-tcr-lime transition-all duration-300 group">
            <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Terug naar overzicht
        </a>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="h-64 gradient-green flex items-center justify-center relative">
                    <div class="absolute inset-0 bg-black/10"></div>
                    <span class="text-8xl text-white/90 font-bold relative z-10">K</span>
                </div>

                <div class="p-8">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-tcr-green mb-2">Keuzedeel</h1>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-tcr-lime/20 text-tcr-green rounded-full text-sm font-medium">Periode 1</span>
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">Code: -</span>
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-medium">0/30 plaatsen</span>
                            </div>
                        </div>
                    </div>

                    <section class="mb-8">
                        <h2 class="text-xl font-bold text-tcr-green mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-tcr-lime" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                            </svg>
                            Beschrijving
                        </h2>
                        <p class="text-gray-700 leading-relaxed">
                            Beschrijving van het keuzedeel.
                        </p>
                    </section>

                    <section class="mb-8">
                        <h2 class="text-xl font-bold text-tcr-green mb-4">Wat ga je leren?</h2>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-tcr-lime mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">Responsive web design met moderne CSS technieken</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-tcr-lime mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">JavaScript programmeren en DOM manipulatie</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-tcr-lime mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">Werken met moderne frameworks en libraries</span>
                            </li>
                        </ul>
                    </section>

                    <div class="bg-green-50 rounded-xl p-6">
                        <h3 class="font-bold text-tcr-green mb-3">Capaciteit</h3>
                        <div class="mb-3">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-600">Bezetting</span>
                                <span class="font-medium text-tcr-green">0 van 30 plaatsen</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="gradient-lime h-3 rounded-full" style="width: 0%"></div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600">Er zijn nog 30 plaatsen beschikbaar voor dit keuzedeel.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-2xl shadow-xl p-6">
                <h3 class="font-bold text-tcr-green mb-4 text-lg">Details</h3>
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm text-gray-500 mb-1">Docent</dt>
                        <dd class="font-medium text-gray-900">Nog niet bekend</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500 mb-1">Locatie</dt>
                        <dd class="font-medium text-gray-900">Nog niet bekend</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500 mb-1">Periode</dt>
                        <dd class="font-medium text-gray-900">Periode 1</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500 mb-1">Minimum deelnemers</dt>
                        <dd class="font-medium text-gray-900">15 studenten</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500 mb-1">Maximum deelnemers</dt>
                        <dd class="font-medium text-gray-900">30 studenten</dd>
                    </div>
                </dl>
            </div>

            <div class="gradient-green text-white rounded-2xl shadow-xl p-6">
                <h3 class="font-bold mb-4 text-lg">Direct inschrijven?</h3>
                <p class="text-sm mb-6 text-gray-200">Schrijf je nu in voor dit keuzedeel en start je leertraject.</p>
                <button id="inschrijf-btn" 
                        data-keuzedeel-id="1" 
                        class="w-full bg-tcr-lime text-tcr-green py-3 rounded-xl font-bold hover:bg-tcr-gold hover:text-white transform hover:scale-105 transition-all duration-300">
                    Inschrijven
                </button>
                <p id="inschrijf-message" class="text-xs mt-4 text-gray-300">Je kunt je inschrijving altijd annuleren voor de startdatum.</p>
            </div>
        </div>
    </div>

    <script>
        class Inschrijving {
            constructor(keuzedeelId, csrfToken) {
                this.keuzedeelId = keuzedeelId;
                this.csrfToken = csrfToken;
                this.apiUrl = '/inschrijven';
                this.button = document.getElementById('inschrijf-btn');
                this.messageEl = document.getElementById('inschrijf-message');
            }

            async schrijfIn() {
                this.setLoading(true);
                
                try {
                    const response = await fetch(this.apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': this.csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ keuzedeel_id: this.keuzedeelId })
                    });
                    
                    const data = await response.json();
                    this.updateUI(response.ok, data.message);
                    return data;
                } catch (error) {
                    console.error('Inschrijving mislukt:', error);
                    this.updateUI(false, 'Er is een fout opgetreden. Probeer het opnieuw.');
                    throw error;
                } finally {
                    this.setLoading(false);
                }
            }

            setLoading(isLoading) {
                if (this.button) {
                    this.button.disabled = isLoading;
                    this.button.textContent = isLoading ? 'Bezig...' : 'Inschrijven';
                }
            }

            updateUI(success, message) {
                if (this.messageEl) {
                    this.messageEl.textContent = message;
                    this.messageEl.classList.remove('text-gray-300', 'text-green-300', 'text-red-300');
                    this.messageEl.classList.add(success ? 'text-green-300' : 'text-red-300');
                }
                
                if (success && this.button) {
                    this.button.textContent = 'Ingeschreven ';
                    this.button.disabled = true;
                    this.button.classList.remove('bg-tcr-lime', 'hover:bg-tcr-gold');
                    this.button.classList.add('bg-gray-400', 'cursor-not-allowed');
                }
            }
        }

        document.getElementById('inschrijf-btn').addEventListener('click', async (e) => {
            const keuzedeelId = e.target.dataset.keuzedeelId;
            const inschrijving = new Inschrijving(keuzedeelId, '{{ csrf_token() }}');
            await inschrijving.schrijfIn();
        });
    </script>
@endsection
@extends('layouts.app')

@section('title', 'Mijn Inschrijvingen')

@section('content')
    <nav class="mb-8">
        <a href="/dashboard" class="inline-flex items-center text-tcr-green hover:text-tcr-lime transition-all duration-300 group">
            <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Terug naar overzicht
        </a>
    </nav>

    <h1 class="text-3xl font-bold text-tcr-green mb-6">MIJN INSCHRIJVINGEN</h1>

    <section class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-xl font-bold text-tcr-green mb-4">HUIDIGE INSCHRIJVING</h2>
        @forelse($huidigeInschrijvingen as $inschrijving)
            @php
                $letter = strtoupper(substr($inschrijving->naam ?? 'K', 0, 1));
                $bezetting = $inschrijving->inschrijvingen()->count();
            @endphp
            <div class="flex items-center gap-4 p-4 border border-gray-200 rounded mb-3">
                <div class="w-16 h-16 bg-tcr-green rounded flex items-center justify-center">
                    <span class="text-2xl text-white">{{ $letter }}</span>
                </div>
                <div class="flex-1">
                    <p class="font-semibold text-tcr-green">{{ strtoupper($inschrijving->naam) }}</p>
                    <p class="text-gray-600">PERIODE: {{ $inschrijving->periode }} | PLAATSEN: {{ $bezetting }}/{{ $inschrijving->max_studenten }}</p>
                </div>
                <button onclick="uitschrijven({{ $inschrijving->id }})" class="bg-red-500 text-white px-4 py-2 rounded font-semibold hover:bg-red-600 transition-colors">UITSCHRIJVEN</button>
            </div>
        @empty
            <p class="text-gray-500 text-center py-4">Je hebt momenteel geen actieve inschrijvingen.</p>
        @endforelse
    </section>

    <section class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-tcr-green mb-4">GESCHIEDENIS</h2>
        <ul class="space-y-2">
            @forelse($geschiedenis as $keuzedeel)
                @php
                    $jaar = $keuzedeel->pivot->created_at ? $keuzedeel->pivot->created_at->format('Y') : date('Y');
                @endphp
                <li class="p-3 bg-gray-50 rounded flex items-center justify-between">
                    <span>{{ strtoupper($keuzedeel->naam) }} (PERIODE {{ $keuzedeel->periode }}, {{ $jaar }})</span>
                    <div class="flex items-center gap-3">
                        @if($keuzedeel->pivot->cijfer)
                            <span class="text-tcr-green font-bold">CIJFER: {{ number_format($keuzedeel->pivot->cijfer, 1) }}</span>
                        @endif
                        <span class="text-green-600 font-semibold">AFGEROND</span>
                    </div>
                </li>
            @empty
                <li class="p-3 bg-gray-50 rounded text-center text-gray-500">
                    Je hebt nog geen afgeronde keuzedelen.
                </li>
            @endforelse
        </ul>
    </section>

    
    <div id="confirmModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full mx-4 transform transition-all">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 mb-4">
                    <svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Uitschrijven bevestigen</h3>
                <p class="text-gray-600 mb-6">Weet je zeker dat je je wilt uitschrijven voor dit keuzedeel?</p>
                <div class="flex gap-3">
                    <button onclick="closeModal()" class="flex-1 bg-gray-200 text-gray-700 py-3 rounded-xl font-bold hover:bg-gray-300 transition-colors">
                        Annuleren
                    </button>
                    <button onclick="confirmUitschrijven()" class="flex-1 bg-red-500 text-white py-3 rounded-xl font-bold hover:bg-red-600 transition-colors">
                        Uitschrijven
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="feedbackModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full mx-4 transform transition-all">
            <div class="text-center">
                <div id="feedbackIcon" class="mx-auto flex items-center justify-center h-16 w-16 rounded-full mb-4">
                    
                </div>
                <h3 id="feedbackTitle" class="text-xl font-bold text-gray-900 mb-2"></h3>
                <p id="feedbackMessage" class="text-gray-600 mb-6"></p>
                <button onclick="closeFeedbackModal()" class="w-full bg-tcr-green text-white py-3 rounded-xl font-bold hover:bg-tcr-lime hover:text-tcr-green transition-colors">
                    Sluiten
                </button>
            </div>
        </div>
    </div>

    <script>
        let currentKeuzedeelId = null;

        function uitschrijven(keuzedeelId) {
            currentKeuzedeelId = keuzedeelId;
            document.getElementById('confirmModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('confirmModal').classList.add('hidden');
            currentKeuzedeelId = null;
        }

        function confirmUitschrijven() {
            const keuzedeelId = currentKeuzedeelId;
            closeModal();
            
            fetch(`/inschrijven/${keuzedeelId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                showFeedback(data.success, data.message);
                if (data.success) {
                    setTimeout(() => location.reload(), 1500);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showFeedback(false, 'Er is een fout opgetreden. Probeer het opnieuw.');
            });
        }

        function showFeedback(success, message) {
            const modal = document.getElementById('feedbackModal');
            const icon = document.getElementById('feedbackIcon');
            const title = document.getElementById('feedbackTitle');
            const messageEl = document.getElementById('feedbackMessage');

            if (success) {
                icon.className = 'mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4';
                icon.innerHTML = '<svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                title.textContent = 'Gelukt!';
            } else {
                icon.className = 'mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 mb-4';
                icon.innerHTML = '<svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                title.textContent = 'Fout';
            }

            messageEl.textContent = message;
            modal.classList.remove('hidden');
        }

        function closeFeedbackModal() {
            document.getElementById('feedbackModal').classList.add('hidden');
        }
    </script>
@endsection
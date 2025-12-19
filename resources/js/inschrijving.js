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
            this.button.textContent = 'Ingeschreven ✓';
            this.button.disabled = true;
            this.button.classList.remove('bg-tcr-lime', 'hover:bg-tcr-gold');
            this.button.classList.add('bg-gray-400', 'cursor-not-allowed');
        }
    }
}

export default Inschrijving;
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('healthForm');
    const inputSection = document.getElementById('input-section');
    const resultsDiv = document.getElementById('results');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(form);
        const token = document.querySelector('meta[name="csrf-token"]').content;
        
        try {
            const response = await fetch('/calculate-health', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                },
                body: formData
            });
            
            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.error || 'Erro na requisição');
            }
            
            const data = await response.json();
            displayResults(data);
            
            // Oculta a seção de entrada e mostra os resultados com animação
            inputSection.style.display = 'none';
            resultsDiv.style.display = 'block';
            
        } catch (error) {
            console.error('Erro:', error);
            alert('Erro ao processar o cálculo. Por favor, tente novamente.');
        }
    });

    function displayResults(data) {
        resultsDiv.innerHTML = `
            <div class="results-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Seus Resultados</h4>
                    <button class="btn btn-outline-success" onclick="location.reload()">
                        <i class="bi bi-arrow-repeat me-2"></i>
                        Calcular Novamente
                    </button>
                </div>
                
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body text-center p-4">
                                <div class="icon-wrapper mx-auto mb-3">
                                    <i class="bi bi-graph-up text-success fs-4"></i>
                                </div>
                                <h5 class="card-title">IMC</h5>
                                <h2 class="display-4 mb-2">${data.bmi}</h2>
                                <p class="text-${data.bmiCategory.color}">${data.bmiCategory.category}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body text-center p-4">
                                <div class="icon-wrapper mx-auto mb-3">
                                    <i class="bi bi-droplet text-success fs-4"></i>
                                </div>
                                <h5 class="card-title">Água</h5>
                                <h2 class="display-4 mb-2">${data.waterIntake}L</h2>
                                <p class="text-muted">Consumo diário recomendado</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body text-center p-4">
                                <div class="icon-wrapper mx-auto mb-3">
                                    <i class="bi bi-calculator text-success fs-4"></i>
                                </div>
                                <h5 class="card-title">Calorias</h5>
                                <h2 class="display-4 mb-2">${data.calories}</h2>
                                <p class="text-muted">Necessidade calórica diária</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Recomendações Nutricionais</h5>
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-body text-center p-4">
                                        <h6 class="text-muted mb-3">Proteínas</h6>
                                        <p class="h3 mb-0">${data.macros.protein.min}g - ${data.macros.protein.max}g</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-body text-center p-4">
                                        <h6 class="text-muted mb-3">Carboidratos</h6>
                                        <p class="h3 mb-0">${data.macros.carbs.min}g - ${data.macros.carbs.max}g</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-body text-center p-4">
                                        <h6 class="text-muted mb-3">Gorduras</h6>
                                        <p class="h3 mb-0">${data.macros.fats.min}g - ${data.macros.fats.max}g</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
}); 
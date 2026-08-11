<?php
include __DIR__ . '/inc/header.php';
?>

<main class="simulator-page">
  <section class="simulator-panel">
    <div class="panel-header">
      <h1>Simulador de Campo Elétrico</h1>
      <p>Configure uma ou mais cargas e veja o campo resultante com cálculo detalhado.</p>
    </div>

    <form id="simulatorForm" class="simulator-form">
      <div class="form-group split">
        <div>
          <label for="chargeValue">Valor da carga (Q)</label>
          <input type="number" step="any" id="chargeValue" placeholder="Ex: 5" required>
        </div>
        <div>
          <label for="chargeUnit">Unidade</label>
          <select id="chargeUnit">
            <option value="1">C</option>
            <option value="1e-3">mC</option>
            <option value="1e-6">μC</option>
            <option value="1e-9">nC</option>
          </select>
        </div>
      </div>
      <div class="form-group split">
        <div>
          <label for="chargeSign">Sinal</label>
          <select id="chargeSign">
            <option value="+">Positiva (+)</option>
            <option value="-">Negativa (-)</option>
          </select>
        </div>
        <div>
          <label for="distanceValue">Distância até o ponto</label>
          <input type="number" step="any" id="distanceValue" placeholder="Ex: 0.15" required>
        </div>
      </div>
      <div class="form-group split">
        <div>
          <label for="distanceUnit">Unidade de distância</label>
          <select id="distanceUnit">
            <option value="1">m</option>
            <option value="0.01">cm</option>
            <option value="0.001">mm</option>
          </select>
        </div>
        <div>
          <label for="constantValue">Constante do meio (k)</label>
          <input type="number" step="any" id="constantValue" value="8.99e9" required>
          <button type="button" id="useVacuum" class="btn btn-secondary small">Utilizar constante do vácuo</button>
        </div>
      </div>

      <div class="simulator-actions">
        <button type="button" class="btn btn-primary" id="calculateButton">Calcular Campo Elétrico</button>
        <button type="reset" class="btn btn-secondary" id="clearButton">Limpar</button>
      </div>
    </form>

    <section class="result-section glass-card" id="resultCard">
      <h2>Resultado</h2>
      <div class="result-grid">
        <div>
          <p class="result-label">Campo Elétrico</p>
          <p class="result-value" id="resultValue">-</p>
        </div>
        <div>
          <p class="result-label">Direção</p>
          <p class="result-value">Radial</p>
        </div>
        <div>
          <p class="result-label">Sentido</p>
          <p class="result-value" id="fieldDirection">-</p>
        </div>
      </div>
      <div class="result-details" id="resultDetails"></div>
    </section>
  </section>

  <section class="field-visualization glass-card">
    <h2>Simulação Visual</h2>
    <div class="visual-area" id="visualArea">
      <div class="charge-point" id="chargePoint">+</div>
      <canvas id="fieldCanvas"></canvas>
    </div>
    <p class="visual-note">Linhas de campo mostram o sentido e intensidade do campo elétrico.</p>
  </section>
</main>

<?php
include __DIR__ . '/inc/footer.php';
?>
const pageLoader = document.getElementById('pageLoader');
const themeToggle = document.getElementById('themeToggle');
const backToTop = document.getElementById('backToTop');
const resultCard = document.getElementById('resultCard');
const resultValue = document.getElementById('resultValue');
const fieldDirection = document.getElementById('fieldDirection');
const resultDetails = document.getElementById('resultDetails');
const calculateButton = document.getElementById('calculateButton');
const useVacuum = document.getElementById('useVacuum');
const visualArea = document.getElementById('visualArea');
const chargePoint = document.getElementById('chargePoint');
const fieldCanvas = document.getElementById('fieldCanvas');
const exerciseChecks = document.querySelectorAll('.exercise-check');
const scoreDisplay = document.getElementById('scoreDisplay');

function hideLoader() {
  if (pageLoader) {
    pageLoader.style.opacity = '0';
    setTimeout(() => { pageLoader.style.display = 'none'; }, 400);
  }
}

function formatScientificNotation(value) {
  if (!Number.isFinite(value)) return 'Indefinido';

  const [mantissa, exponent] = value.toExponential(3).split('e');
  const normalizedMantissa = parseFloat(mantissa).toLocaleString('pt-BR', {
    maximumFractionDigits: 3,
    minimumFractionDigits: 0
  });
  const normalizedExponent = Number(exponent);

  return `${normalizedMantissa} × 10^${normalizedExponent}`;
}

window.addEventListener('load', hideLoader);

if (themeToggle) {
  themeToggle.addEventListener('click', () => {
    document.body.classList.toggle('light');
    themeToggle.textContent = document.body.classList.contains('light') ? 'Light' : 'Dark';
  });
}

if (backToTop) {
  backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
}

if (useVacuum) {
  useVacuum.addEventListener('click', () => {
    const constantInput = document.getElementById('constantValue');
    if (constantInput) constantInput.value = 8.99e9;
  });
}

if (calculateButton) {
  calculateButton.addEventListener('click', () => {
    const chargeValue = parseFloat(document.getElementById('chargeValue').value);
    const chargeUnit = parseFloat(document.getElementById('chargeUnit').value);
    const chargeSign = document.getElementById('chargeSign').value;
    const distanceValue = parseFloat(document.getElementById('distanceValue').value);
    const distanceUnit = parseFloat(document.getElementById('distanceUnit').value);
    const kValue = parseFloat(document.getElementById('constantValue').value);

    if (isNaN(chargeValue) || isNaN(distanceValue) || isNaN(kValue)) {
      resultDetails.textContent = 'Preencha todos os campos corretamente.';
      return;
    }
    if (distanceValue <= 0) {
      resultDetails.textContent = 'A distância deve ser maior que zero.';
      return;
    }

    const qSI = chargeValue * chargeUnit;
    const dSI = distanceValue * distanceUnit;
    const eValue = (kValue * Math.abs(qSI)) / (dSI * dSI);
    const formattedE = formatScientificNotation(eValue);
    const direction = chargeSign === '+' ? 'Linhas saem da carga' : 'Linhas entram na carga';
    const signDescription = chargeSign === '+' ? 'saem' : 'entram';

    resultValue.textContent = `${formattedE} N/C`;
    fieldDirection.textContent = chargeSign === '+' ? 'Saindo' : 'Entrando';
    resultDetails.innerHTML = `
      <p><strong>Valor convertido:</strong> ${qSI.toExponential(3)} C</p>
      <p><strong>Distância convertida:</strong> ${dSI.toFixed(4)} m</p>
      <p><strong>Conta:</strong> E = (${kValue} × ${Math.abs(qSI).toExponential(3)}) / ${dSI.toFixed(4)}²</p>
      <p><strong>Direção:</strong> Radial</p>
      <p><strong>Sentido:</strong> ${direction}.</p>
    `;
    drawFieldLines(chargeSign);
  });
}

function drawFieldLines(sign) {
  if (!fieldCanvas) return;
  const ctx = fieldCanvas.getContext('2d');
  const rect = visualArea.getBoundingClientRect();
  fieldCanvas.width = rect.width;
  fieldCanvas.height = rect.height;
  ctx.clearRect(0, 0, fieldCanvas.width, fieldCanvas.height);
  const centerX = fieldCanvas.width / 2;
  const centerY = fieldCanvas.height / 2;

  for (let i = 0; i < 12; i++) {
    const angle = (Math.PI * 2 / 12) * i;
    const radius = 110;
    const startX = centerX + Math.cos(angle) * 24;
    const startY = centerY + Math.sin(angle) * 24;
    const endX = centerX + Math.cos(angle) * radius;
    const endY = centerY + Math.sin(angle) * radius;

    ctx.strokeStyle = 'rgba(77,195,255,0.85)';
    ctx.lineWidth = 2;
    ctx.beginPath();
    ctx.moveTo(startX, startY);
    ctx.lineTo(endX, endY);
    ctx.stroke();
    drawArrow(ctx, startX, startY, endX, endY, sign === '+');
  }
}

function drawArrow(ctx, x1, y1, x2, y2, positive) {
  const angle = Math.atan2(y2 - y1, x2 - x1);
  const arrowLength = 12;
  const arrowAngle = Math.PI / 7;
  const px = positive ? x2 : x1;
  const py = positive ? y2 : y1;
  const dir = positive ? 1 : -1;
  ctx.fillStyle = 'rgba(77,195,255,0.9)';
  ctx.beginPath();
  ctx.moveTo(px, py);
  ctx.lineTo(px - dir * arrowLength * Math.cos(angle - arrowAngle), py - dir * arrowLength * Math.sin(angle - arrowAngle));
  ctx.lineTo(px - dir * arrowLength * Math.cos(angle + arrowAngle), py - dir * arrowLength * Math.sin(angle + arrowAngle));
  ctx.closePath();
  ctx.fill();
}

if (exerciseChecks.length) {
  const results = [false, false, false];
  exerciseChecks.forEach(button => {
    button.addEventListener('click', () => {
      const exercise = button.dataset.exercise;
      let correct = false;
      let message = '';

      if (exercise === '1') {
        const answer = parseFloat(document.getElementById('exercise1').value);
        correct = Math.abs(answer - 337500) < 5000;
        message = correct ? 'Certo! O campo é aproximadamente 3,38 × 10^5 N/C.' : 'Tente novamente. Use Q = 3 μC e d = 0,2 m.';
        results[0] = correct;
      }
      if (exercise === '2') {
        const value = document.getElementById('exercise2').value;
        correct = value === 'entrada';
        message = correct ? 'Correto! O campo aponta para dentro da carga negativa.' : 'Reveja: cargas negativas têm linhas de campo entrando.';
        results[1] = correct;
      }
      if (exercise === '3') {
        const answer = parseFloat(document.getElementById('exercise3').value);
        correct = Math.abs(answer - 3596) < 100;
        message = correct ? 'Muito bem! Cerca de 3,6 × 10^3 N/C.' : 'Confira a fórmula E = kQ/d² com Q = 1 μC e d = 0,5 m.';
        results[2] = correct;
      }

      document.getElementById(`exercise${exercise}Result`).textContent = message;
      const score = results.filter(Boolean).length;
      if (scoreDisplay) scoreDisplay.textContent = `${score} / 3`;
    });
  });
}

window.addEventListener('resize', () => {
  if (fieldCanvas && resultValue.textContent !== '-') {
    const sign = chargePoint ? chargePoint.textContent.trim() : '+';
    drawFieldLines(sign);
  }
});

const links = document.querySelectorAll('.nav-menu a');
links.forEach(link => {
  link.addEventListener('click', event => {
    if (link.hash) {
      event.preventDefault();
      document.querySelector(link.hash)?.scrollIntoView({ behavior: 'smooth' });
    }
  });
});

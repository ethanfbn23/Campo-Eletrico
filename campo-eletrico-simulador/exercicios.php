<?php
include __DIR__ . '/inc/header.php';
?>

<main class="content-page exercises-page">
  <section class="page-intro">
    <h1>Exercícios</h1>
    <p>Resolva problemas práticos e confira a explicação passo a passo.</p>
  </section>

  <section class="exercise-card glass-card">
    <h2>Exercício 1</h2>
    <p>Uma carga de +3 μC está a 20 cm do ponto P. Qual é o campo elétrico em P?</p>
    <label>Resposta (N/C)</label>
    <input type="number" id="exercise1" placeholder="Digite o valor">
    <button class="btn btn-primary exercise-check" data-exercise="1">Verificar</button>
    <div class="exercise-result" id="exercise1Result"></div>
  </section>

  <section class="exercise-card glass-card">
    <h2>Exercício 2</h2>
    <p>Uma carga de -2 μC está a 10 cm do ponto P. Qual o sentido do campo elétrico em P?</p>
    <select id="exercise2">
      <option value="">Selecione</option>
      <option value="entrada">Entrando</option>
      <option value="saida">Saindo</option>
    </select>
    <button class="btn btn-primary exercise-check" data-exercise="2">Verificar</button>
    <div class="exercise-result" id="exercise2Result"></div>
  </section>

  <section class="exercise-card glass-card">
    <h2>Exercício 3</h2>
    <p>Calcule o campo elétrico gerado por +1 μC a 0,5 m do ponto P.</p>
    <label>Resposta (N/C)</label>
    <input type="number" id="exercise3" placeholder="Digite o valor">
    <button class="btn btn-primary exercise-check" data-exercise="3">Verificar</button>
    <div class="exercise-result" id="exercise3Result"></div>
  </section>

  <section class="score-card glass-card">
    <h2>Nota</h2>
    <p id="scoreDisplay">0 / 3</p>
  </section>
</main>

<?php
include __DIR__ . '/inc/footer.php';
?>
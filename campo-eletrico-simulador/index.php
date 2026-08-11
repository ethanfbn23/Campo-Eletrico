<?php
include __DIR__ . '/inc/header.php';
?>

<main>
  <section class="hero" id="home">
    <div class="hero-content">
      <span class="eyebrow">Simulador Educacional</span>
      <h1>Simulador de Campo Elétrico e Cargas Puntiformes</h1>
      <p>Calcule, visualize e entenda o campo elétrico gerado por cargas puntiformes com uma interface moderna e responsiva.</p>
      <div class="hero-actions">
        <a href="simulador.php" class="btn btn-primary">Iniciar Simulação</a>
        <a href="#sobre-hero" class="btn btn-secondary">Como funciona</a>
      </div>
    </div>
    <div class="hero-visual">
      <div class="charge-card glass-card">
        <span class="charge-value">+5 μC</span>
        <div class="charge-icon">⚡</div>
      </div>
    </div>
  </section>

  <section class="cards-section">
    <article class="info-card glass-card">
      <h2>O que é Campo Elétrico</h2>
      <p>É a região ao redor de uma carga elétrica onde outra carga sente força elétrica.</p>
    </article>
    <article class="info-card glass-card">
      <h2>Características</h2>
      <p>Direcional, radiante e depende da magnitude da carga e distância.</p>
    </article>
    <article class="info-card glass-card">
      <h2>Fórmula Principal</h2>
      <p>E = k × |Q| / d²</p>
    </article>
    <article class="info-card glass-card">
      <h2>Abrir Simulador</h2>
      <p>Entre no simulador e calcule o campo elétrico com resultados passo a passo.</p>
      <a href="simulador.php" class="card-link">Simular agora →</a>
    </article>
  </section>

  <section class="benefits" id="sobre-hero">
    <div class="section-header">
      <h2>Benefícios</h2>
      <p>Uma ferramenta didática com visualização gráfica e experiência clara para estudantes de Física.</p>
    </div>
    <div class="benefit-grid">
      <div class="benefit-card glass-card">
        <h3>Interface intuitiva</h3>
        <p>Navegação simples e componentes claros para usar em sala de aula ou estudo individual.</p>
      </div>
      <div class="benefit-card glass-card">
        <h3>100% educacional</h3>
        <p>Foco no aprendizado de conceitos físicos e no passo a passo das contas.</p>
      </div>
      <div class="benefit-card glass-card">
        <h3>Visualização gráfica</h3>
        <p>Veja como as linhas de campo se comportam em torno de cargas positivas e negativas.</p>
      </div>
      <div class="benefit-card glass-card">
        <h3>Exercícios reais</h3>
        <p>Pratique com exercícios que reforçam cálculos e interpretação do campo.</p>
      </div>
    </div>
  </section>
</main>

<?php
include __DIR__ . '/inc/footer.php';
?>
<?php
$activePage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Campo Elétrico - Simulador de Cargas Puntiformes</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="loader" id="pageLoader"><div></div></div>
  <header class="main-header">
    <nav class="navbar container">
      <a href="index.php" class="brand">
        <div class="logo">⚡</div>
        <div>
          <span class="brand-name">Campo Elétrico</span>
          <span class="brand-tag">Simulador</span>
        </div>
      </a>
      <ul class="nav-menu">
        <li><a href="index.php">Início</a></li>
        <li><a href="simulador.php">Simulador</a></li>
        <li><a href="teoria.php">Teoria</a></li>
        <li><a href="exercicios.php">Exercícios</a></li>
        <li><a href="sobre.php">Sobre</a></li>
      </ul>
      <div class="header-actions">
        <button class="theme-toggle" id="themeToggle">Dark</button>
      </div>
    </nav>
  </header>
  <main class="page-wrapper">

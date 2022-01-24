<?php if(isset($_SESSION['identity'])): ?>
  <h4>Hola, <?= $_SESSION['identity']->nombre ?> </h4>
  <h5>Panel de control</h5>
  <p>PERFIL</p>
<?php else: ?>
  <?php header("Location:".base_url."Usuario/login") ?>
<?php endif; ?>

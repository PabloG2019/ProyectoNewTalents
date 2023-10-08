<?php
  $session = session();
  $nombre=$session->get('nombre');
  $perfil=$session->get('perfil_id');
?>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand me-auto barra" href="<?php echo base_url('/principal_ultimo')?>">
        <!-- logo/marca de la empresa-->
        <img id="img-logo" src="<?php echo base_url('assets/img/NewTalents.png') ?>" alt="marca" width="75" height="30" class="img-fluid"/>
       </a> 
    </div>
    <button  id="btn-nav" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon  btn-navbar"></span>
    </button>
    
    <?php if(session()->perfil_id == 1): ?>
      <div class="btn btn-secondary active btnUser btn-sm">
         <a href="" class="" style="color:#fff;">ADMIN:  <?php echo session('nombre');?></a>
      </div>
    <a class="navbar-brand" href="#"></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('/logout');?>" tabindex="-1" aria-disabled="true" style="color:#fff;">Cerrar Sesion</a>
        </li>
      </ul>
    </div> 
    <?php elseif(session()->perfil_id == 2): ?>
         <div class="btn btn-info active btnUser btn-sm">
            <a href="" class="" style="color:#fff;">CLIENTE <?php echo session('nombre');?></a>
        </div>

<!--NAVBAR PARA CLIENTES que pueden comprar-->
<div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="quienes_somos" style="color:#fff;">Quienes Somos</a></li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="catologo" style="color:#fff;">Catalogo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('/logout');?>" tabindex="-1" aria-disabled="true" style="color:#fff;">Cerrar Sesion</a>
        </li>
      </ul>
    </div> 

    <?php else:?>

<!--NAVBAR PARA CLIENTES no loguado-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('quienes_somos')?>" style="color:#fff;">Quienes Somos</a></li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('acerca_de')?>" style="color:#fff;">Acerca de</a></li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('registrarse')?>" style="color:#fff;">Registrarse</a></li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('login')?>" style="color:#fff;">Login</a>
          </li>
      </ul>
    </div> 


      <form class="d-flex" role="buscar">
        <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
        <button id="btn-buscar" class="btn btn-color" type="submit" style="color:#fff;">Buscar</button>
      </form>
      <?php endif;?>
  </div>
</nav>
<!--Fin navegación -->
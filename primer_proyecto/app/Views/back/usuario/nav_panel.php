<div  class="container" id="nav-panel">

    <?php if(session()->perfil_id == 2): ?>
        <div>
            <img class="img-panel" src="<?php echo base_url('assets/img/Cliente.png');?>">
        </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" style="color:#fff;">Editar perfil</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="#" style="color:#fff;">Consultar catalogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="<?php echo base_url('/logout');?>"  style="color:#fff;">Cerrar sesion</a>
                </li>
            </ul>
        <?php elseif(session()->perfil_id == 1): ?>
            <div>
                <img class="img-panel" src="<?php echo base_url('assets/img/Admin.png');?>">
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('/mostrar_usuarios');?>" style="color:#fff;">Mostrar usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color:#fff;">Gestion catalogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="<?php echo base_url('/logout');?>" style="color:#fff;">Cerrar sesion</a>
                </li>
            </ul>
    <?php endif;?>
</div>
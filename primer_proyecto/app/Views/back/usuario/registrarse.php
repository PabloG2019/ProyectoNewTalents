
<!--cards-->
<div class="container">

<div class="container-5 mb-5 mt-5 d-flex justify-content-center">
  <div class="card" style="width:50%">
    <div class="card-header text-center">
      <h2>Registrarse</h2>
    </div>
  <?php $validation = \Config\Services::validation(); ?>
  <form method="post" action="<?php echo base_url('/enviar-form')?>">
  <?=csrf_field();?>
  <?=csrf_field();?>
  <?php if (!empty (session()->getFlashdata('fail'))):?>
  <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
  <?php endif?>
    <?php if (!empty (session()->getFlashdata('success'))):?>
    <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
  <?php endif?>
  <div class="card-body justify-content-center" media="(max-width:768px)">  
  <div class="mb-3">
    <label for="inputname" class="form-label">Nombre</label>
    <input name="nombre" type="text" class="form-control" id="inputname" placeholder="nombre">
    <!-- Error en el campo nombre -->
    <?php if($validation->getError('nombre')) {?>
      <div class="alert añert-danger mt-2">
        <?= $error = $validation->getError('nombre');?>
      </div>
      <?php }?>
  </div>
  <div class="mb-3">
    <label for="inputlastname" class="form-label">Apellido</label>
    <input name="apellido" type="text" class="form-control" id="inputlastname" placeholder="apellido">
      <!-- Error en el campo apellido -->
      <?php if($validation->getError('apellido')) {?>
      <div class="alert añert-danger mt-2">
        <?= $error = $validation->getError('apellido');?>
      </div>
      <?php }?>
  </div>
  <div class="mb-3">
    <label for="inputemail" class="form-label">Email</label>
    <input name="email" type="email" class="form-control" id="inputemail"
    placeholder="email">
      <!-- Error en el campo email -->
      <?php if($validation->getError('email')) {?>
      <div class="alert añert-danger mt-2">
        <?= $error = $validation->getError('email');?>
      </div>
      <?php }?>
  </div>
  <div class="mb-3">
    <label for="inputusername" class="form-label">Usuario</label>
    <input name="usuario" type="text" class="form-control" id="inputusername" placeholder="usuario">
      <!-- Error en el campo usuario -->
      <?php if($validation->getError('usuario')) {?>
      <div class="alert añert-danger mt-2">
        <?= $error = $validation->getError('usuario');?>
      </div>
      <?php }?>
  </div>
  <div class="mb-3">
    <label for="inputpass" class="form-label">Password</label>
    <input name="pass" type="password" class="form-control" id="inputpass" placeholder="password">
      <!-- Error en el campo pass -->
      <?php if($validation->getError('pass')) {?>
      <div class="alert añert-danger mt-2">
        <?= $error = $validation->getError('pass');?>
      </div>
      <?php }?>
  </div>
  <div class="button text-center mr-5">
   <input type="submit" value="Guardar" class="btn btn-success">
   <input type="reset" value="Cancelar" class="btn btn-danger">
  </div>
  <div class="msg text-center">
    <hr>
    <p>Ya tenes una cuenta? Ingresa 
      <Strong>
        <a href="<?php echo base_url('/login');?>"> Aquí</a>
      </Strong> 
    </p>

  </div>
 </div>
</form>
</div>
</div>

</div>
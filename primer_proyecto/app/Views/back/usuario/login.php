<!--cards-->
<div class="container">
   
<div class="container-5 mb-5 mt-5 d-flex justify-content-center">
 <div class="card text-center" style="width:33%">
  <div class="card-header">
    <h2>Login</h2>
  </div>

 <!-- Mensaje de Error -->
 <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-warning">
            <?= session()->getFlashdata('msg')?>
        </div>
        <?php endif;?>
<!-- Inicio del formulario login -->
 <form method="post" action="<?php echo base_url('/enviarlogin')?>">
  <div class="card-body" media="(max-width:768px)">
  <div class="mb-2">
    <label for="inputemail" class="form-label">Email</label>
    <input name="email" type="email" class="form-control" id="inputemail" placeholder="email">
  </div>
  <div class="mb-3">
    <label for="inputpass" class="form-label">Password</label>
    <input name="pass" type="password" class="form-control" id="inputpass" placeholder="password">
  </div>
   <input type="submit" value="Ingresar" class="btn btn-primary">
   <a href="<?php echo base_url('/loginback');?>" class="btn btn-danger">Cancelar</a>
  </div>
 </form>
 <div>
  <hr>
    <p>No tenes una cuenta? Registrate 
      <Strong>
        <a href="<?php echo base_url('/registrarse');?>"> Aquí</a>
      </Strong> 
    </p>

  </div>
</div>
</div>

</div>
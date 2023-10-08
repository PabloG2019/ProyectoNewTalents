
    <div>
        <?php if(session()->perfil_id == 1): ?>
            <div class="">
                <h1 style="color:#fff;"> Bienvenido! ADMINISTRAD@R <?php echo session('nombre');?></h1>
            </div>

            <?php elseif(session()->perfil_id == 2): ?>
            <div class="">
                <h1 style="color:#fff;"> Bienvenido! CLIENTE <?php echo session('nombre');?></h1>
            </div>
             <?php endif;?>
    </div>

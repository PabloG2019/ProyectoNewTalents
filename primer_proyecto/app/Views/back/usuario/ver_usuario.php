<section class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?php echo base_url("/registrarse") ?>" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</a>
        <div class="d-inline-flex">
            <form class="form-inline" role="buscar">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
            </form>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped">        
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['id_usuario'] ?></td>
                        <td><?= $usuario['apellido'] ?></td>
                        <td><?= $usuario['nombre'] ?></td>
                        <td><?= $usuario['usuario'] ?></td>
                        <td><?= $usuario['email'] ?></td>
                        <td>
                        <a href="<?= site_url("/editar_usuario/{$usuario['id_usuario']}") ?>" class="btn btn-warning">
                            <i class="fa fa-pencil-square-o"></i>Editar</a>
                            <a href="<?php echo base_url("/eliminar_usuario/{$usuario['id_usuario']}") ?>" class="btn btn-danger" role="button">
                            <i class="fa fa-trash"></i>Eliminar</a>
                          
                            </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col">
            <ul class="pagination justify-content-end">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <!-- Puedes generar dinámicamente los enlaces de paginación según tu lógica -->
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>




<div class="container mt-5">   
    <!-- Formulario para Crear Usuario -->
    <h2>Crear Usuarios</h2>

    <form class="form-group" action="<?php echo url_for('user/create') ?>" method="post">
        <div class="form-group">
            <label for="formGroupExampleInput">Nombre de usuario:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="username" id="username" required />
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Contraseña:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" id="password" required />
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" >Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required />
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Crear Usuario" />
    </form>

    <!-- Tabla para Listar Usuarios -->
    <h2>Lista de Usuarios</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre de usuario</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user->getId() ?></td>
                <td><?php echo $user->getUsername() ?></td>
                <td><?php echo $user->getEmail() ?></td>
                <td>
                    <a class="btn btn-warning" href="<?php echo url_for('user/edit?id='.$user->getId()) ?>">Editar</a>                |
                    <a class="btn btn-danger" href="<?php echo url_for('user/delete?id='.$user->getId()) ?>" 
                    onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
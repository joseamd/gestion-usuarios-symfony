<div class="container mt-5">   
    <!-- Formulario para Crear Usuario -->
    <h2>Iniciar sesión</h2>
    <form action="<?php echo url_for('user/login') ?>" method="post">
        <?php echo $form->renderHiddenFields() ?>
        <div class="form-group">
            <label>Nombre de usuario:</label>
            <?php echo $form['username']->render(array('class' => 'form-control')) ?>
        </div>
        <div class="form-group">
            <label>Contraseña:</label>
            <?php echo $form['password']->render(array('class' => 'form-control')) ?>
        </div>
        <input class="btn btn-primary" type="submit" value="Iniciar sesión" />     
    </form>
</div>

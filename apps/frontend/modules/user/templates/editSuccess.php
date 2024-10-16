<div class="container mt-5">
    <h2>Editar Usuario</h2>    

<form class="form-group" action="<?php echo url_for('user/edit?id='.$form->getObject()->getId()) ?>" method="post">
        <?php echo $form->renderHiddenFields() ?> <!-- Aquí se renderiza el campo oculto para el ID -->
        <input type="hidden" name="id" value="<?php echo $form->getObject()->getId() ?>"> <!--el ID del usuario se incluye en los datos enviados en la solicitud POST-->

        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Nombre de usuario:</label>
            <div class="col-sm-10">
                <?php echo $form['username']->render(array('class' => 'form-control', 'id' => 'username')) ?>
            </div>
        </div>

        <div class="form-group row">
            <!-- <label for="password" class="col-sm-2 col-form-label">Contraseña:</label> -->
            <div class="col-sm-10">
                <?php echo $form['password']->render(array('class' => 'form-control', 'id' => 'password' , 'type' => 'hidden')) ?>
            </div>            
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <?php echo $form['email']->render(array('class' => 'form-control', 'id' => 'email')) ?>
            </div> 
        </div>        

        <button class="btn btn-primary" type="submit">Guardar Cambios</button>
    </form>

    <a class="btn btn-secondary mt-3" href="<?php echo url_for('user/index') ?>">Volver a la lista de usuarios</a>   
</div>

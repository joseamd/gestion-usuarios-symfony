<?php

/**
 * User form.
 *
 * @package    gestionUsuarios
 * @subpackage form
 * @author     Your Name
 * @version    1.0
 */
class UserForm extends BaseUserForm
{
    public function configure()
    {
        // Definir los widgets
        $this->setWidgets(array(
            'username' => new sfWidgetFormInputText(),
            'password' => new sfWidgetFormInputPassword(),
            'email'    => new sfWidgetFormInputText(),
        ));

        // Definir los validadores
        $this->setValidators(array(
            'username' => new sfValidatorString(array('required' => true)),
            'password' => new sfValidatorString(array('required' => true)),
            'email'    => new sfValidatorEmail(array('required' => true)),
        ));

        // Personalizar los mensajes de error
        $this->validatorSchema->setMessage('required', 'Este campo es obligatorio.');
        $this->validatorSchema['email']->setMessage('invalid', 'Por favor, introduce un email válido.');

        // Configurar los nombres de los campos para el formulario
        $this->widgetSchema->setLabels(array(
            'username' => 'Nombre de usuario',
            'password' => 'Contraseña',
            'email'    => 'Email',
        ));

        // Establecer la configuración para que el campo de contraseña se guarde encriptado
        $this->validatorSchema['password'] = new sfValidatorString(array('required' => false));
        $this->mergePostValidator(new sfValidatorCallback(array(
            'callback' => array($this, 'checkPassword'),
            'arguments' => array('required' => true)
        )));
    }

    public function checkPassword($validator, $values)
    {
        if (empty($values['password'])) {
            unset($values['password']); // Eliminar el campo de contraseña si está vacío
        } else {
            // Aquí podrías agregar lógica para encriptar la contraseña antes de guardarla
            $values['password'] = sha1($values['password']); // Encriptar la contraseña
        }

        return $values;
    }
}

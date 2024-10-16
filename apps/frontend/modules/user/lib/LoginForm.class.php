<?php

class LoginForm extends sfForm
{
    public function configure()
    {
        // Configurar los campos del formulario
        $this->setWidgets(array(
            'username' => new sfWidgetFormInputText(),
            'password' => new sfWidgetFormInputPassword(),
        ));

        $this->setValidators(array(
            'username' => new sfValidatorString(array('required' => true)),
            'password' => new sfValidatorString(array('required' => true)),
        ));

        // Configurar el nombre del formulario
        $this->widgetSchema->setNameFormat('login[%s]');
    }
}


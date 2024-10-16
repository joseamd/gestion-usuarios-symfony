<?php

/**
 * user actions.
 *
 * @package    gestion_usuarios
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      // Redirigir a la página de login si el usuario no está autenticado
      if (!$this->getUser()->isAuthenticated()) {
          $this->redirect('user/login');
      }
      else {
        // Obtener todos los usuarios
        $this->users = Doctrine_Core::getTable('User')->findAll();
      }        
  }
  

  public function executeCreate(sfWebRequest $request)
  {
    {
        // Crear un nuevo usuario a partir del formulario
        $user = new User();
        $user->setUsername($request->getParameter('username'));
        //$user->setPassword($request->getParameter('password')); // Aquí podrías aplicar algún hash
        $user->setPassword(md5($request->getParameter('password')));
        $user->setEmail($request->getParameter('email'));
        $user->save();
  
        // Redireccionar de vuelta a la página de inicio
        $this->redirect('user/index');
    }    
}


  public function executeEdit(sfWebRequest $request)
  {
    // Redirigir a la página de login si el usuario no está autenticado
    if (!$this->getUser()->isAuthenticated()) {
        $this->redirect('user/login');
    }
    else {
        // Obtener el usuario por ID
      $id = $request->getParameter('id'); // Obtenemos el ID de los parámetros del request
      $this->forward404Unless($user = Doctrine_Core::getTable('User')->find(array($id)), sprintf('El usuario con id %s no existe.', $id));
  
      // Crear el formulario
      $this->form = new UserForm($user);
  
      // Verificar si se envía el formulario
      if ($request->isMethod('post')) {
          // Vincular el formulario a los datos del request
          $this->form->bind($request->getParameter($this->form->getName()));         

          // Verificar si el formulario es válido
          if ($this->form->isValid()) {
              // Guardar el usuario
              $this->form->save();
              $this->redirect('user/index'); // Redirigir a la lista de usuarios
          }
          else
          {
              // Mensaje de error si el formulario no es válido
              
              $this->getUser()->setFlash('error', 'El formulario no es válido.');
          }
      }

    }
      
  }
   

  public function executeDelete(sfWebRequest $request)
  {
      $this->forward404Unless($user = Doctrine_Core::getTable('User')->find(array($request->getParameter('id'))), sprintf('El usuario con id %s no existe.', $request->getParameter('id')));
      $user->delete();

      $this->redirect('user/index');
  }



  public function executeLogin(sfWebRequest $request)
  {
      $this->form = new LoginForm();
  
      if ($request->isMethod('post')) {
          $this->form->bind($request->getParameter('login'));
  
          if ($this->form->isValid()) {
              $values = $this->form->getValues(); // Obtener los valores del formulario
  
              // Comprobar si el usuario existe
              $user = Doctrine_Core::getTable('User')->findOneByUsername($values['username']);
              //var_dump($values); // Para ver qué datos se están enviando desde el formulario
              //var_dump($user);   // Para ver qué usuario se ha recuperado de la base de datos
  
              if ($user) {
                  // Comparar la contraseña ingresada con la almacenada
                  if ($user->getPassword() == md5($values['password'])) {
                      $this->getUser()->setAuthenticated(true);
                      $this->getUser()->setAttribute('user_id', $user->getId());
                      $this->redirect('user/index');
                  } else {
                      $this->getUser()->setFlash('error', 'Credenciales incorrectas');
                  }
              } else {
                  $this->getUser()->setFlash('error', 'El usuario no existe.');
              }
          } else {
              // Mostrar errores del formulario si la validación falla
              $this->getUser()->setFlash('error', 'Por favor, completa todos los campos requeridos.');
          }
      }
  
      // Renderizar el formulario (si no se redirige)
      $this->setTemplate('login'); // Asegúrate de tener un template de login definido
  }
  

    public function executeLogout(sfWebRequest $request)
    {       
        $this->getUser()->setAuthenticated(false);
        $this->getUser()->clearCredentials();
        $this->getUser()->getAttributeHolder()->clear();
        $this->redirect('user/login');
    }


}

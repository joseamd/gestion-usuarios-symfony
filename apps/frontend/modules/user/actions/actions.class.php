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
    // Obtener todos los usuarios
    $this->users = Doctrine_Core::getTable('User')->findAll();
}

  public function executeCreate(sfWebRequest $request)
  {
      // Crear un nuevo usuario a partir del formulario
      $user = new User();
      $user->setUsername($request->getParameter('username'));
      $user->setPassword($request->getParameter('password')); // Aquí podrías aplicar algún hash
      $user->setEmail($request->getParameter('email'));
      $user->save();

      // Redireccionar de vuelta a la página de inicio
      $this->redirect('user/index');
  }


  public function executeEdit(sfWebRequest $request)
  {
      // Obtener el usuario por ID
      $id = $request->getParameter('id'); // Obtenemos el ID de los parámetros del request
      $this->forward404Unless($user = Doctrine_Core::getTable('User')->find(array($id)), sprintf('El usuario con id %s no existe.', $id));
  
      // Crear el formulario
      $this->form = new UserForm($user);
  
      // Verificar si se envía el formulario
      if ($request->isMethod('post'))
      {
          // Vincular el formulario a los datos del request
          $this->form->bind($request->getParameter($this->form->getName()));
  
          // Verificar si el formulario es válido
          if ($this->form->isValid())
          {
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
   

  public function executeDelete(sfWebRequest $request)
  {
      $this->forward404Unless($user = Doctrine_Core::getTable('User')->find(array($request->getParameter('id'))), sprintf('El usuario con id %s no existe.', $request->getParameter('id')));
      $user->delete();

      $this->redirect('user/index');
  }

}

<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/UserDAO.php';
require_once __DIR__ . '/../dao/InzendingenDAO.php';


class UsersController extends Controller {

  private $userDAO;

  function __construct() {
    $this->userDAO = new UserDAO();
    $this->InzendingenDAO = new InzendingenDAO();
  }

  public function index() {
  }

  public function admin() {
    if (!empty($_GET['action'])) {
      if ($_GET['action'] == 'delete' && !empty($_GET['id'])) {
        $this->handleDeleteInzending();
      }
      if ($_GET['action'] == 'approve' && !empty($_GET['id'])) {
          $this->_handleApprove();
        }
      
      if ($_GET['action'] == 'update' && !empty($_GET['id'])) {
        $this->_handleUpdatePoints();
        }
    }
      
    $inzendingen = $this->InzendingenDAO->selectAllNotApproved();
    $this->set('inzendingen', $inzendingen);
  }

  private function handleDeleteInzending() {
    $this->InzendingenDAO->delete($_GET['id']);
    $_SESSION['info'] = 'De inzending werd verwijderd!';
    header('Location: index.php?page=admin');
    exit();
  }

  private function _handleApprove() {
    $this->InzendingenDAO->update($_GET['id']);
    $_SESSION['info'] = 'De inzending werd goedgekeurd!';
    header('Location: index.php?page=admin');
    exit();
  }

  private function _handleUpdatePoints() {
    $data = array('extraPoints' => $_POST['extraPunten']);
    $this->InzendingenDAO->updatePoints($_GET['id'], $data);
    $_SESSION['info'] = 'De extra punten zijn toegevoegd!';
    header('Location: index.php?page=admin');
    exit();
  }

  public function login() {
    if(!empty($_POST)) {
      if(!empty($_POST['email']) && !empty($_POST['password'])) {
        $existing = $this->userDAO->selectByEmail($_POST['email']);
        if(!empty($existing)) {
          if (password_verify($_POST['password'], $existing['password'])) {
            $_SESSION['user'] = $existing;
          } else {
            $_SESSION['error'] = 'Unknown username / password';
          }
        } else {
          $_SESSION['error'] = 'Unknown username / password';
        }
      } else {
        $_SESSION['error'] = 'Unknown username / password';
      }
    }
    header('Location: index.php?page=admin');
    exit();
  }

  public function logout() {
    if(!empty($_SESSION['user'])) {
      unset($_SESSION['user']);
    }
    $_SESSION['info'] = 'Logged Out';
    header('Location: index.php');
    exit();
  }

  public function register() {
    if(!empty($_POST)) {
      $this->handleRegister();
    }
  }

  private function handleRegister() {
    if(empty($_POST['email'])) {
      $errors['email'] = 'Please enter your email';
    } else {
      $existing = $this->userDAO->selectByEmail($_POST['email']);
      if(!empty($existing)) {
        $errors['email'] = 'Email address is already in use';
      }
    }
    if(empty($_POST['password'])) {
      $errors['password'] = 'Please enter a password';
    }
    if($_POST['confirm_password'] != $_POST['password']) {
      $errors['confirm_password'] = 'Passwords do not match';
    }
    if(empty($errors)) {
      $data = array(
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
      );
      $inserteduser = $this->userDAO->insert($data);
      if(!empty($inserteduser)) {
        $_SESSION['info'] = 'Registration Successful!';
        header('Location: index.php');
        exit();
      } else {
        $this->set('errors', $this->userDAO->validate($data));
      }
    }
    $_SESSION['error'] = 'Registration Failed!';
    $this->set('errors', $errors);
  }

}

<?php
session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/user.php'; // Matches lowercase 'user.php' from screenshot

class AuthController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new User($conn);
    }

    public function handleRegister() {
        if (isset($_POST['register'])) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $pass = $_POST['password'];
            $role = $_POST['role'];

            if ($this->userModel->emailExists($email)) {
                $_SESSION['register_error'] = "Email already exists!";
                $_SESSION['active_form'] = 'register';
                header("Location: ../views/auth/login.php"); // Updated to your single-page login/register
            } else {
                if ($this->userModel->register($name, $email, $pass, $role)) {
                    $_SESSION['active_form'] = 'login';
                    header("Location: ../views/auth/login.php?success=1");
                }
            }
            exit();
        }
    }

    public function handleLogin() {
        if (isset($_POST['login'])) {
            $email = trim($_POST['email']);
            $pass = $_POST['password'];
            
            $user = $this->userModel->login($email, $pass);
            
          if ($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['user_email'] = $user['email']; 
    $_SESSION['role'] = $user['role'];

    if ($user['role'] === 'admin') {
        header("Location: ../views/admin/adminDashboard.php");
    } else {
        header("Location: ../controllers/DashboardController.php");
    }
} else {
                $_SESSION['login_error'] = "Invalid credentials or role!";
                $_SESSION['active_form'] = 'login';
                header("Location: ../views/auth/login.php");
            }
            exit();
        }
    }
}

$controller = new AuthController($conn);
$action = $_GET['action'] ?? '';

if ($action === 'login') {
    $controller->handleLogin();
} elseif ($action === 'register') {
    $controller->handleRegister();
}

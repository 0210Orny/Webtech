<?php 
session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? '',
];

$activeForm = $_SESSION['active_form'] ?? 'login';

unset($_SESSION['login_error'], $_SESSION['register_error'], $_SESSION['active_form']);

function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {   
    return $formName === $activeForm ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost&Found - Portal</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');
        :root { --primary: #7494ec; --bg-grad: linear-gradient(to right, #e2e2e2, #c9d6ff); }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Poppins", sans-serif; }
        body { min-height: 100vh; background: var(--bg-grad); color: #333; }
        .page-wrapper { display: flex; width: 100%; min-height: 100vh; }
        .image-container { flex: 1.2; display: flex; justify-content: center; align-items: center; padding: 20px; }
        .form-container { flex: 0.8; display: flex; justify-content: center; align-items: center; padding: 20px; }
        .form-box { width: 100%; max-width: 450px; padding: 30px; background: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); display: none; }
        .form-box.active { display: block; }
        h2 { font-size: 34px; text-align: center; margin-bottom: 20px; }
        input, select { width: 100%; padding: 12px; background: #eee; border-radius: 6px; border: none; outline: none; margin-bottom: 20px; }
        button { width: 100%; padding: 12px; background: var(--primary); border-radius: 6px; border: none; cursor: pointer; color: #fff; font-weight: 500; transition: 0.5s; }
        button:hover { background: #6884d3; }
        .error-message { padding: 12px; background: #f8d7da; border-radius: 6px; color: #a42834; text-align: center; margin-bottom: 20px; }
        @media (max-width: 850px) { .image-container { display: none; } .form-container { flex: 1; } }
    </style>
</head>
<body>
    
<div class="page-wrapper">
    <div class="image-container">
<img src="hero.png" alt="Hero" style="max-width: 100%; height: 650px; width: 700px;">
    </div>

    <div class="form-container">
        <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
            <form action="../../controllers/AuthController.php?action=login" method="post">
                <h2>Login</h2>
                <?= showError($errors['login']); ?> 
                <input type="email" name="email" placeholder="Email" required> 
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="user">Login as User</option>
                    <option value="admin">Login as Admin</option>
                </select>
                <button type="submit" name="login">Login</button>
                <p style="text-align:center;">Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
            </form>
        </div>

        <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
            <form action="../../controllers/AuthController.php?action=register" method="post">
                <h2>Register</h2>
                <?= showError($errors['register']); ?> 
                <input type="text" name="name" placeholder="Name" required> 
                <input type="email" id="email" name="email" placeholder="Email" required autocomplete="off">
                <div id="emailStatus" style="font-size: 14px; margin-top: -15px; margin-bottom: 15px;"></div>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="register">Register</button>
                <p style="text-align:center;">Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>
        </div>
    </div>
</div>

<script src="../../../public/js/checkEmail.js"></script>
<script>
    lucide.createIcons();
    function showForm(formId) {
        document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));
        document.getElementById(formId).classList.add("active");
    }
</script>
</body>
</html>

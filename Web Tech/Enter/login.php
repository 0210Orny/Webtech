<?php 
session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? '',
];

$activeForm = $_SESSION['active_form'] ?? 'login';

// Clear errors after reading so they don't stay there on refresh
unset($_SESSION['login_error']);
unset($_SESSION['register_error']);
unset($_SESSION['active_form']);

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
    <title>Lost&Found - Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        /* Keep your original background color/gradient */
        body {
            min-height: 100vh;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            color: #333;
        }

        /* NEW: Flex container to split the screen */
        .page-wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* LEFT SIDE: Reserved for your image */
        .image-container {
            flex: 1.2; /* Takes up more space on the left */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* Add your favorite image here later */
        .image-placeholder {
            width: 90%;
            height: 80%;
            background: rgba(255, 255, 255, 0.2); /* Semi-transparent placeholder */
            border-radius: 20px;
            border: 2px dashed rgba(255, 255, 255, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #7494ec;
            font-weight: 600;
        }

        /* RIGHT SIDE: Container for the form */
        .form-container {
            flex: 0.8; /* Form sits on the right */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* YOUR EXACT PREVIOUS BOX DESIGN */
        .form-box {
            width: 100%;
            max-width: 450px;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: none;
        }

        .form-box.active {
            display: block;
        }

        h2 { font-size: 34px; text-align: center; margin-bottom: 20px; }
        
        input, select {
            width: 100%;        
            padding: 12px;
            background: #eee;
            border-radius: 6px;
            border: none;
            outline: none;
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #7494ec;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            font-weight: 500;
            margin-bottom: 20px;
            transition: 0.5s;
        }

        button:hover { background: #6884d3; }

        p { font-size: 14.5px; text-align: center; margin-bottom: 10px; }
        p a { color: #7494ec; text-decoration: none; }
        p a:hover { text-decoration: underline; }

        .error-message {
            padding: 12px;
            background: #f8d7da;
            border-radius: 6px;
            color: #a42834;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Mobile Responsive: Stack them on small screens */
        @media (max-width: 850px) {
            .page-wrapper { flex-direction: column; }
            .image-container { display: none; }
            .form-container { flex: 1; }
        }
        #image-container img {
            width: 100%;
            height: auto;
            border-radius: 20px;
            left: 0px;
        }
    </style>
</head>
<body>
    
<div class="page-wrapper">
    <div class="image-container">
        <div class="image-placeholder">
           <img src="hero.png" alt="Hero" style="border-radius:20px; width: 700px; height: 600px;">
        </div>
    </div>

    <div class="form-container">
        <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
            <form action="register.php" method="post">
                <h2>Login</h2>
                <?= showError($errors['login']); ?> <input type="email" name="email" placeholder="Email" required> 
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
            </form>
        </div>

        <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
            <form action="register.php" method="post">
                <h2>Register</h2>
                <?= showError($errors['register']); ?> <input type="text" name="name" placeholder="Name" required> 
                <input type="email" id="email" name="email" placeholder="Email" required>
                <span id="emailStatus"></span>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="">--Select Role--</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="register">Register</button>
                <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>
        </div>
    </div>
</div>

<script>
    function showForm(formId) {
        document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));
        document.getElementById(formId).classList.add("active");
    }
</script>
<script>
        function showForm(formId) {
            document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));
            document.getElementById(formId).classList.add("active");
        }
    </script>

    <script src="../../../public/js/checkEmail.js"></script>


</body>
</html>
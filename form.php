<?php 

$errorNome = $errorPassword = '';
$errorGeneric= '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    
    switch(true){
        case($nome == null && $password==null):
            $errorGeneric = "   Attenzione I campi non possono essere lasciati vuoti";
            break;
        case($nome == null):
            $errorNome = "  Attenzione Il campo nome non può essere lasciato vuoto";
            break;
        case(strlen($nome) > 10):
            $errorNome = "Attenzione: il nome utente non deve essere più lungo di 10 caratteri";
            break;
        case(strlen($nome) > 10 && strlen($password) > 10):
            $errorGeneric = "   Attenzione I campi non possono essere superiori ai 10 caratteri";
            break;
        case($password == null):
            $errorPassword = "   Attenzione Il campo password non può essere lasciato vuoto";
            break;
        case(strlen($password) > 10):
            $errorPassword = "Attenzione: la password non deve essere più lunga di 10 caratteri";
            break;
    }
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM | Personal area</title>
    <link rel="stylesheet" href="./style.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .error-message {
        color: red;
    }
    </style>
</head>
<body>
    <div id="container">
        <div id="form_container">
            <form action="./form.php" method="post">
                <h1>Login </h1>
                <div class="input_elements">
                    <label><input type="text" name='nome' placeholder="Username"></label>
                    <i class='form_icon bx bxs-user'></i>
                    <span class="error-message"><?php echo $errorNome; ?></span>
                    <span class="error-message"><?php echo $errorGeneric; ?></span>
                </div>
                <div class="input_elements">
                    <label><input type="password" name='password' checked="checked" placeholder="Password"><i class=' form_icon bx bxs-lock-alt'></i></label>
                    <span class="error-message"><?php echo $errorPassword; ?></span>
                    <span class="error-message"><?php echo $errorGeneric; ?></span>
                </div>
                <div class="feature">
                    <label> <input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password</a>
                </div>
                <div id="submit">
                    <input type="submit" name='submit' value="Invia">
                </div>
                <p>Dont have an account? <a href="#">Register</a></p>
            </form>
        </div>
    </div>
</body>
</html>

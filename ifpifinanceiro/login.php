<?php
session_start();

require_once('./controllers/loginController.php');

$controller = new LoginController();

if (isset($_SESSION['nome'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['login'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    if ($model->checkCredentials($nome, $senha)) {
        header('Location: index.php');
        exit();
    } else {
        $mensagem = "Credenciais inválidas. Tente novamente.";
    }


}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <nav class="navContainer"></nav>
    <form method="post" action="index.php" class="loginContainer">
        <h1>Financeiro IFPI - 2.0</h1>
        <input type="text" name="nome" id="nome" placeholder="UserName" required>
        <br><br>
        <input type="password" name="senha" placeholder="Password" id="senha" required>
        <br><br>
        <button type="submit" name="login">Login</button>
        <?php if (isset($mensagem)) {
            echo "<p>$mensagem</p>";
        } ?>
    </form>
</body>

</html>
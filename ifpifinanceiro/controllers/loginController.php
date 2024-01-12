<?php
class LoginController
{
    public function checkCredentials($nome, $senha)
    {
        return $nome === "admin" && $senha === "admin";
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];

            if ($this->checkCredentials($nome, $senha)) {
                $_SESSION['nome'] = $nome;
                header('Location: index.php');
                exit();
            } else {
                $mensagem = "Credenciais inválidas. Tente novamente.";
            }
        }
        include 'index.php';
    }
}
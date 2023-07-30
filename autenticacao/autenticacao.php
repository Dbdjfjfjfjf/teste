//<?php
//session_start();
//
//// Função para verificar se o membro é um administrador
//function verificarAdministrador() {
//    if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
//        // Redireciona para uma página de acesso negado se o membro não for um administrador
//        header("Location: acesso-negado.php");
//        exit();
//    } else {
//        // Redireciona para a página de administração se o membro for um administrador
//        header("Location: admin/index.html");
//        exit();
//    }
//}
//
//// Verifica se o formulário de login foi enviado
//if (isset($_POST["email"]) && isset($_POST["senha"])) {
//    $email = $_POST["email"];
//    $senha = $_POST["senha"];
//
//    // Verifique as credenciais do membro (exemplo fictício)
//    if ($email === "brasilvidaroleplay3@gmail.com" && $senha === "Ruan1243") {
//        // Defina a flag de administrador na sessão
//        $_SESSION["admin"] = true;
//
//        // Redirecione para a página de administração
//        verificarAdministrador();
//    } else {
//        // Credenciais inválidas, redireciona para a página de login com uma mensagem de erro
//        header("Location: login.php?erro=1");
//        exit();
//    }
//} else {
//    // O formulário não foi enviado, redireciona para a página de login
//    header("Location: login/index.php");
//    exit();
//}
//?>

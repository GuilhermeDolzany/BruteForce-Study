<?php
session_start();

// O "Leão de Chácara": Verifica se o crachá (sessão) existe
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    // Se não estiver logado, chuta de volta pro login
    header("Location: login.php");
    exit;
}

// Lógica para o botão de sair
if (isset($_GET['sair'])) {
    session_destroy(); // Rasga o crachá
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Painel de Controle</title>
    <style>
        body { font-family: sans-serif; background-color: #282c34; color: white; padding: 50px; text-align: center; }
        .painel { background: #3e4451; padding: 40px; border-radius: 8px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.3); }
        .btn-sair { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #dc3545; color: white; text-decoration: none; border-radius: 4px; }
        .btn-sair:hover { background: #c82333; }
        h1 { color: #98c379; }
    </style>
</head>
<body>
    <div class="painel">
        <h1>✅ HACKED! Acesso Concedido.</h1>
        <h2>Bem-vindo ao sistema interno, <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>.</h2>
        <p>Aqui ficam os dados secretos do servidor...</p>
        <br>
        <a href="?sair=true" class="btn-sair">Desconectar</a>
    </div>
</body>
</html>

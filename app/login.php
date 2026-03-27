<?php
session_start(); // Inicia o gerenciador de sessões do PHP

$erro = '';

// Verifica se os dados chegaram via POST (O Raw do seu Python)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'] ?? '';
    $password = $_POST['password'] ?? '';

    // A senha que o seu script precisa descobrir
    if ($user === 'admin' && $password === '12345') {
        
        // Login certo! Cria o "crachá" do usuário (Sessão)
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $user;
        
        // Redireciona o usuário (ou o seu script) para o painel interno
        header("Location: dashboard.php");
        exit; // Para a execução do script aqui
        
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Acesso Restrito - Lab</title>
    <style>
        body { font-family: sans-serif; background-color: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .caixa-login { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 300px; text-align: center; }
        input { width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #007bff; color: white; border: none; padding: 10px; width: 100%; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background: #0056b3; }
        .erro { color: red; font-size: 14px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="caixa-login">
        <h2>Área Segura</h2>
        
        <?php if ($erro): ?>
            <div class="erro"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="user" placeholder="Digite o usuário" required>
            <input type="password" name="password" placeholder="Digite a senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>

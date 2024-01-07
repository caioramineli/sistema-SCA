<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/login.css">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="icon" href="../images/s-icon.png" type="image/x-icon">
    <script src="../js/login.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <main>
        <h1>SCA</h1>
        <form>
            <h2>Login</h2>
            <input onclick="EsconderSpan()" id="usuario" type="text" placeholder="Usuário">
            <input onclick="EsconderSpan()" id="senha" type="password" placeholder="Senha" maxlength="26">
            <span id="erro">Usuário ou senha incorretos</span>
            <div id="icone" onclick="TrocarIcone()"></div>
            <input id="entrar" type="submit" value="Entrar" onclick="Logar(); return false"> 
            <div id="loading"></div>
        </form>
    </main>
</body>
</html>
<?php

echo "Login Page...<br>";

?>

<!-- Formulário de login -->

<form id="formLogin">
    <label>
        <span>Email:</span>
        <input type="text" name="email" value="fabiosantos@ifsul.edu.br">
    </label>
    <label>
        <span>Senha:</span>
        <input type="password" name="password" value="12345678">
    </label>
    <button>Entrar</button>
</form>

<button id="getUser">GET USER by ID</button>

<script type="module" src="<?= url("assets/web/js/login.js"); ?>"></script>
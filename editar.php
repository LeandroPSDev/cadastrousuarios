<h1>Editar usuário</h1>

<?php
    $sql = "SELECT * FROM users WHERE id=".$_REQUEST["id"];
    $usuarios = $pdo->query($sql);

    foreach($usuarios as $usuario){
        $id = $usuario['id'];
        $name = $usuario["name"];
        $email = $usuario["email"];
        $password = md5($usuario["password"]);
        $status = $usuario["status"];
    }
?>

<form id="usuario-formulario" action="?page=salvar" method="POST">

    <input type="hidden" name="acao" value="editar" />
    <input type="hidden" name="id" value="<?php echo $id; ?>" />

    <div class="usuario-form">
        <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Digite o nome" class="form-control" />
    </div>

    <div class="usuario-form">
        <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Digite o e-mail" class="form-control" />
    </div>

    <div class="usuario-form">
        <select name="status" class="form-control">
            <option value="Y" <?php echo ($status == "Y" ? "selected" : ""); ?>>Ativo</option>
            <option value="N" <?php echo ($status == "N" ? "selected" : ""); ?>>Inativo</option>
        </select>
    </div>

    <div class="usuario-form">
        <input type="password" name="password" value="<?php echo $password; ?>" placeholder="Digite a senha" class="form-control" required />
    </div>

    <div class="usuario-form">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
    
</form>

<div class="usuario-voltar"><a href="javascript:history.back(1)" class="btn btn-secondary">Voltar</a></div>
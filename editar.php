<?php

    //Verificar se a postagem existe de acordo com os campos
    if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm-password"])){

        //Verificar se os campos foram preenchidos
        if(empty($_POST["name"]) or empty($_POST["email"]) or empty($_POST["password"]) or empty($_POST["confirm-password"]) or empty($_POST["status"])){
            $erro_geral = "Todos os campos são obrigatórios!";
            $erro_mensagem = $erro_geral;
        }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST["name"])){
            $erro_name = "Formato de nome inválido!";
            $erro_mensagem = $erro_name;
        }elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){    
            $erro_email = "E-mail inválido!";
            $erro_mensagem = $erro_email;
        }elseif(strlen($_POST["password"]) < 6){
                $erro_password = "A senha precisa ter no mínimo 6 caracteres";
                $erro_mensagem = $erro_password;
            
        }elseif($_POST["password"] != $_POST["confirm-password"]){
            $erro_password = "A confirmação de senha está errada!";
            $erro_mensagem = $erro_password;
        }else{
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = md5($_POST["password"]);
            $status = $_POST["status"];
            
            $sql = $pdo->prepare("INSERT INTO users VALUES (null,?,?,?,?)");
            $sql = $pdo->prepare("UPDATE users SET name = ?, email = ?, password = ?, status = ? WHERE id=".$_REQUEST["id"]);
            if($sql->execute(array($name,$email,$password,$status))){
                print "<script>alert('Usuário atualizado com sucesso!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível atualizar!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
            
        }
    }

?>

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

<form id="usuario-formulario" action="#" method="POST">

    <!--<input type="hidden" name="acao" value="editar" />
    <input type="hidden" name="id" value="<?php echo $id; ?>" />-->

    <?php echo (isset($erro_mensagem) ? "<div id='usuarios-mensagem'>".$erro_mensagem."</div>" : ""); ?>

    <div class="usuario-form <?php echo (isset($erro_geral) && $_POST['name'] == "" || isset($erro_name) ? "alertRed" : ""); ?>">
        <label for="name">Nome do usuário</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" placeholder="Digite o nome" value="<?php echo (isset($_POST['name']) ? $_POST['name'] : ""); ?>" />
    </div>

    <div class="usuario-form <?php echo (isset($erro_geral) && $_POST['email'] == "" || isset($erro_email) ? "alertRed" : ""); ?>">
        <label for="email">E-mail do usuário</label>
        <input type="email" id="email" name="email"value="<?php echo $email; ?>" placeholder="Digite o e-mail" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : ""); ?>" />
    </div>

    <div class="usuario-form <?php echo (isset($erro_geral) && $_POST['password'] == "" || isset($erro_password) ? "alertRed" : ""); ?>">
        <label for="password">Senha do usuário</label>
        <input type="password" id="password" name="password" placeholder="Digite sua senha" value="<?php echo (isset($_POST['password']) ? $_POST['password'] : ""); ?>" >
    </div>

    <div class="usuario-form <?php echo (isset($erro_geral) && $_POST['confirm-password'] == "" || isset($erro_password) ? "alertRed" : ""); ?>">
        <label for="confirm-password">Confirme a senha</label>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirme a senha" value="<?php echo (isset($_POST['confirm-password']) ? $_POST['confirm-password'] : ""); ?>" >
    </div>

    <div class="usuario-form">
        <label for="status">Status do usuário</label>
        <select name="status">
            <option value="Y" <?php echo (isset($erro_geral) && $_POST['status'] == "Y" ? "selected" : ""); ?>>Ativo</option>
            <option value="N" <?php echo (isset($erro_geral) && $_POST['status'] == "N" ? "selected" : ""); ?>>Inativo</option>
        </select>
    </div>

    <div class="usuario-form">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
    
</form>

<div class="usuario-voltar"><a href="javascript:history.back(1)" class="btn btn-secondary">Voltar</a></div>
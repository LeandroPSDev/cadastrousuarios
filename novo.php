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

            //Verificando se o usuário/e-mail já foi cadastrado
            $sql = $pdo->prepare('SELECT * FROM users WHERE email=? LIMIT 1');
            $sql->execute(array($email));
            $usuario = $sql->fetch();

            if(!$usuario){
                $sql = $pdo->prepare("INSERT INTO users VALUES (null,?,?,?,?)");
                if($sql->execute(array($name,$email,$password,$status))){
                    print "<script>alert('Cadastrado com sucesso!');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }else{
                    print "<script>alert('Não foi possível cadastrar!');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }
            }else{
                $erro_email = "E-mail de usuário já cadastrado! Tente outro.";
                $erro_mensagem = $erro_email;
            }
        }
    }

?>

<h1>Cadastrar novo usuário</h1>

<form id="form" action="#" method="POST">

    <?php echo (isset($erro_mensagem) ? "<div id='usuarios-mensagem'>".$erro_mensagem."</div>" : ""); ?>

    <div class="usuario-form <?php echo (isset($erro_geral) && $_POST['name'] == "" || isset($erro_name) ? "alertRed" : ""); ?>">
        <label for="name">Nome do usuário</label>
        <input type="text" id="name" name="name" placeholder="Digite o nome" value="<?php echo (isset($_POST['name']) ? $_POST['name'] : ""); ?>" />
    </div>

    <div class="usuario-form <?php echo (isset($erro_geral) && $_POST['email'] == "" || isset($erro_email) ? "alertRed" : ""); ?>">
        <label for="email">E-mail do usuário</label>
        <input type="email" id="email" name="email" placeholder="Digite o e-mail" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : ""); ?>" />
    </div>

    <div class="usuario-form <?php echo (isset($erro_geral) && $_POST['password'] == "" || isset($erro_password) ? "alertRed" : ""); ?>">
        <label for="password">Senha do usuário</label>
        <input type="password" id="password"  name="password" placeholder="Digite sua senha" value="<?php echo (isset($_POST['password']) ? $_POST['password'] : ""); ?>" >
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
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
    
</form>

<div class="usuario-voltar"><a href="javascript:history.back(1)" class="btn btn-secondary">Voltar</a></div>

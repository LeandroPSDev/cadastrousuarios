<?php 

    //Verificar se a postagem existe de acordo com os campos
    if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $status = $_POST["status"];

        //Verificar se os campos foram preenchidos
        if(empty($name) or empty($email) or empty($password) or empty($status)){
            $erro_geral = "Todos os campos são obrigatórios!";
        }else{
            $sql = "INSERT INTO users (name, email, password, status) VALUES ('{$name}', '{$email}', '{$password}', '{$status}')";
            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastrado com sucesso!');</script>";
                print "<script>location.href='?page=listar';</script>";
                #print "location.href = '?page=listar'";
            }else{
                print "<script>alert('Não foi possível cadastrar!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }
        }
    }

?>

<h1>Cadastrar novo usuário</h1>

<form id="form" action="#" method="POST">

    <!--<input type="hidden" name="acao" value="cadastrar" />-->

    <?php echo (isset($erro_geral) ? "<div id='usuarios-mensagem'>".$erro_geral."</div>" : ""); ?>

    <div class="usuario-form">
        <input type="text" id="name" name="name" placeholder="Digite o nome" value="<?php echo ($_POST['name'] ? $_POST['name'] : ""); ?>" />
    </div>

    <div class="usuario-form">
        <input type="email" id="email" name="email" placeholder="Digite o e-mail" value="<?php echo ($_POST['email'] ? $_POST['email'] : ""); ?>" />
    </div>

    <div class="usuario-form">
        <input type="password" id="password" minlength="6" name="password" placeholder="Digite sua senha" value="<?php echo ($_POST['password'] ? $_POST['password'] : ""); ?>" >
    </div>

    <div class="usuario-form">
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirme a senha" value="<?php echo ($_POST['confirm-password'] ? $_POST['confirm-password'] : ""); ?>" >
    </div>

    <div class="usuario-form">
        <select name="status" class="form-control">
            <option value="" disabled selected>Qual a situação do usuário?</option>
            <option value="Y">Ativo</option>
            <option value="N">Inativo</option>
        </select>
    </div>

    <div class="usuario-form">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
    
</form>

<div class="usuario-voltar"><a href="javascript:history.back(1)" class="btn btn-secondary">Voltar</a></div>

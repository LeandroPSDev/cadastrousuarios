<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro de usuários</title>
        <link href="imagens/favicon.png" rel="icon">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Leandro Pires dos Santos" />

    </head>
    <body>
        <div id="usuario-topo">
            <div><img src="imagens/usuario.png" alt="Cadastro de usuários" title="Cadastro de usuários" /></div>
                
            <nav> 
                <ul>
                    <li><a href="index.php">Listar usuários</a></li>
                    <li><a href="?page=novo" >Cadastrar usuários</a></li>
                </ul> 
            </nav>
        </div>

        <div id="usuario-conteudo">
            <?php
                include('config.php');

                switch(@$_REQUEST["page"]){
                    case "novo":
                        include("novo.php");
                        break;
                    case "listar":
                        include("listar.php");
                        break;
                    case "excluir":
                        include("excluir.php");
                        break;
                    case "editar":
                        include("editar.php");
                        break;
                    default:
                        include("listar.php");
                        break;
                }
            ?>
        </div>

        <footer>
            <a href="#">Cadastro usuário</a>
        </footer>
        <script src="js/scripts.js"></script>
   
    </body>
</html>
<?php

    switch ($_REQUEST["acao"]) {

        case 'cadastrar':
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = md5($_POST["password"]);
            $status = $_POST["status"];

            $sql = "INSERT INTO users (name, email, password, status) VALUES ('{$name}', '{$email}', '{$password}', '{$status}')";
            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastrado com sucesso!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível cadastrar!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }

            break;
            
        case 'editar':           
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = md5($_POST["password"]);
            $status = $_POST["status"];

            $sql = "UPDATE users SET 'name' = '{$name}', email = '{$email}', 'password' = '{$password}', 'status' = '{$status}' WHERE id=".$_REQUEST["id"];
            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Editado com sucesso!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível editar!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }

            break;

        case 'excluir':            
            $sql = "DELETE FROM users WHERE id=".$_REQUEST["id"];
            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Excluído com sucesso!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('Não foi possível excluir!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }

            break;            
    }

?>
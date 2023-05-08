<?php

    switch ($_REQUEST["acao"]) {

        case 'cadastrar':
            $nome = $_POST["nome"];
            $valor = $_POST["valor"];
            $descricao = $_POST["descricao"];
            $ativo = $_POST["ativo"];

            $sql = "INSERT INTO livros (nome, descricao, valor, ativo) VALUES ('{$nome}', '{$descricao}', '{$valor}', '{$ativo}')";
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
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $valor = $_POST["valor"];
            $ativo = $_POST["ativo"];

            $sql = "UPDATE livros SET nome = '{$nome}', descricao = '{$descricao}', valor = '{$valor}', ativo = '{$ativo}' WHERE id=".$_REQUEST["id"];
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
            $sql = "DELETE FROM livros WHERE id=".$_REQUEST["id"];
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
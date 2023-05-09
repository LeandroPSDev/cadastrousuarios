<?php     
    $sql = "DELETE FROM users WHERE id=".$_REQUEST["id"];
    $excluir = $pdo->query($sql);

    if($excluir==true){
        print "<script>alert('Excluído com sucesso!');</script>";
        print "<script>location.href='?page=listar';</script>";
    }else{
        print "<script>alert('Não foi possível excluir!');</script>";
        print "<script>location.href='?page=listar';</script>";
    }
?>
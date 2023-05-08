<h1>Listar usuários</h1>

<?php
    $sql = "SELECT id, name, email, status FROM users ORDER BY id asc";
    $usuarios = $conn->query($sql);
?>

    <?php if(isset($usuarios) or $usuario == ""){ ?>
        <table>
            <tr>      
                <th>Nome</th>
                <th>email</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            
            <?php foreach($usuarios as $usuario){ ?>
                <tr>
                    <td> <?php echo $usuario['name']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td><?php echo ($usuario['status'] == "Y" ? "<img src='imagens/disponivel.png' alt='Ativo' title='Ativo' />" : "<img src='imagens/indisponivel.png' alt='Inativo' title='Inativo' />"); ?></td>
                    
                    <td>
                        <button onclick="location.href='?page=editar&id=<?php echo $usuario['id']; ?>'" class='btn'><img src='imagens/editar.png' alt='Editar' title='Editar' /></button>
                        <button onclick="if(confirm('Tem certeza que deseja excluir o usuário: <?php echo $usuario['name']; ?>')){location.href='?page=salvar&acao=excluir&id=<?php echo $usuario['id']; ?>'}else{false;}" class='btn'><img src='imagens/excluir.png' alt='Excluir' title='Excluir' /></button>
                    </td>
                </tr>
            <?php } ?>    

        </table>

    <?php } ?>

<div class="usuario-voltar"><a href="javascript:history.back(1)" class="btn btn-secondary">Voltar</a></div>

<h1>Listar livros</h1>

<?php
    $sql = "SELECT id, nome, valor, descricao, ativo FROM livros ORDER BY valor asc";
    $livros = $conn->query($sql);
?>

    <?php if(isset($livros) or $livros == ""){ ?>
        <table>
            <tr>      
                <th>Nome</th>
                <th>Valor</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
            
            <?php foreach($livros as $livro){ ?>
                <tr>
                    <td> <?php echo $livro['nome']; ?></td>
                    <td>R$<?php echo $livro['valor']; ?></td>
                    <td><?php echo ($livro['ativo'] == "Y" ? "<img src='imagens/disponivel.png' alt='Em estoque' title='Em estoque' />" : "<img src='imagens/indisponivel.png' alt='Em falta' title='Em falta' />"); ?></td>
                    
                    <td>
                        <button onclick="location.href='?page=editar&id=<?php echo $livro['id']; ?>'" class='btn'><img src='imagens/editar.png' alt='Editar' title='Editar' /></button>
                        <button onclick="if(confirm('Tem certeza que deseja excluir o livro: <?php echo $livro['nome']; ?>')){location.href='?page=salvar&acao=excluir&id=<?php echo $livro['id']; ?>'}else{false;}" class='btn'><img src='imagens/excluir.png' alt='Excluir' title='Excluir' /></button>
                    </td>
                </tr>
            <?php } ?>    

        </table>

    <?php } ?>

<div class="livraria-voltar"><a href="javascript:history.back(1)" class="btn btn-secondary">Voltar</a></div>

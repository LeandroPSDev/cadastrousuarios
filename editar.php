<h1>Editar livro</h1>

<?php
    $sql = "SELECT * FROM livros WHERE id=".$_REQUEST["id"];
    $livros = $conn->query($sql);

    foreach($livros as $livro){
        $id = $livro['id'];
        $nome = $livro['nome'];
        $valor = $livro['valor'];
        $descricao = $livro['descricao'];
        $ativo = $livro['ativo'];
    }
?>

<form id="livraria-formulario" action="?page=salvar" method="POST">

    <input type="hidden" name="acao" value="editar" />
    <input type="hidden" name="id" value="<?php echo $id; ?>" />

    <div class="livraria-form">
        <input type="text" name="nome" value="<?php echo $nome; ?>" placeholder="Digite o nome" class="form-control" />
    </div>

    <div class="livraria-form">
        <input type="text" name="valor" value="<?php echo $valor; ?>" placeholder="Digite o valor" class="form-control" />
    </div>

    <div class="livraria-form">
        <select name="ativo" class="form-control">
            <option value="Y" <?php echo ($ativo == "Y" ? "selected" : ""); ?>>Ativo</option>
            <option value="N" <?php echo ($ativo == "N" ? "selected" : ""); ?>>Inativo</option>
        </select>
    </div>

    <div class="livraria-form">
        <textarea name="descricao" placeholder="Descreva o jogador" class="form-control"><?php print $descricao; ?></textarea>
    </div>

    <div class="livraria-form">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
    
</form>

<div class="livraria-voltar"><a href="javascript:history.back(1)" class="btn btn-secondary">Voltar</a></div>
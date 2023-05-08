<h1>Cadastrar novo livro</h1>

<form id="livraria-formulario" action="?page=salvar" method="POST">

    <input type="hidden" name="acao" value="cadastrar" />

    <div class="livraria-form">
        <input type="text" name="nome" placeholder="Digite o nome" class="form-control" required />
    </div>

    <div class="livraria-form">
        <input type="number" name="valor" placeholder="Digite o valor" class="form-control" required />
    </div>

    <div class="livraria-form">
        <select name="ativo" class="form-control" required>
            <option value="" disabled selected>Qual a situação do produto?</option>
            <option value="Y">Ativo</option>
            <option value="N">Inativo</option>
        </select>
    </div>

    <div class="livraria-form">
        <textarea name="descricao" placeholder="Descrição do livro" class="form-control" required ></textarea>
    </div>

    <div class="livraria-form">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
    
</form>

<div class="livraria-voltar"><a href="javascript:history.back(1)" class="btn btn-secondary">Voltar</a></div>
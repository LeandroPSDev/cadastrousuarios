<h1>Cadastrar novo livro</h1>

<form id="livraria-formulario" action="?page=salvar" method="POST">

    <input type="hidden" name="acao" value="cadastrar" />

    <div class="livraria-form">
        <input type="text" name="nome" placeholder="Digite o nome" class="form-control" required />
    </div>

    <div class="livraria-form">
        <input type="email" name="email" placeholder="Digite o e-mail" class="form-control" required />
    </div>

    <div class="livraria-form">
        <input type="password" name="senha" placeholder="digite sua senha" class="form-control" required >
    </div>

    <div class="livraria-form">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
    
</form>

<div class="livraria-voltar"><a href="javascript:history.back(1)" class="btn btn-secondary">Voltar</a></div>
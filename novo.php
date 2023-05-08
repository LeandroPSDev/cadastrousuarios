<h1>Cadastrar novo usuário</h1>

<form id="form" action="?page=salvar" method="POST">

    <input type="hidden" name="acao" value="cadastrar" />

    <div class="usuario-form">
        <input type="text" id="name" name="name" placeholder="Digite o nome" />
    </div>

    <div class="usuario-form">
        <input type="email" id="email" name="email" placeholder="Digite o e-mail" />
    </div>

    <div class="usuario-form">
        <input type="password" id="password" minlength="6" name="password" placeholder="Digite sua senha" >
    </div>

    <div class="usuario-form">
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirme a senha" >
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

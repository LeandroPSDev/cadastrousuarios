# Painel simples de cadastro de usuários

## Descrição do projeto
<p>- Painel administrativo para criação, atualização e exclusão de usuários</p>

## Funcionalidades do projeto
### Cadastrar
<ul>
<li>Todos os campos devem ser preenchidos</li>
<li>Não será possível inserir números no campo nome.</li>
<li>Existem também as verificações de e-mail(se é válido) e senha(quantidade de caracteres e confirmar senha)</li>
  <li>Criei um campo para definir se o usuário é "ATIVO" ou "INATIVO".</li>
<li>Por padrão, o usuário é "ativo", mas pode ser alterado para "inativo"</li>
</ul>
  
### Listar
<p>- Lista todos os usuários cadastrados.</p>

### Editar
<ul>
<li>Ao editar, a pessoa terá que digitar a senha e confirma-lá novamente;</li>
<li>As mesmas verificações para o nome, e-mail e senha continuam;</li>
</ul>
  
### Excluir
<p>- A exclusão dos usuários está direta(com um delete no banco). Como é um projeto base, fiz dessa forma; mas com algo mais robusto, acredito que ativando e desativando-o seja mais vantajoso.</p>
<p>- Por exemplo, ao invés de usar um "DELETE" no registro desejado, utilizaria a lógica do "Ativo/Inativo"; dessa forma, mantendo o registro no banco.</p>

### Verificações dos formulários(Cadastrar e Editar) com Javascript e PHP.
<ul>
    <li> Verifica se os campos foram preenchidos - JS e PHP;</li>
    <li> Verifica se o nome é válido. Por exemplo, números são inválidos - PHP;</li>
    <li> Verifica se o e-mail é válido - PHP;</li>
    <li> Verifica se o e-mail já foi cadastrado. Só permite o usuário com um e-mail não existente no banco - PHP;</li>
    <li> Quantidade mínima de 6 caracteres na senha - HTML(minlength) e PHP;</li>
    <li> Verifica se a senha é a mesma da "confirmação de senha" - JS e PHP;</li>
</ul>

## Tecnologias utilizadas
<ul>
  <li>HTML</li>
  <li>CSS</li>
  <li>JavaScript</li>
  <li>PHP</li>
  <li>SQL</li>
</ul>

## Status do projeto
<p>- Projeto em estado inicial. Será criado um painel de login, tipo de usuário, etc.</p>



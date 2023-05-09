
//Validar formulário via JS
const form = document.getElementById("usuario-formulario");
const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirm-password");

form.addEventListener("submit", (e) => {

    console.log(nameInput.value, emailInput.value);
    e.preventDefault();

    //Verifica se o nome está vazio
    if (nameInput.value === "") {
        alert("Por favor, preencha o nome do usuário");
        return;
    }

    //Verifica se o email está vazio e se é válido
    if (emailInput.value === "") {
        alert("Por favor, preencha o e-mail do usuário");
        return;
    }

    //Verifica se o password está vazio
    if (passwordInput.value === "") {
        alert("Por favor, preencha a senha do usuário");
        return;
    }

    //Verifica se as senhas estão iguais
    if (confirmPasswordInput.value != passwordInput.value) {
        alert("A confirmação de senha está errada!");
        return;
    }

    //Se todos os campos estiverem corretamente preenchidos, enviar formulário
    form.submit();
});

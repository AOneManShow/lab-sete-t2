// Acessando o campo e a mensagem de erro
var pass = document.getElementById('password');
var passConfirm = document.getElementById('passwordConfirm');
var email = document.getElementById('email');
const mensagemErroPass = document.getElementById('mensagemErroPass');
const mensagemErroEmail = document.getElementById('mensagemErroEmail');
const formulario = document.getElementById('formulario-cadastro');
const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
var codigoErro;

let timeoutId; // Armazena o ID do temporizador
let timeoutId2; // Armazena o ID do temporizador

// Função de validação de senha em tempo real
function validarSenha() {
    // Limpar temporizador anterior, se houver
    clearTimeout(timeoutId);

    // Iniciar novo temporizador
    timeoutId = setTimeout(() => {
        // Obter o valor do campo
        const senha = pass.value;
        const senhaConfirm = passConfirm.value;
        mensagemErroPass.textContent = '';
        codigoErro = "nenhum";

        // Verificar se o valor atende aos critérios de validação
        if (senha !== ''){
            if(senhaConfirm !== '') {
                if (senha !== senhaConfirm) {
                    mensagemErroPass.textContent = "Os campos de senha precisam corresponder.";
                    codigoErro = "senha";
                }
            }
            if(senha.length < 5){
                mensagemErroPass.textContent = 'A senha deve ter pelo menos 5 caracteres.';
                codigoErro = "senha";
            }
        }
    }, 1000); // Atraso de 1 segundo
}

// Função de validação de e-mail em tempo real
function validarEmail() {
    // Limpar temporizador anterior, se houver
    clearTimeout(timeoutId2);

    // Iniciar novo temporizador
    timeoutId2 = setTimeout(() => {
        // Obter o valor do campo
        const mail = email.value;
        mensagemErroEmail.textContent = '';
        codigoErro = "nenhum";

        // Verificar se o valor atende aos critérios de validação
        if ( mail !== '' ) {
            if ( !regexEmail.test(mail) ) //retorna TRUE se corresponde, FALSE caso contrário
            {
                mensagemErroEmail.textContent = "Esse campo precisa corresponder com o padrão de um email. Dica: exemplo@mail.com";
                codigoErro = "email";
            }/* else {
                mensagemErro.textContent = '';
                codigoErro = "nenhum";
            }*/
        }
    }, 1000); // Atraso de 1 segundo
}

// Função de envio do formulário
function enviarFormulario(event) {
    // Verificar se há mensagem de erro
    if ( codigoErro === "senha") {
        event.preventDefault(); // Cancelar a submissão do formulário
        // Ou você pode exibir uma mensagem de erro geral, se preferir
        // Exemplo: alert('Por favor, preencha corretamente o formulário.');
        alert('Erro na senha. Os campos de senha não correspondem.');
    }
    else if( codigoErro === "email" ){
        event.preventDefault(); // Cancelar a submissão do formulário
        alert('Erro no email. Deve seguir o formato exemplo@mail.com');
    }
}


// Adicionar eventos de digitação aos campos
pass.addEventListener('input', validarSenha);
passConfirm.addEventListener('input', validarSenha);
email.addEventListener('input', validarEmail);
// Adicionar eventos de cancelamento ao formulário, caso tenha erros
formulario.addEventListener('submit', enviarFormulario);


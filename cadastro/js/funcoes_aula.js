function validaForm() {

    var msgErr = document.getElementById("erros_form");

    try {
        var nome = document.forms["formCadastro"]["nome"].value;
        if (nome == null || nome == "") {
            throw "Campo nome obrigatório!";
        }

        var email = document.forms["formCadastro"]["email"].value;
        var arroba = email.indexOf("@");
        var ponto = email.lastIndexOf(".");
        if (arroba < 1 || ponto < 1) {
            throw "E-mail inválido!";
        }

        var telefone = document.forms["formCadastro"]["telefone"].value;
        if (telefone == null || telefone == "") {
            throw "Campo telefone obrigatório!";
        }

        var usuario = document.forms["formCadastro"]["usuario"].value;
        if (usuario == null || usuario == "") {
            throw "Campo usuário obrigatório!";
        } 
        
        var senha = document.forms["formCadastro"]["senha"].value;
        if (senha == null || senha == "") {
            throw "Campo senha obrigatório!";
        }        

        return true;
    }
    catch (err) {
        msgErr.innerHTML = "Erro:" + err;
        return false;
    }

}

function confirmaExcluir() {
    var x = confirm("Confirma a exclusão do registro?");
    if (x)
        return true;
    else
        return false;
}
//singup js code

var singup = document.getElementById('Signup');
var singin = document.getElementById('Signin');

window.onclick = function(event){
    if(event.target == singup)
    {
        singup.style.display = "none";
        txtClear();
    }
    if(event.target == singin){
        singin.style.display = "none";
        txtClear();
    }
}

function btnOpenSingup(){
    document.getElementById('Signup').style.display = 'block';
}

function btnCloseSingup(){
    document.getElementById('Signup').style.display = 'none';
    txtClear();
}

//singin js code

function btnOpenSingin(){
    document.getElementById('Signin').style.display = 'block';
}

function btnCloseSingin(){
    document.getElementById('Signin').style.display='none';
    txtClear();
}

function txtClear(){
    document.getElementById('usernameOrEmail').value = '';
    document.getElementById('LPass').value = '';
    document.getElementById('firstName').value = '';
    document.getElementById('lastName').value = '';
    document.getElementById('Pass').value = '';
    document.getElementById('RePass').value = '';
    document.getElementById('userName').value = '';
    document.getElementById('email').value = '';
    document.getElementById('phone').value = '';
}


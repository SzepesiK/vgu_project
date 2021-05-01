window.onload = function() {
    var send_login = document.getElementById("login-submit");
    var send_signup = document.getElementById("submit");
    var send_contact = document.getElementById("submit-contactus");

    send_login.addEventListener('click', ellenoriz_login);
    send_signup.addEventListener('click', ellenoriz_signup);
    send_contact.addEventListener('click', ellenoriz_contact);

};
function ellenoriz_login(event_login) {

    var nevHelyes = false;

    var nev = document.getElementById("mailuid");
    if (nev.value.length<4 || nev.value.length>30) {
        nevHelyes = false;
        nev.style.background = '#f99';
    } else
    {
        nevHelyes = true;
        nev.style.background = 'green';
    }

    console.log('Név: '+ nevHelyes);
    if (!nevHelyes) event_login.preventDefault();
}
function ellenoriz_signup(event_signup) {

    var veznevHelyes = false;
    var kernevHelyes = false;
    var emailHelyes = false;
    var uidHelyes = false;
    var pwdHelyes = false;

    var veznev = document.getElementById("veznev");
    if (veznev.value.length<8 || veznev.value.length>30) {
        veznevHelyes = false;
        veznev.style.background = '#f99';
    } else
    {
        veznevHelyes = true;
        veznev.style.background = 'green';
    }

    var kernev = document.getElementById("kernev");
    if (kernev.value.length<8 || kernev.value.length>30) {
        kernevHelyes = false;
        kernev.style.background = '#f99';
    } else
    {
        kernevHelyes = true;
        kernev.style.background = 'green';
    }

    var level = document.getElementById("email");
    var checkPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (!checkPattern.test(level.value)) {
        emailHelyes = false;
        level.style.background = '#f99';
    } else
    {
        emailHelyes = true;
        level.style.background = 'green';
    }

    var uid = document.getElementById("uid");
    if (uid.value.length<8 || uid.value.length>30) {
        uidHelyes = false;
        uid.style.background = '#f99';
    } else
    {
        uidHelyes = true;
        uid.style.background = 'green';
    }

    var pwd = document.getElementsById("pwd");
    var pwdrepeat = document.getElementById('pwdrepeat');
    if (pwd.value != pwdrepeat.value) {
        pwdHelyes = false;
        pwd.style.background = '#f99';
        pwdrepeat.style.background='#f99';

    } else
    {
        pwdHelyes = true;
        pwd.style.background = 'green';
        pwdrepeat.style.background='green';
    }

    if (!veznevHelyes && !kernevHelyes && !emailHelyes && !pwdHelyes && !uidHelyes) event_signup.preventDefault();
}
function ellenoriz_contact(event_contact) {

    var nevHelyes = false;
    var emailHelyes = false;
    var uzenetHelyes = false;

    var nev = document.getElementById("nev");
    if (nev.value.length<8 || nev.value.length>30) {
        nevHelyes = false;
        nev.style.background = '#f99';
    } else
    {
        nevHelyes = true;
        nev.style.background = 'green';
    }

    var level = document.getElementById("email");
    var checkPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (!checkPattern.test(level.value)) {
        emailHelyes = false;
        level.style.background = '#f99';
    } else
    {
        emailHelyes = true;
        level.style.background = 'green';
    }

    var uzenet = document.getElementById('msg');
    if (uzenet.value.length>5000) {
        uzenetHelyes = false;
        uzenet.style.background = '#f99';

    } else
    {
        uzenetHelyes = true;
        uzenet.style.background = 'green';
    }


    console.log('Név: '+ nevHelyes);
    console.log('EMail: '+ emailHelyes);
    console.log('Üzenet: '+ uzenetHelyes);
    if (!nevHelyes && !emailHelyes && !uzenetHelyes) event_contact.preventDefault();
}
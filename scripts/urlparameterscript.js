function getError() {
    var url_string = window.location.href
    var url = new URL(url_string);
    var error = url.searchParams.get("error");
    console.log(error);
    if (error === 'password') {
        document.getElementById('errortext').innerHTML = "Le mot de passe est invalide.";
    } else if (error === 'account') {
        document.getElementById('errortext').innerHTML = "Ce compte n\'existe pas.";
    }
}
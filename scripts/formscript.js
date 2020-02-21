var checkpassword = function() {
    if (document.getElementById('password').value ==
        document.getElementById('confirmpassword').value) {
        document.getElementById('passworderror').style.color = 'green';
        document.getElementById('passworderror').innerHTML = 'V';
    } else {
        document.getElementById('passworderror').style.color = 'red';
        document.getElementById('passworderror').innerHTML = 'X';
    }
}
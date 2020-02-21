var checklength = function() {
    if (document.getElementById('password').value.length <= 7) {
        document.getElementById('passwordlength').style.color = 'red';
        document.getElementById('passwordlength').innerHTML = 'Trop court';
    } else if (document.getElementById('password').value.length >= 35) {
        document.getElementById('passwordlength').style.color = 'red';
        document.getElementById('passwordlength').innerHTML = 'Trop long';
    } else {
        document.getElementById('passwordlength').style.color = 'green';
        document.getElementById('passwordlength').innerHTML = ' ';
    }
}
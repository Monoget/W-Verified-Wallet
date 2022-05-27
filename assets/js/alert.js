let x = getCookie('alert');

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

console.log(x);
if (x == 1) {
    eraseCookie('alert');
    Swal.fire(
        'Success',
        'Thank you for your request!',
        'success'
    ).then(function() {
        window.location = "Home";
    });
}

if (x == 2) {
    eraseCookie('alert');
    Swal.fire(
        'Error',
        'Something went wrong!',
        'error'
    ).then(function() {
        window.location = "Home";
    });
}

function eraseCookie(name) {
    document.cookie = name + '=;';
}

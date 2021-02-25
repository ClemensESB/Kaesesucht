document.addEventListener('DOMContentLoaded', function() {
    var btnSubmit = document.getElementById('signupbutton');
    var inputEmail = document.getElementById('email');
    var inputPassword = document.getElementById('password');
    var inputPassword1 = document.getElementById('password1');
    var inputFirstName = document.getElementById('firstName');
    var inputLastName = document.getElementById('lastName');
    var inputStreet = document.getElementById('street');
    var inputStrNo = document.getElementById('strNo');
    var inputZipCode = document.getElementById('zipCode');
    var inputCity = document.getElementById('city');


    if (btnSubmit) {
        btnSubmit.addEventListener('click', function() {
            var valid = true;
            const emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            const passRegex = /^(?=.*?[A-Z].*?)(?=.*?[a-z].*?)(?=.*[0-9].*?).{8,}$/m;
            const zipRegex = /^[0-9]{5}$/m;

            if (!inputEmail || !inputEmail.value.match(emailRegex)) {
                valid = false;
            }
            if (!inputPassword || !inputPassword1 || !(inputPassword.value.match(passRegex) && inputPassword.value == inputPassword1.value)) {
                valid = false;
            }
            if (!inputFirstName.length >= 2 && !inputFirstName.length <= 45) {
                valid = false;
            }
            if (!inputLastName.length >= 2 && !inputLastName.length <= 45) {
                valid = false;
            }
            if (!inputZipCode || !inputZipCode.value.match(emailRegex)) {
                valid = false;
            }
            if (!inputStrNo.length >= 1 && !inputStrNo.length <= 5) {
                valid = false;
            }
            if (!inputStreet.length >= 2 && !inputStreet.length <= 100) {
                valid = false;
            }
            if (!inputCity.length >= 1 && !inputCity.length <= 50) {
                valid = false;
            }
            if (valid == false) {
                console.log("prevented");
                event.preventDefault();
                event.stopPropagation();
            }

            return valid;

        });
    }





    if (inputEmail) {
        inputEmail.addEventListener('keyup', function() {
            const emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            var str = this.value;
            var error = document.getElementById('emailError');

            if (str.match(emailRegex)) {
                inputEmail.style.border = '2px solid green';
                error.innerHTML = "";
            } else {
                inputEmail.style.border = '2px solid red';
                error.innerHTML = "E-mail ungültig";
            }
        });
    }

    if (inputPassword) {
        inputPassword.addEventListener('keyup', function() {
            const regex1 = /^(?=.*?[A-Z].*?)(?=.*?[a-z].*?)(?=.*[0-9].*?).{8,}$/m;
            const regex2 = /^(?=.*?[A-Z].*?)(?=.*?[a-z].*?[a-z])(?=.*[0-9].*?[0-9])(?=.*?[^\w\s].*?).{8,}$/m;
            const regex3 = /^(?=.*?[A-Z].*?[A-Z])(?=.*?[a-z].*?[a-z])(?=.*[0-9].*?[0-9])(?=.*?[^\w\s].*?[^\w\s]).{8,}$/m;
            var str = this.value;
            var error = document.getElementById('passwordError');
            if (str.match(regex3)) {
                inputPassword.style.border = '2px solid green';
                error.innerHTML = "";
            } else if (str.match(regex2)) {
                inputPassword.style.border = '2px solid blue';
                error.innerHTML = "";
            } else if (str.match(regex1)) {
                inputPassword.style.border = '2px solid yellow';
                error.innerHTML = "";
            } else {
                inputPassword.style.border = '2px solid red';
                error.innerHTML = "mind. 1 Großbuchstaben, mind. 1 Kleinbuchstaben, mind. 1 Zahl und mind. 8 Zeichen";
            }

        });

    }

    if (inputPassword1) {
        inputPassword1.addEventListener('keyup', function() {
            var str = this.value;
            var str2 = inputPassword.value;
            var error = document.getElementById('password1Error');

            if (str == str2) {
                inputPassword1.style.border = '2px solid green';
                error.innerHTML = "";
            } else {
                inputPassword1.style.border = '2px solid red';
                error.innerHTML = "Passwort stimmt nicht überein";
            }
        });
    }

    if (inputFirstName) {
        inputFirstName.addEventListener('keyup', function() {
            var str = this.value;
            var error = document.getElementById('firstNameError');

            if (str.length >= 2 && str.length <= 45) {
                inputFirstName.style.border = '2px solid green';
                error.innerHTML = "";
            } else {
                inputFirstName.style.border = '2px solid red';
                error.innerHTML = "Vorname muss länger als 2 und kürzer als 46 Buchstaben sein";

            }
        })
    }

    if (inputLastName) {
        inputLastName.addEventListener('keyup', function() {
            var str = this.value;
            var error = document.getElementById('firstLastError');

            if (str.length >= 2 && str.length <= 45) {
                inputLastName.style.border = '2px solid green';
                error.innerHTML = "";
            } else {
                inputLastName.style.border = '2px solid red';
                error.innerHTML = "Nachname muss länger als 2 und kürzer als 46 Buchstaben sein";

            }
        })
    }

    if (inputStreet) {
        inputStreet.addEventListener('keyup', function() {
            var str = this.value;
            var error = document.getElementById('streetError');

            if (str.length >= 2 && str.length <= 100) {
                inputLastName.style.border = '2px solid green';
                error.innerHTML = "";
            } else {
                inputLastName.style.border = '2px solid red';
                error.innerHTML = "Straße muss länger als 2 und kürzer als 101 Buchstaben sein";
            }
        })
    }

    if (inputStrNo) {
        inputStrNo.addEventListener('keyup', function() {
            var str = this.value;
            var error = document.getElementById('strNoError');

            if (str.length >= 1 && str.length <= 5) {
                inputLastName.style.border = '2px solid green';
                error.innerHTML = "";
            } else {
                inputLastName.style.border = '2px solid red';
                error.innerHTML = "Straßennummer muss länger als 1 und kürzer als 6 Buchstaben sein";
            }
        })
    }

    if (inputZipCode) {
        inputZipCode.addEventListener('keyup', function() {
            var str = this.value;
            const regex1 = /^[0-9]{5}$/m;
            var error = document.getElementById('zipCodeError');

            if (str.match(regex1)) {
                inputZipCode.style.border = '2px solid green';
                error.innerHTML = "";
            } else {
                inputZipCode.style.border = '2px solid red';
                error.innerHTML = "PLZ nicht nur aus 5 Ziffern";
            }
        })
    }

    if (inputCity) {
        inputCity.addEventListener('keyup', function() {
            var str = this.value;
            var error = document.getElementById('cityError');

            if (str.length >= 1 && str.length <= 50) {
                inputCity.style.border = '2px solid green';
                error.innerHTML = "";
            } else {
                inputCity.style.border = '2px solid red';
                error.innerHTML = "Ort muss länger als 1 und kürzer als 51 Buchstaben sein";
            }
        })
    }
});
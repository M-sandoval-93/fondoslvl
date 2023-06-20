// style fo login
const inputs = document.querySelectorAll('.input');

function focusFunc() {
    let parent = this.parentNode.parentNode;
    let span = this.parentElement.nextElementSibling;
    parent.classList.add('focus');
    span.classList.add('focus');
}

function blurFunc() {
    let parent = this.parentNode.parentNode;
    let span = this.parentElement.nextElementSibling;
    if (this.value == "") {
        parent.classList.remove('focus');
        span.classList.remove('focus');
    }
}

inputs.forEach(input => {
    input.addEventListener('focus', focusFunc);
    input.addEventListener('blur', blurFunc);
});



// ------------------- INTERNAL FUNCTIONS -------------------

//  (función para pasar valores alfanuméricos a mayúscula)
function convertToUpperCase(value) {
    if (/^[a-zA-Z0-9]+$/.test(value)) {
        return value.toUpperCase();
    }
    return value;
}

function verifyUserAccount() {
    $('#form-login').submit((e) => {
        e.preventDefault();
        let dataLogin = "login";

        // object to fetch user account data (objeto para capturar los datos de la cuenta de usuario)
        const userAccount = {
            userName: convertToUpperCase($.trim($('#userName').val())),
            password: convertToUpperCase($.trim($('#password').val()))
        }

        console.log(userAccount);

        // validation for null values (validación para campos nulos)
        if (userAccount.user.length <= 0 || userAccount.password.length <= 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Faltan datos importantes',
                allowOutsideClick: false
            });
            return false;
        }

        // ajax request to cjeck if the user account exists in the database (prtición ajax para consultar si la cuenta de usuario existe en la base de datos)
        $.ajax({
            url: './controller/login_controller.php',
            type: 'post',
            dataType: 'json',
            data: {dataLogin: dataLogin, userAccount: userAccount },
            success: (response) => {
                // function to check existence of user account  (función para comprobar existencia de la cuenta de usuario)
                if (response.data == false) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Cuenta de usuario incorrecta!! ',
                        allowOutsideClick: false
                    });
                }

                // condition to check the status of a user account (condición para comprobar el estado de una cuenta de usuario)
                if (response.status !== 1) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Cuenta de usuario SUSPENDIDA !!',
                        allowOutsideClick: false
                    });
                    return false;
                }

                // condition to check if new password is create (condición para comprobar si se crea nueva contraseña)
                if (response.fecha_ingreso == null) {
                    // function to create new password
                    return false;
                }

                Swal.fire({
                    icon: 'success',
                    title: 'Cuenta de susario correcta !!',
                    showConfirmButton: false,
                    timer: 1500
                }). then(() => {
                    windows.location.href = 'home';
                });
            }

        }).fail(() => {
            Swal.fire({
                icon: 'error',
                title: 'Sin conexión con la Base de Datos! ',
                allowOutsideClick: false
            });
        });
        $('#form-login').trigger('reset');
        $('.login-input').removeClass('focus');
        $('.login-span').removeClass('focus');

    });
}









$(document).ready(function() {
    // function for user validation
    verifyUserAccount();
});
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

// function to convert alphanumeric values to uppercase (función para convertir valores alfanuméricos a mayúscula)
function convertToUpperCase(value) {
    if (/^[a-zA-Z0-9]+$/.test(value)) {
        return value.toUpperCase();
    }
    return value;
}

// function that allow you to create a new password for the user account (función que permite crear nueva contraseña para la cuenta de usuario)
async function newPersonalPassword(userId) {
    let dataLogin = "newPassword";

    const { value: newPassword } = await Swal.fire({
        title: 'contraseña personal !!',
        customClass: {
            title: 'titulo_cambio_clave'
        },
        html:
            `<input id="onePassword" class="swal2-input" type="password" placeholder="Enter password">
            <input id="twoPassword" class="swal2-input" type="password" placeholder="Enter password again">
            <div class="text-secundary">Contraseña no superior a 10 digitos</div>`,
        focusConfirm: false,
        showCancelButton: false,
        allowOutsideClick: false,
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#2c6cff',
        preConfirm: () => {
            const onePassword = convertToUpperCase($.trim($("#onePassword").val()));
            const twoPassword = convertToUpperCase($.trim($("#twoPassword").val()));

            if (onePassword !== twoPassword) { Swal.showValidationMessage('Las passwords ingresadas no coinciden !!'); }
            
            return { onePassword, twoPassword };
        }
    });

    // continue in this section (continuar en esta sección)




}











// function to verify user account (función para verificar cuenta de usuario)
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
        if (userAccount.userName.length <= 0 || userAccount.password.length <= 0) {
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
                    console.log('cambio de clase');
                    return false;
                }

                Swal.fire({
                    icon: 'success',
                    title: 'Cuenta de susario correcta !!',
                    showConfirmButton: false,
                    timer: 1500
                }). then(() => {
                    window.location.href = 'home';
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
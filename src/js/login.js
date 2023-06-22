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

// function getPassword() {
//     return new Promise(resolve => {
//         Swal.fire({
//             title: 'Crea tu password personal !!',
//             customClass: {
//                 title: 'titulo_cambio_clave'
//             },
//             html: // check styles to square on screen (revisar estilos para cuadrar en pantalla)
//                 `<input id="onePassword" class="swal2-input" type="password" placeholder="Enter password">
//                 <input id="twoPassword" class="swal2-input" type="password" placeholder="Enter password again">
//                 <div class="text-secundary">Contraseña no superior a 10 digitos</div>`,
//             focusConfirm: false,
//             showCancelButton: false,
//             allowOutsideClick: false,
//             confirmButtonText: 'Aceptar',
//             confirmButtonColor: '#2c6cff',
//             preConfirm: () => {
//                 const onePassword = convertToUpperCase($.trim($("#onePassword").val()));
//                 const twoPassword = convertToUpperCase($.trim($("#twoPassword").val()));
    
//                 if (onePassword !== twoPassword) { 
//                     Swal.showValidationMessage('Las passwords ingresadas no coinciden !!');
//                     resolve(false); 
//                 } else if (onePassword.length <= 0 || twoPassword.length <= 0) {
//                     Swal.showValidationMessage('No pueden quedar campos vacios !!');
//                     resolve(false); 
//                 } else {
//                     resolve({ onePassword, twoPassword });
//                 }
//             }
//         });
//     })
// }

// function that allow you to create a new password for the user account (función que permite crear nueva contraseña para la cuenta de usuario)
async function newPersonalPassword(userId) {

    // refactor function to be able to exit, edit styles and general operation
    // refactorizar funcion para poder salir, editar estilos y funcionamiento general 
    let dataLogin = "newPassword";

    const { value: newPassword } = await Swal.fire({
        title: 'Crea tu password personal !!',
        customClass: {
            title: 'titulo_cambio_clave'
        },
        html: // check styles to square on screen (revisar estilos para cuadrar en pantalla)
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
            if (onePassword.length <= 0 || twoPassword.length <= 0) { Swal.showValidationMessage('No pueden quedar campos vacios !!'); }
            
            return { onePassword, twoPassword };
        }
    });

    // the id of the official is included in the created object (se incluye en el objeto creado el id del funcionario)
    newPassword.userId = userId;

    $.ajax({
        url: './controller/login_controller.php',
        type: 'post',
        dataType: 'json',
        data: {dataLogin: dataLogin, newPassword: newPassword},
        cache: false,
        success: (response) => {
            if (response === false) {
                Swal.fire({
                    icon: 'warning',
                    title: 'No fue posible crear su contraseña, vuelva a intentar !!',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
                return false;
            }

            Swal.fire({
                icon: 'success',
                title: 'Clave generada !!',
                allowOutsideClick: false,
                showConfirmButton: false,
                timer: 1500
            }).then((result) => { // check since it doesn´t work (revisar ya que no funcionar)
                if (result.isConfirmed) {
                    window.location.reload();
                }
            });
        }
    }).fail (() => {
        Swal.fire({
            icon: 'error',
            title: 'Error en el proceso, comuníquese con el administrador',
            allowOutsideClick: false
        });
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
                if (response.data === false) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Cuenta de usuario incorrecta!! ',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                    return false;
                }

                // condition to check the status of a user account (condición para comprobar el estado de una cuenta de usuario)
                if (response.status !== 1) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Cuenta suspendida !!',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                    return false;
                }

                // condition to check if new password is create (condición para comprobar si se crea nueva contraseña)
                if (response.admissionDate == null) {
                    // function to create new password
                    newPersonalPassword(response.userId);
                    return false;
                }

                Swal.fire({
                    icon: 'success',
                    title: 'Cuenta de usario correcta !!',
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
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                }
            });
        });

        // login fomr reset
        $('#form-login').trigger('reset');
        $('.login-input').removeClass('focus');
        $('.login-span').removeClass('focus');

    });
}









$(document).ready(function() {
    // function for user validation
    verifyUserAccount();
});
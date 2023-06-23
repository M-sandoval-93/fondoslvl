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

function alertPersonal(icon, title) {
    Swal.fire({
        icon: icon,
        title: title,
        allowOutsideClick: false
    });
    return false;
}

// function that allow you to create a new password for the user account (función que permite crear nueva contraseña para la cuenta de usuario)
async function newPersonalPassword(userId) {

    console.log(userId);
    return false;
    // const dataLogin = "newPassword";
    // const { value: newPassword } = await Swal.fire({
    //     title: 'Crea tu password personal !!',
    //     customClass: { title: 'titulo_cambio_clave' },
    //     html: // check styles to square on screen (revisar estilos para cuadrar en pantalla)
    //         `<input id="onePassword" class="swal2-input" type="password" placeholder="Enter password">
    //         <input id="twoPassword" class="swal2-input" type="password" placeholder="Enter password again">
    //         <div class="text-secundary">Contraseña no superior a 10 digitos</div>`,
    //     focusConfirm: false,
    //     // showCancelButton: false,
    //     allowOutsideClick: false,
    //     confirmButtonText: 'Aceptar',
    //     confirmButtonColor: '#2c6cff',
    //     preConfirm: () => {
    //         const onePassword = convertToUpperCase($.trim($("#onePassword").val()));
    //         const twoPassword = convertToUpperCase($.trim($("#twoPassword").val()));

    //         if (onePassword !== twoPassword || onePassword.length < 0) Swal.showValidationMessage('Las passwords ingresadas no coinciden !!');
    //         return { onePassword, twoPassword };
    //     }
    // });

    // // pass the user id to the constant new password (pasamos el id del usuario a la constante nueva contraseña)
    // newPassword.userId = userId;

    // $.ajax({
    //     url: './controller/login_controller.php',
    //     type: 'post',
    //     dataType: 'json',
    //     data: {dataLogin: dataLogin, newPassword: newPassword},
    //     cache: false,
    //     success: (response) => {
    //         if (response === false) {
    //             Swal.fire({
    //                 icon: 'warning',
    //                 title: 'No fue posible crear su contraseña, vuelva a intentar !!',
    //                 allowOutsideClick: false
    //             }).then((result) => {
    //                 if (result.isConfirmed) {
    //                     window.location.reload();
    //                 }
    //             });
    //             return false;
    //         }

    //         Swal.fire({
    //             icon: 'success',
    //             title: 'Clave generada !!',
    //             allowOutsideClick: false,
    //             showConfirmButton: false,
    //             timer: 1500
    //         }).then((result) => { // check since it doesn´t work (revisar ya que no funcionar)
    //             if (result.isConfirmed) {
    //                 window.location.reload();
    //             }
    //         });
    //     }
    // }).fail (() => {
    //     Swal.fire({
    //         icon: 'error',
    //         title: 'Error en el proceso, comuníquese con el administrador',
    //         allowOutsideClick: false
    //     });
    // });
}


// function to verify user account (función para verificar cuenta de usuario)
function verifyUserAccount() {
    $('#form-login').submit((e) => {
        e.preventDefault();

        // variables used in checking the user account
        const dataLogin = "login";
        const userName = convertToUpperCase($.trim($('#userName').val()));
        const password = convertToUpperCase($.trim($('#password').val()));

        if (userName.length <= 0 || password.length <= 0) throw new Info('No se permiten campos vacios !!');
        const userAccount = { userName, password };

        $.ajax({
            url: './controller/login_controller.php',
            type: 'post',
            dataType: 'json',
            data: { dataLogin: dataLogin, userAccount: userAccount }

        }).done((response) =>{
            // group of conditions to work on the response obtained (grupo de condiciones para trabajar la respuesta obtenida)
            if (response.data === false) alertPersonal('warning', 'Cuenta de usuario incorrecta !');
            if (response.status !== 1) alertPersonal('info', 'Cuenta de usuario suspendida !');
            if (response.admissionDate === null) newPersonalPassword(response.userId);

            // action if answer is true (accipon si la respuesta es verdadero)
            // Swal.fire({
            //     icon: 'success',
            //     title: 'Ingresando al sistema !!',
            //     showConfirmButton: false,
            //     timer: 1500
            // }). then(() => {
            //     window.location.href = 'home';
            // });

        }).fail (() => {
            Swal.fire({
                icon: 'error',
                title: 'Sin conexión con el sistema !',
                allowOutsideClick: false
            });

        }).always(() => {
            // login fomr reset
            $('#form-login').trigger('reset');
            $('.login-input').removeClass('focus');
            $('.login-span').removeClass('focus');
            $('#userName').focus();
        });
    });
}







// implementation of functions within the systema (imeplementación de las funciones dentro del sistema) ---------------------->

$(document).ready(function() {
    // function for user validation
    verifyUserAccount();
});
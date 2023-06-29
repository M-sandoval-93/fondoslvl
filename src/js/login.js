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



// internal functions -------------------------------------------------------------------------------------------------------->

// classes to handle exceptions (clases para manajar las expeciones)
class EmptyFields extends Error {};
class WrongUserAccount extends Error {};
class TryAgain extends Error {};

// function to convert alphanumeric values to uppercase (función para convertir valores alfanuméricos a mayúscula)
function convertToUpperCase(value) {
    if (/^[a-zA-Z0-9]+$/.test(value)) {
        return value.toUpperCase();
    }
    return value;
}

// feature to simplify the use of pop-up alerts (función para simplificar el uso de las alertas emergentes)
function alertPersonal(icon, title) {
    Swal.fire({
        icon: icon,
        title: title,
        allowOutsideClick: false
    });
}

// function that allow you to create a new password for the user account (función que permite crear nueva contraseña para la cuenta de usuario)
async function newPersonalPassword(userAccountId) {
    const dataLogin = "newPassword";
    const { value: newPassword } = await Swal.fire({
        title: 'Crea tu password personal !',
        customClass: { title: 'titleChangePassword' },
        html: `<input id="onePassword" class="swal2-input" type="password" placeholder="Enter password">
            <input id="twoPassword" class="swal2-input" type="password" placeholder="Enter password again">
            <div class="text-secundary">Contraseña no superior a 10 digitos</div>`,
        focusConfirm: false,
        showCancelButton:true,
        allowOutsideClick: false,
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#2c6cff',
        preConfirm: () => {
            const onePassword = convertToUpperCase($.trim($("#onePassword").val()));
            const twoPassword = convertToUpperCase($.trim($("#twoPassword").val()));
            const userId = userAccountId;

            if (onePassword !== twoPassword || onePassword.length < 0) Swal.showValidationMessage('Las passwords ingresadas no coinciden !!');
            return { onePassword, twoPassword, userId };
        }
    });

    // constant that contains the result of an ajax query (constante que contiene el resultado de una consulta ajax)
    const response = await $.ajax({
        url: './controller/login_controller.php',
        type: 'post',
        dataType: 'json',
        data: {dataLogin: dataLogin, newPassword: newPassword}
    });

    if (response === false) throw new TryAgain('Ocurrio un error, volver a intentar');

    Swal.fire({
        icon: 'success',
        title: 'Clave generada !!',
        allowOutsideClick: false,
        showConfirmButton: false,
        timer: 1500
    });
}

// function to verify user account (función para verificar cuenta de usuario)
function verifyUserAccount() {
    $('#form-login').submit(async (e) => {
        e.preventDefault();

        // constant used in checking the user account
        const dataLogin = "login";
        const userName = convertToUpperCase($.trim($('#userName').val()));
        const password = convertToUpperCase($.trim($('#password').val()));

        try {
            if (userName.length <= 0 || password.length <= 0) throw new EmptyFields('No se permiten campos vacios !');
            
            const userAccount = { userName, password };
            const response = await $.ajax({
                url: './controller/login_controller.php',
                type: 'post',
                dataType: 'json',
                data: { dataLogin: dataLogin, userAccount: userAccount }
            });

            // handling responses obtained in ajax query (manejo de las respuestas obtenidas en la consulta ajax)
            if (response === false) throw new WrongUserAccount('Cuenta de usuario incorrecta !');
            if (response.status !== 1) throw new UserAccounSuspended('Cuenta de usuario suspendida !');
            if (response.admissionDate === null) {
                await newPersonalPassword(response.userId);
                return false;
            }

            Swal.fire({
                icon: 'success',
                title: 'Ingresando al sistema !!',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = 'home';
            });
            
        } catch (error) {
            // catch exceptions (captura de las excepciones)
            if (error.status === 404) alertPersonal('error', 'Página no disponible !');
            if (error.status === 500) alertPersonal('error', 'Error de conexión !');
            if (error instanceof WrongUserAccount) alertPersonal('warning', error.message);
            if (error instanceof EmptyFields) alertPersonal('info', error.message);
            if (error instanceof TryAgain) alertPersonal('warning', error.message);

        } finally {
            // reset login form
            $('#form-login').trigger('reset');
            $('.login-input').removeClass('focus');
            $('.login-span').removeClass('focus');
            $('#password').focusout();
        }
    });
}



// implementation of functions within the systema (imeplementación de las funciones dentro del sistema) ---------------------->
$(document).ready(function() {
    // function for user validation (función para validar usuario)
    verifyUserAccount();
});
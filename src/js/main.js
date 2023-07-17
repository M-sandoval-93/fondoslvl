// constant to handle DOM elements
// constantes para manejar elementos del DOM
const btnAside = document.getElementById('btnToggle');
const mainContent = document.querySelector('.main__content');
const darkMode = document.querySelector('.nav__darkMode');
const btnSalir = document.getElementById('btnExit')

// event to modify the size of the aside and give effect to the toggle button
// evento para modificar el tamaño del aside y dar efecto al boton toggle
btnAside.addEventListener('click', () => {
    mainContent.classList.toggle('reduce');
    btnAside.classList.toggle('close');
});

// event to switch from normal mode to dark mode of the page layout
// evento para cambiar de modo normal a modo oscuro del diseño de la página
darkMode.addEventListener('click', () => {
    // assing the new root colors
    // asignar la nueva root de colores
    document.body.classList.toggle('dark-mode-variables');

    // add active class in toggle mode for dark mode button 
    // agregación de la clase active en modo toggle para el boton modo oscuro
    darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
    darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
});

// event to ask if you want to close the current session 
// evento para preguntar si desea cerrar la sesión actual
btnSalir.addEventListener('click', () => {
    Swal.fire({
        title: 'Desea cerrar la sesión?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'Cancelar'
    }).then(result => {
        if (result.isConfirmed) {
            window.location.href = './controller/exit_controller.php';
        }
    });
});




// manejo del width de la pantalla mediante javascript

// function handleResize() {
//     const screenWidth = window.innerWidth;

//     if (screenWidth <= 1024) {
//         // mainContent.classList.add('reduce');
//         // btnAside.classList.add('close');
//         console.log('asignar clases');
//     } else {
//         // mainContent.classList.remove('reduce');
//         // btnAside.classList.remove('close');
//         console.log('quitar clases');
//     }
// }

// window.addEventListener('resize', handleResize);
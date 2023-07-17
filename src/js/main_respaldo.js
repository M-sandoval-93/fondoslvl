// firts option, keep saved ====================

// const listElements = document.querySelectorAll('.list__button--click');

// listElements.forEach(listElement => {
//     listElement.addEventListener('click', () => {
//         // variables to handle dropdown list
//         let height = 0;
//         let menu = listElement.nextElementSibling;

//         listElements.forEach(element => {
//             if (element !== listElement) {
//                 element.classList.remove('modifyArrow');
//                 element.nextElementSibling.style.height = `${height}px`;
//             }
//         });

//         listElement.classList.toggle('modifyArrow');

//         if (menu.clientHeight === 0) height = menu.scrollHeight;

//         menu.style.height = `${height}px`;
//     });
// });


// second Option, working in de module

const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('btnClose');

const darkMode = document.querySelector('.dark-mode');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

darkMode.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode-variable');
    darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
    darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
});




Orders.forEach(order => {
    const tr = document.createElement('tr');
    const trContent = `
        <td>${order.productName}</td>
        <td>${order.productNumber}</td>
        <td>${order.paymentStatus}</td>
        <td class="${order.status === 'Declined' ? 'danger' :
                     order.status === 'Pending' ? 'warning' : 'primary'}">${order.status}</td>
        <td class="primary">Details</td>
    `;

    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr); 
});
const listElements = document.querySelectorAll('.list__button--click');

listElements.forEach(listElement => {
    listElement.addEventListener('click', () => {
        // variables to handle dropdown list
        let height = 0;
        let menu = listElement.nextElementSibling;

        listElements.forEach(element => {
            if (element !== listElement) {
                element.classList.remove('modifyArrow');
                element.nextElementSibling.style.height = `${height}px`;
            }
        });

        listElement.classList.toggle('modifyArrow');

        if (menu.clientHeight === 0) height = menu.scrollHeight;

        menu.style.height = `${height}px`;
    });
});
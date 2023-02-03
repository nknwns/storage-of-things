import './bootstrap';

const initializeAside = () => {
    const submenus = document.querySelectorAll('.aside__submenu');

    submenus.forEach((element, key) => {
        element.dataset.height = 1;
        
        element.previousSibling.addEventListener('click', event => {
            element.previousSibling.classList.toggle('active');
            element.classList.toggle('active');
        });
    });
}

const aside = document.querySelector('.aside');

if (aside) initializeAside();
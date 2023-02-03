const initializeAside = () => {
    const submenus = document.querySelectorAll('.aside__submenu');

    submenus.forEach((element, key) => {
        element.style.height = element.clientHeight + 'px';
        element.classList.add('hidden');

        element.previousSibling.previousSibling.addEventListener('click', event => {
            event.preventDefault();
            element.previousSibling.previousSibling.classList.toggle('active');
            element.classList.toggle('hidden');
        });
    });
}

const initializeTopbar = () => {
    const account = document.querySelector('.topbar__account');
    account.classList.add('hidden');

    const accountCloseButton = document.querySelector('.account__close');
    accountCloseButton.addEventListener('click', event => {
        event.preventDefault();
        account.classList.add('hidden');
    })

    const button = document.querySelector('.topbar__button');
    button.addEventListener('click', event => {
        event.preventDefault();
        account.classList.remove('hidden');
    });
}

const initializeDropdowns = (dropdowns) => {
    dropdowns.forEach(element => {
        const children = element.children;
        children[0].addEventListener('click', event => {
            event.preventDefault();
            children[1].classList.toggle('active');
        });
    });
}

const aside = document.querySelector('.aside');
const topbar = document.querySelector('.topbar');
const dropdowns = document.querySelectorAll('.dropdown');

if (aside) initializeAside();
if (topbar) initializeTopbar();
if (dropdowns) initializeDropdowns(dropdowns);

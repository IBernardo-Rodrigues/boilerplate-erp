import './bootstrap';

const $sidebar = document.querySelector('.sidebar');
const $sidebarMenuToggle = document.querySelector('.menu-toggler');
const $sidebarMenu = document.querySelector('.menu');
const $btnOpenModal = document.querySelectorAll('.btn-open-modal'); 
const $menuHamburger = document.querySelector('.menu-hamburger');

$sidebarMenuToggle.addEventListener('click', toggleMenu);
$menuHamburger.addEventListener('click', toggleMenu);

$btnOpenModal.forEach(element => {
  element.addEventListener('click', () => {
    const route = element.dataset.route;

    passRouteToModal(route);
  });
});

function toggleMenu() {
  $sidebar.classList.toggle('is-expanded');
}

function currentPageMark() {
  const menuChilren = $sidebarMenu.children;

  for (let child of menuChilren) {
    if (child.href == location.href) {
      child.classList.add('active-page');
    }
  }
}

function passRouteToModal(route) {
  const $modalForm = document.querySelector('.modal form');

  $modalForm.action = route;
}

function init() {
  currentPageMark();
}

init();
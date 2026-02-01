// ハンバーガーメニュー
function slideMenu() {
  const hamburgerButton = document.getElementById('hamburgerButton');
  const blockSideMenu = document.getElementById('blockSideMenu');
  const htmlElement = document.querySelector('html');
  const bodyElement = document.querySelector('body');
  const mainElement = document.querySelector('main');

  hamburgerButton.classList.toggle('active');
  blockSideMenu.classList.toggle('active');

  if (blockSideMenu.classList.contains('active')) {
    htmlElement.style.overflow = 'hidden';
    htmlElement.style.height = '100dvh';
    bodyElement.style.overflow = 'hidden';
    mainElement.classList.add('is-active');
  } else {
    htmlElement.style.overflow = '';
    htmlElement.style.height = '';
    bodyElement.style.overflow = '';
    mainElement.classList.remove('is-active');
  }
}

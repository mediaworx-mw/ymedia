import toggleClass from '../utils/toggle';

const Sidebar = () => {

  if(document.body.contains(document.querySelector('.sidebar'))){
    const $sidebarContent = document.querySelector('.sidebar__content');
    const $handle = document.querySelector ('.sidebar__handle');

    $handle.addEventListener('click', () => {

      toggleClass($sidebarContent, 'sidebar__content--visible');
      toggleClass($handle, 'sidebar__handle--open');
      console.log('clicked');

    });

  }
}

export default Sidebar;

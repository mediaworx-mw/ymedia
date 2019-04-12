import toggleClass from '../utils/toggle';
import flatpickr from "flatpickr";
import { Spanish } from "flatpickr/dist/l10n/es.js"

const Sidebar = () => {

  if(document.body.contains(document.querySelector('.sidebar'))){
    const $sidebarContent = document.querySelector('.sidebar__content');
    const $handle = document.querySelector ('.sidebar__handle');
    const $calendar = document.querySelector('.calendar');

    $handle.addEventListener('click', () => {
      toggleClass($sidebarContent, 'sidebar__content--visible');
      toggleClass($handle, 'sidebar__handle--open');
      console.log('clicked');
    });

    const fp = flatpickr($calendar, {
      enableTime: true,
      dateFormat: "Y-m-d",
      inline: true,
      "locale": Spanish,
      onChange: function(selectedDates, dateStr, instance){

        window.location='https://staging.ymedia.es/resultados/?date='+dateStr;
        //window.location='http://localhost:8888/ymedia/resultados/?date='+dateStr;
        //console.log(dateStr);
      }
    });

    fp.open();

  }
}

export default Sidebar;

import toggleClass from '../utils/toggle';
import flatpickr from "flatpickr";
import { Spanish } from "flatpickr/dist/l10n/es.js"

const Topbar = () => {

  if(document.body.contains(document.querySelector('.topbar'))){
    const $topbar = document.querySelector('.topbar');
    const $calendar = document.querySelector('.calendar');
    const $calendarWrapper = document.querySelector('.topbar__calendar-wrapper');
    const $calendarButton = document.querySelector('.topbar__calendar-button');
    $calendarButton.addEventListener('click', () => {
      toggleClass( $calendarWrapper, 'visible');
    });

    const fp = flatpickr($calendar, {
      enableTime: true,
      dateFormat: "Y-m-d",
      inline: true,
      "locale": Spanish,
      onChange: function(selectedDates, dateStr, instance){

      window.location='https://staging.ymedia.es/?s&date='+dateStr;
      //window.location='http://localhost:8888/ymedia/?s&date='+dateStr;
      }
    });

    fp.open();

  }
}

export default Topbar;

import scroll from '../utils/scroll';

const Form = () => {
  document.addEventListener( 'wpcf7submit', function( event ) {
    var notValid = document.querySelectorAll('.wpcf7-not-valid-tip');
    if (notValid) {
      var rect = notValid[0].getBoundingClientRect();
      var y = rect.top + window.scrollY - 140;
      scroll( y, 300, 'linear');
    }
  }, false );
}

export default Form;
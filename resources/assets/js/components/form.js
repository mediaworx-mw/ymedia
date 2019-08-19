import scroll from '../utils/scroll';

const Form = () => {
  document.addEventListener( 'wpcf7submit', function( event ) {
    var notValid = document.querySelectorAll('.wpcf7-not-valid-tip');
    if (notValid) scroll( notValid[0], 300, 'linear');
  }, false );
}

export default Form;
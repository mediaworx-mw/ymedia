import scroll from '../utils/scroll';

const Form = () => {
  const container = document.querySelector(".wpcf7-response-output");
  const mutationConfig = {
    attributes: true,
    childList: true,
    subtree: true,
    characterData: true,
    characterDataOldValue: true
  };

  var onMutate = function(mutationsList) {
    mutationsList.forEach(mutation => {
      if ( container.classList.contains('wpcf7-validation-errors') ){
        var notValid = document.querySelectorAll('.wpcf7-not-valid-tip');
        const firstError = notValid[0]
        scroll(firstError, 300, 'linear');
      }
    });

  };

  var observer = new MutationObserver(onMutate);
  observer.observe(container, mutationConfig);

}

export default Form;
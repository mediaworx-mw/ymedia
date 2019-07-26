import $ from 'jquery';

const Feedly = () => {

  $.ajax({
    url: 'https://cloud.feedly.com/v3/profile',
    beforeSend: function(xhr) {
      xhr.setRequestHeader("Authorization", "A0DsMtlwhfSVW8iEjokVFImNd8T9ZZYJGMNDfcquYhdYL56JgeHcbQtsc6d5A9u0yHWMvPkq2Iwfm185mXSMP-_C7_BC4wtI5L_gttRa1zEN5nP0JGimTfF6h2ucW7DquFtknA_D1v1Zdc6qfJyXv5OH3GZbHBwAL5OeNPrTeCDKjH8PaCvtcgfE5DLEx1H-dGYQH_3FpE4YfIlTOJSfXL0WduO2KJQ3f3F7FBvujBdryb2Mc00zJ9lckVA5pbUG0nd_yfo5BG20Q4tiZGn9:feedlydev")
    }, success: function(data){
      console.log(data);
        //process the JSON data etc
    }
})

}

export default Feedly;

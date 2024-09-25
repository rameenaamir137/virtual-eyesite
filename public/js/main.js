document.addEventListener('DOMContentLoaded', function() {
    var linkElement = document.querySelector('.page-link');
    linkElement.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default link behavior
      var targetUrl = linkElement.getAttribute('href');
      animatePurpleSlide(targetUrl);
    });
});
  

function animatePurpleSlide(url) {
    var slideElement = document.createElement('div');
    slideElement.className = 'purple-slide';
    document.body.appendChild(slideElement);
  
    // Perform AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
  
    // Create a promise for the AJAX request
    var ajaxPromise = new Promise(function(resolve, reject) {
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            resolve(xhr.responseText); // Resolve the promise with the response
          } else {
            reject(Error(xhr.statusText)); // Reject the promise with an error
          }
        }
      };
    });
  
    // Start the AJAX request
    //xhr.send();
  
    // Apply the slide animation after the AJAX request is completed
    ajaxPromise.then(function(responseHTML) {
      var parser = new DOMParser();
      var responseDoc = parser.parseFromString(responseHTML, 'text/html');
      var newContent = responseDoc.querySelector('.content');
  
      // Replace content on the current page with the fetched content
      var existingContent = document.querySelector('.content');
      existingContent.innerHTML = newContent.innerHTML;
  
      // Add the slide element to the new page's body
      var newPageSlideElement = document.createElement('div');
      newPageSlideElement.className = 'purple-slide';
      document.body.appendChild(newPageSlideElement);
  
      // Start the slide animation
  
      // Delay navigation to the new page until the animation completes
      setTimeout(function() {
        // Play the slide back animation on the new page's slide element
        newPageSlideElement.style.animationName = 'slide-back';
        newPageSlideElement.style.animationDuration = '1s';
        newPageSlideElement.style.animationTimingFunction = 'ease-in-out';
        
        newPageSlideElement.addEventListener('animationend', function() {
          newPageSlideElement.parentNode.removeChild(newPageSlideElement);
          // Navigate to the new page
          window.location.href = url;
        });
      }, 10000); // Adjust the delay time according to your animation duration
    }).catch(function(error) {
      console.error('An error occurred during the AJAX request:', error);
    });
  }
  

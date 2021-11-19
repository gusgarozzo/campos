document.addEventListener("DOMContentLoaded", function(){
    // add padding top to show content behind navbar
    navbar_height = document.querySelector('.navbar').offsetHeight;
    document.body.style.paddingTop = navbar_height + 'px';
  }); 
  // DOMContentLoaded  end
  
  
  document.addEventListener("DOMContentLoaded", function(){
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
          document.getElementById('thead').classList.add('fixed-top');
          // add padding top to show content behind navbar
          navbar_height = document.querySelector('.table').offsetHeight;
          document.body.style.paddingTop = navbar_height + 'px';
        } else {
          document.getElementById('thead').classList.remove('fixed-top');
           // remove padding top from body
          document.body.style.paddingTop = '0';
        } 
    });
  });
  // DOMContentLoaded  end
  
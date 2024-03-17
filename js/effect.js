
var picture = document.getElementById('paralax-picture');


;(function(){

  var throttle = function(type, name, obj){
    var obj = obj || window;
    var running = false;
    var func = function(){
      if (running){ return; }
      running = true;
      requestAnimationFrame(function(){
        obj.dispatchEvent(new CustomEvent(name));
        running = false;
      });
    };
    obj.addEventListener(type, func);
  };

  throttle("scroll", "optimizedScroll");
})();


// wip 
// needing to change the params for mobile / croped version of the website
// some offset or sizing issue ? 
// depending on page size how fast the scroll is should change
// feels not quite right

window.addEventListener("optimizedScroll", function(){
    picture.style.backgroundPositionY = (window.pageYOffset * 0.05) + "%";
})

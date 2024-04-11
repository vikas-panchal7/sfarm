function activeclass(e) {
  var elems = document.querySelectorAll(".active");
  [].forEach.call(elems, function(el) {
    el.classList.remove("active");
  });
  e.target.className = "active";
}

// $(document).ready(function () {
//     $('.nav li a').click(function(e) {
      
//       $('.nav li a.active').removeClass('active');
      
//       //var $parent = $(this).parent();
//       $(this).addClass('active');
//       e.preventDefault();
//     });
// });
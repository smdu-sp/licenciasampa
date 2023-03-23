
// Animação dos links na página "Mapa-do-Site"
jQuery(document).ready(function() {
    jQuery('li ').hover(function() {
      jQuery(this).stop().animate({ paddingTop: "-20px" }, 100);
    }, function() {
      jQuery(this).stop().animate({ paddingTop: "20px" }, 100);
    });
  });
 
// Mudança de tema, para acessibilidade
  function changeTheme() {
    var body = document.querySelector('body');
    body.classList.toggle('dark-mode');
  }
  
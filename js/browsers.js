var ua = navigator.userAgent.toLowerCase(); 
if (ua.indexOf('safari') != -1) { 
  if (ua.indexOf('chrome') > -1) {
    // Chrome
  } else {
    // Safari 
    var screen = window.innerWidth; 
    document.getElementById("safari-search").style.marginTop = '-2rem'; 
  }
}
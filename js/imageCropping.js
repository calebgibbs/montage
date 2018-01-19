$(function() {
  var basic = $('.mian-cropper').croppie({
    viewport: { width: 770, height: 440 },
    boundary: { width: 780, height: 450 }, 
    showZoomer: false
  });
 
  //get uploaded image and pass it as the url 


  basic.croppie('bind', {
    url: 'https://i.imgur.com/xD9rzSt.jpg', //this is the url
    points: [77, 469, 280, 739]
  });
});
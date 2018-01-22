var basic = $('#main-cropper').croppie({
    viewport: { width: 770, height: 440 },
    boundary: { width: 800, height: 500 },
    showZoomer: true
});

function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#main-cropper').croppie('bind', {
        url: e.target.result
      });
      $('.actionDone').toggle();
      $('.actionUpload').toggle();
    }

    reader.readAsDataURL(input.files[0]);
  }
} 

$('.noSubmit').click(function(e){
  e.preventDefault(); 
  console.log('prevent');
});

$('.actionUpload input').on('change', function () { readFile(this); });
$('.actionDone').on('click', function(){
  $('.actionDone').toggle(); 
  $('.actionCancel').toggle();
  $('.actionUpload').toggle(); 


})
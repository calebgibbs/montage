function readFile(o){if(o.files&&o.files[0]){var e=new FileReader;e.onload=function(o){$("#main-cropper").croppie("bind",{url:o.target.result}),$(".actionDone").toggle(),$(".actionUpload").toggle()},e.readAsDataURL(o.files[0])}}var basic=$("#main-cropper").croppie({viewport:{width:770,height:440},boundary:{width:800,height:500},showZoomer:!0});$(".noSubmit").click(function(o){o.preventDefault(),console.log("prevent")}),$(".actionUpload input").on("change",function(){readFile(this)}),$(".actionDone").on("click",function(){$(".actionDone").toggle(),$(".actionCancel").toggle(),$(".actionUpload").toggle()});
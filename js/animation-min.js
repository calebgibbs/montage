$(document).ready(function(){$(".fav-tog").click(function(){$("#favourites").addClass("open-fav"),$("#main-page").addClass("pause-page"),$("#overlay").addClass("open-fav"),$("#overlay").addClass("darken")}),$(".body").click(function(){$("#main-page").removeClass("pause-page"),$("#favourites").removeClass("open-fav"),$("#overlay").removeClass("open-fav"),$("#overlay").removeClass("darken")}),$("#close-fav").click(function(){$("#main-page").removeClass("pause-page"),$("#favourites").removeClass("open-fav"),$("#overlay").removeClass("open-fav"),$("#overlay").removeClass("darken")}),$(".product-data").click(function(){return window.location=$(this).attr("href"),!1}),$(".box-inner").click(function(){return window.location=$(this).attr("href"),!1}),$(".diamond").click(function(){return window.location=$(this).attr("href"),!1}),$(".homeLink").click(function(){return window.location=$(this).attr("href"),!1}),$(".mobile-H-link").click(function(){return window.location=$(this).attr("href"),!1}),$(".port-link").click(function(){return window.location=$(this).attr("href"),!1}),$(".mobile-prod-box").click(function(){return window.location=$(this).attr("href"),!1}),$(".openSearch").click(function(){$(".search").toggleClass("showSearch-d-sm")}),$(".closeModal").click(function(){$(".modal").removeClass("openM"),$("#sus-page").removeClass("bgM")}),$(".material").on("click",function(){$("#material-modal").addClass("openM"),$("#sus-page").addClass("bgM")}),$(".smart").on("click",function(){$("#smart-modal").addClass("openM"),$("#sus-page").addClass("bgM")}),$(".recycle").on("click",function(){$("#recycle-modal").addClass("openM"),$("#sus-page").addClass("bgM")}),$(document).on("click","#delPrompt",function(o){o.preventDefault(),$(".delButton2").css("display","inline-block")}),$(document).on("click","#noDel",function(o){o.preventDefault(),$(".delButton2").css("display","none")}),$(".tri").each(function(o){setTimeout(function(){$(".tri").eq(o).addClass("show")},350*o),$(".dwnimg").removeClass("show")})});
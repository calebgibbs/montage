$(document).ready(function(){$("img").on("dragstart",function(l){l.preventDefault()}),$(".drop-trigger").hover(function(){$("#drop-down").addClass("show-menu")}),$(".menu-item").hover(function(){$("#drop-down").removeClass("show-menu")}),$(".body").hover(function(){$("#drop-down").removeClass("show-menu")}),$(".nav-icon").on("click",function(){$(this).toggleClass("active"),$("#menu").toggleClass("menu-active")}),$(".search-button").click(function(){$("#search-feild").focus(),$("..main-menu").toggleClass("hide")}),$(".more-items").click(function(l){l.preventDefault(),$(".pro-arrow").toggleClass("flip"),$("#drop-down").toggleClass("show")}),$(".list-head1").click(function(l){l.preventDefault(),$(".list-head1").toggleClass("flip"),$(".list-body1").toggleClass("show")}),$(".list-head2").click(function(l){l.preventDefault(),$(".list-head2").toggleClass("flip"),$(".list-body2").toggleClass("show")}),$(".list-head3").click(function(l){l.preventDefault(),$(".list-head3").toggleClass("flip"),$(".list-body3").toggleClass("show")}),$(".list-head4").click(function(l){l.preventDefault(),$(".list-head4").toggleClass("flip"),$(".list-body4").toggleClass("show")}),$(".list-head5").click(function(l){l.preventDefault(),$(".list-head5").toggleClass("flip"),$(".list-body5").toggleClass("show")}),$(".list-head6").click(function(l){l.preventDefault(),$(".list-head6").toggleClass("flip"),$(".list-body6").toggleClass("show")}),$(".list-head7").click(function(l){l.preventDefault(),$(".list-head7").toggleClass("flip"),$(".list-body7").toggleClass("show")}),$(".list-head8").click(function(l){l.preventDefault(),$(".list-head8").toggleClass("flip"),$(".list-body8").toggleClass("show")}),$(".sub-list").click(function(l){l.preventDefault(),$(".sub-list").next("span").addClass("show")})});
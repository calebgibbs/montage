$(document).ready(function(){$("img").on("dragstart",function(o){o.preventDefault()}),$(".drop-trigger").hover(function(){$("#drop-down").addClass("show-menu")}),$(".menu-item").hover(function(){$("#drop-down").removeClass("show-menu")}),$(".body").hover(function(){$("#drop-down").removeClass("show-menu")}),$(".nav-icon").on("click",function(){$(this).toggleClass("active"),$("#menu").toggleClass("menu-active")}),$(".search-button").click(function(){$("#search-feild").focus()})});
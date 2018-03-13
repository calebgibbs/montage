$(document).ready(function(){var e=!1,s=!1,a=!1,r=!1,t=!1,n=!1,l=!1;$("#MAname").keyup(function(){var s=$(this).val(),a=/^[A-Za-z '.]+$/;return $("#MAaccountMsg").empty(),$("#MAname").removeClass("inputError"),0===$(this).val().trim().length?(e=!1,$("#MAaccountMsg").removeClass("success").addClass("error").append("This is required"),void $("#MAname").removeClass("inputSuccess").addClass("inputError")):$(this).val().trim().length>75?(e=!1,$("#MAaccountMsg").removeClass("success").addClass("error").append("Name is too long"),void $("#MAname").removeClass("inputSuccess").addClass("inputError")):a.test($(this).val())?void(e=!0):(e=!1,$("#MAaccountMsg").removeClass("success").addClass("error").append("Please enter a valid name"),void $("#MAname").removeClass("inputSuccess").addClass("inputError"))}),$(document).on("click","#nameUpdate",function(s){s.preventDefault();var a=$(this).val(),r=$("#MAname").val();if(!0===e){var t={name:r,id:a};$.ajax({type:"post",url:"app/ajax/AccountController.php",data:t,success:function(e){"success"===e&&($("#nameUpdate").empty().append("Updated!").css("background","#5cb85c"),$("#MAname").removeClass("inputError").addClass("inputSuccess"))}})}}),$("#MAemail").keyup(function(){var e=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;if($("#MAemailMsg").empty(),$("#MAemail").removeClass("inputError"),0===$(this).val().trim().length)$("#MAemail").removeClass("inputSuccess").addClass("inputError"),$("#MAemailMsg").removeClass("success").addClass("error").append("This feild is required"),s=!1;else if($(this).val().trim().length<6)$("#MAemail").removeClass("inputSuccess").addClass("inputError"),$("#MAemailMsg").removeClass("success").addClass("error").append("Please enter a valid email address"),s=!1;else if(e.test($(this).val()))if($(this).val().trim().length>255)$("#MAemail").removeClass("inputSuccess").addClass("inputError"),$("#MAemailMsg").removeClass("success").addClass("error").append("Email is too long"),s=!1;else{var a=$("#MAemail").val().trim(),r={testEmail:a};$.ajax({type:"post",url:"app/ajax/AccountController.php",data:r,success:function(e){"invalid"===e?($("#MAemail").removeClass("inputSuccess").addClass("inputError"),$("#MAemailMsg").removeClass("success").addClass("error").append("Email already exists"),s=!1):"valid"===e?s=!0:$("#MAemailMsg").removeClass("success").addClass("error").append("Unable to access database. Please try later")}})}else $("#MAemail").removeClass("inputSuccess").addClass("inputError"),$("#MAemailMsg").removeClass("success").addClass("error").append("Please enter a valid email address"),s=!1}),$(document).on("click","#emailUpdate",function(e){e.preventDefault();var a=$(this).val(),r=$("#MAemail").val();if(!0===s){var t={newEmail:r,id:a};$.ajax({type:"post",url:"app/ajax/AccountController.php",data:t,success:function(e){"updateSuccess"===e?($("#MAemailMsg").empty(),$("#MAemail").removeClass("inputError").addClass("inputSuccess"),$("#emailUpdate").empty().append("Updated!").css("background","#5cb85c")):"something went wrong"===e&&$("#MAemailMsg").removeClass("success").addClass("error").append("Something went wrong")}})}}),$("#MAcompany").keyup(function(){$("#MAcompanyMsg").empty(),$("#MAcompany").removeClass("inputError"),0===$(this).val().trim().length?($("#MAcompanyMsg").removeClass("success").addClass("error").append("This feild is required"),$("#MAcompany").removeClass("inputSuccess").addClass("inputError"),a=!1):$(this).val().trim().length>80?($("#MAcompanyMsg").removeClass("success").addClass("error").append("Company name is too long"),$("#MAcompany").removeClass("inputSuccess").addClass("inputError"),a=!1):($("#MAcompanyMsg").empty(),$("#MAcompany").removeClass("inputError"),a=!0)}),$(document).on("click","#companyUpdate",function(e){e.preventDefault();var s=$("#MAcompany").val(),r=$("#companyUpdate").val();if(!0===a){var t={company:s,id:r};$.ajax({type:"post",url:"app/ajax/AccountController.php",data:t,success:function(e){"updateSuccess"===e?($("#MAcompany").removeClass("inputError").addClass("inputSuccess"),$("#companyUpdate").empty().append("Updated!").css("background","#5cb85c")):($("#MAcompany").removeClass("inputError").removeClass("inputSuccess"),$("#MAcompanyMsg").removeClass("success").addClass("error").append("Something went wrong. Please try later"))}})}}),$(document).on("click","#elistUn",function(e){e.preventDefault();var s="no",a=$("#elistUn").val(),r={data:"no",id:a};$.ajax({type:"post",url:"app/ajax/AccountController.php",data:r,success:function(e){"success"===e?$("#elistUn").empty().append("Unsubscribed!").css("color","#5cb85c"):console.log(e)}})}),$(document).on("click","#elistSub",function(e){e.preventDefault();var s="yes",a=$("#elistSub").val(),r={data:s,id:a};$.ajax({type:"post",url:"app/ajax/AccountController.php",data:r,success:function(e){"success"===e?$("#elistSub").empty().append("Subscribed!").css("color","#5cb85c"):console.log(e)}})}),$("#MAcurrentPwd").blur(function(){$("#MAcurrentpwdMsg").empty(),$("#MAcurrentPwd").removeClass("inputError");var e=$("#MAcurrentPwd").val(),s=$("#changePwdTrig").val();if(0===$(this).val().length)$("#MAcurrentpwdMsg").append("This feild is required"),$("#MAcurrentPwd").removeClass("inputSuccess").addClass("inputError"),r=!1;else if($(this).val().length<8)$("#MAcurrentpwdMsg").append("Please enter a valid password"),$("#MAcurrentPwd").removeClass("inputSuccess").addClass("inputError"),r=!1;else{var a={cPwd:e,id:s};$.ajax({type:"post",url:"app/ajax/AccountController.php",data:a,success:function(e){"passwordSuccess"===e?($("#MAcurrentpwdMsg").empty(),$("#MAcurrentPwd").removeClass("inputError").addClass("inputSuccess"),r=!0):($("#MAcurrentpwdMsg").append("Please enter a valid password"),$("#MAcurrentPwd").removeClass("inputSuccess").addClass("inputError"),r=!1)}})}}),$("#MAnewPwd").blur(function(){$("#MAnewPwd").removeClass("inputError"),$("#MAnewpwdMsg").empty(),0===$(this).val().length?($("#MAnewPwd").addClass("inputError").removeClass("inputSuccess"),$("#MAnewpwdMsg").append("This feild is required"),t=!1):$(this).val().length<8?($("#MAnewPwd").addClass("inputError").removeClass("inputSuccess"),$("#MAnewpwdMsg").append("Password is too short"),t=!1):($("#MAnewPwd").removeClass("inputError").addClass("inputSuccess"),$("#MAnewpwdMsg").empty(),t=!0)}),$("#MArepeatPwd").blur(function(){var e=$("#MAnewPwd").val();$("#MArepeatPwd").removeClass("inputError"),$("#MArepeatpwdMsg").empty(),0===$(this).val().length?($("#MArepeatPwd").addClass("inputError").removeClass("inputSuccess"),$("#MArepeatpwdMsg").append("This feild is required"),n=!1):e!=$(this).val()?($("#MArepeatPwd").addClass("inputError").removeClass("inputSuccess"),$("#MArepeatpwdMsg").append("Passwords do not match"),n=!1):e===$(this).val()&&($("#MArepeatPwd").addClass("inputSuccess").removeClass("inputError"),$("#MArepeatpwdMsg").empty(),n=!0)}),$(document).on("click","#pwdUpdate",function(e){if(e.preventDefault(),!0===r&&!0===t&&!0===n){var s=$("#MAnewPwd").val(),a=$("#pwdUpdate").val(),l={uPwd:s,id:a};$.ajax({type:"post",url:"app/ajax/AccountController.php",data:l,success:function(e){"success"===e&&($("#MAcurrentPwd").empty(),$("#MAnewPwd").empty(),$("#MArepeatPwd").empty(),$("#pwdUpdate").empty().append("Updated!").css("background","#5cb85c"))}})}}),$(document).on("click","#delAccount",function(e){$("#delPinput").toggleClass("view"),$("#delAccount").toggleClass("error")}),$("#DelaccPwd").keyup(function(){if($("#DelaccPwd").removeClass("inputError"),$("#delConfirm").removeClass("view"),$(this).val().length<8)l=!1,$("#DelaccPwd").addClass("inputError"),$("#delConfirm").removeClass("view");else{var e=$("#DelaccPwd").val(),s=$("#delAccount").val(),a={delP:e,id:s};$.ajax({type:"post",url:"app/ajax/AccountController.php",data:a,success:function(e){"passwordSuccess"===e?($("#delConfirm").addClass("view"),$("#DelaccPwd").removeClass("inputError"),l=!0):($("#delConfirm").removeClass("view"),$("#DelaccPwd").addClass("inputError"),l=!1)}})}}),$(document).on("click","#delConfirm",function(e){if(e.preventDefault(),!0===l){var s=$("#delAccount").val(),a={delId:s};$.ajax({type:"post",url:"app/ajax/AccountController.php",data:a,success:function(e){"success"===e?window.location.href="index.php?page=logout":console.log("something went wrong")}})}})});
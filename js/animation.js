$(document).ready(function(){
    $('.fav-tog').click(function(){
        $('#favourites').addClass('open-fav'); 
        $('#main-page').addClass('pause-page');
        $('#overlay').addClass('open-fav'); 
        $('#overlay').addClass('darken');
    }); 
    $('.body').click(function(){
        $('#main-page').removeClass('pause-page');
        $('#favourites').removeClass('open-fav');
        $('#overlay').removeClass('open-fav');
        $('#overlay').removeClass('darken');
    });
    $('#close-fav').click(function(){
        $('#main-page').removeClass('pause-page');
        $('#favourites').removeClass('open-fav');
        $('#overlay').removeClass('open-fav');
        $('#overlay').removeClass('darken'); 
    }); 
    $('.product-data').click(function(){
        window.location = $(this).attr('href');
        return false;
    }); 
    $('.box-inner').click(function(){
        window.location = $(this).attr('href');
        return false;
    });
    $('.diamond .hover-over').click(function(){
        window.location = $(this).attr('href');
        return false;
    }); 
    $('.homeLink').click(function(){
        window.location = $(this).attr('href');
        return false;
    }); 
    $('.subcat_link').click(function(){
        window.location = $(this).attr('href');
        return false;
    }); 
    $('.mobile-H-link').click(function(){
        window.location = $(this).attr('href');
        return false;
    }); 
    $('.port-link').click(function(){
        window.location = $(this).attr('href');
        return false;
    }); 
    $('.mobile-prod-box').click(function(){
        window.location = $(this).attr('href');
        return false;
    });  
    $('.openSearch').click(function(){
        $('.search').toggleClass('showSearch-d-sm'); 
    }); 
    $('.closeModal').click(function(){
        $('.modal').removeClass('openM'); 
        $('#sus-page').removeClass('bgM');
    });
    $('.material').on('click', function(){
        $('#material-modal').addClass('openM'); 
        $('#sus-page').addClass('bgM');  
    });
    $('.smart').on('click', function(){
        $('#smart-modal').addClass('openM'); 
        $('#sus-page').addClass('bgM');  
    });
    $('.recycle').on('click', function(){
        $('#recycle-modal').addClass('openM'); 
        $('#sus-page').addClass('bgM');  
    });
    $('.experience').on('click', function(){
        $('#experience-modal').addClass('openM'); 
        $('#sus-page').addClass('bgM');  
    });
    $('.journey').on('click', function(){
        $('#journey-modal').addClass('openM'); 
        $('#sus-page').addClass('bgM');  
    });
    $('.history').on('click', function(){
        $('#history-modal').addClass('openM'); 
        $('#sus-page').addClass('bgM');  
    });  
    $('.m-material-art-trig').click(function(){
        $('.m-material-art').slideToggle();
        $('.m-smart-art').slideUp();
        $('.m-recycle-art').slideUp();
    });
    $('.m-smart-art-trig').click(function(){
        $('.m-smart-art').slideToggle();
        $('.m-material-art').slideUp();
        $('.m-recycle-art').slideUp();
    }); 
    $('.m-recycle-art-trig').click(function(){
        $('.m-recycle-art').slideToggle();
        $('.m-material-art').slideUp();
        $('.m-smart-art').slideUp();
    }); 
    $('.mobile-culture-art-trig').click(function(){
        $('.mobile-culture-art').slideToggle();
        $('.mobile-journey-art').slideUp();
         $('.mobile-history-art').slideUp();
    }); 
    $('.mobile-journey-art-trig').click(function(){
        $('.mobile-journey-art').slideToggle();
        $('.mobile-culture-art').slideUp(); 
        $('.mobile-history-art').slideUp(); 
    }); 
    $('.mobile-history-art-trig').click(function(){
        $('.mobile-history-art').slideToggle();
        $('.mobile-culture-art').slideUp(); 
        $('.mobile-journey-art').slideUp(); 
    });
    $(document).on('click','#delPrompt',function(e){
        e.preventDefault(); 
        $('.delButton2').css('display','inline-block');
    }); 
    $(document).on('click','#noDel',function(e){
        e.preventDefault(); 
        $('.delButton2').css('display','none');
    }); 
    $('.tri').each(function(i){ 
        setTimeout(function(){
            $('.tri').eq(i).addClass('show');
        }, 350 * i);
        $('.dwnimg').removeClass('show');
    }); 

    //see more for products 

    $('#seeMP').click(function(){ 
        $('.p-hidden').slideToggle(); 
        $(this).text( $(this).text() == 'See more' ? "See less" : "See more");
    });
    
    $('#seeMF').click(function(){ 
        $('.f-hidden').slideToggle(); 
        $(this).text( $(this).text() == 'See more' ? "See less" : "See more");
    }); 

    $('#seeMO').click(function(){ 
        $('.o-hidden').slideToggle(); 
        $(this).text( $(this).text() == 'See more' ? "See less" : "See more");
    }); 

    $('#seeMS').click(function(){ 
        $('.s-hidden').slideToggle(); 
        $(this).text( $(this).text() == 'See more' ? "See less" : "See more" );
    });

})
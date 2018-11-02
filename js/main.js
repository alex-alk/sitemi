$(document).ready(function(){
    first();
    $('#search').click(function(){
        $('#searchForm').toggleClass('inline-block');
    });
    $('#zoom').click(function(){
        $('.figure').css('display','inline-block');
        $('.figure').css('width','20%');
        $('.figure img').css('width','99%');
        $('.figure').css('vertical-align','middle');
    });
    $("#selectCategory").change(function(){
        if($("#selectCategory").val() === 'BLOG'){
            $(".hidden").css("display","inline");
        }else{
            $(".hidden").css("display","none");
        };
    });
    var i= 1;
    $("#add").click(function(){
        $("#s").before("<br>"+i+" <input type=text/css name ="+i+" required>");
        $("#s").before("<input type=hidden name =count value=" +i+">");
        i++;
    });
    $('#closeButton').click(function(){
        $('#filter').removeClass('filter');
        $('#album').removeClass('focus');
        $('#album').removeClass('fullscreen');
        $('body').removeClass('overflow');
        $('#album').css('height','400px');
        $('#album').removeClass('maximize');
        $('#closeButton').css('visibility','hidden');
        $('#leftButton').css('visibility','hidden');
        $('#rightButton').css('visibility','hidden');
        $('#compress').css('visibility','hidden');
        $('#maximize').css('visibility','visible');
          if (document.cancelFullScreen) {  
            document.cancelFullScreen();  
          } else if (document.mozCancelFullScreen) {  
            document.mozCancelFullScreen();  
          } else if (document.webkitCancelFullScreen) {  
            document.webkitCancelFullScreen();  
          }  else{}
        
    });
    $('#full').click(function(){
        $('#filter').attr('class','filter');
        $('body').attr('class','overflow');
        $('#album').attr('class','focus');
        $('#closeButton').css('top','0%');
        $('#closeButton').css('visibility','visible');
        $('#leftButton').css('visibility','visible');
        $('#rightButton').css('visibility','visible');
        $('#album').attr('class','fullscreen');
        $('#album').css('height','100%');
        $('#top').css('max-height','100%');
        $('#rightButton').css('right','1%');
        $('#leftButton').css('left','1%');
          if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
                (!document.mozFullScreen && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {  
              document.documentElement.requestFullScreen();  
            } else if (document.documentElement.mozRequestFullScreen) {  
              document.documentElement.mozRequestFullScreen();  
            } else if (document.documentElement.webkitRequestFullScreen) {  
              document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
            }  
          } else {    
        }  
    });
    $('#top').click(function(){
        $('#filter').attr('class','filter');
        $('body').attr('class','overflow');
        $('#album').attr('class','focus');
        $('#album').css('padding','15%');
        $('#closeButton').css('top','0%');
        $('#rightButton').css('right','25%');
        $('#leftButton').css('left','25%');
        $('#closeButton').css('visibility','visible');
        $('#leftButton').css('visibility','visible');
        $('#rightButton').css('visibility','visible');
    });
    $('#compress').click(function(){
        $('#filter').attr('class','filter');
        $('body').attr('class','overflow');
        $('#album').attr('class','focus');
        $('#closeButton').css('visibility','visible');
        $('#leftButton').css('visibility','visible');
        $('#rightButton').css('visibility','visible');
        $('#album').removeClass('class','maximize');
        $('#album').css('height','400px');
        $('#top').css('max-height','400px');
        $('#rightButton').css('right','25%');
        $('#leftButton').css('left','25%');
        $(this).css('visibility','hidden');
        $('#maximize').css('visibility','visible');
        
    });
    $('#maximize').click(function(){
        $('#filter').attr('class','filter');
        $('#album').css('padding','0');
        $('body').attr('class','overflow');
        $('#album').attr('class','focus');
        $('#closeButton').css('visibility','visible');
        $('#closeButton').css('top','0%');
        $('#leftButton').css('visibility','visible');
        $('#rightButton').css('visibility','visible');
        $('#album').attr('class','maximize');
        $('#album').css('height','100%');
        $('#top').css('max-height','100%');
        $('#rightButton').css('right','1%');
        $('#leftButton').css('left','1%');
        $(this).css('visibility','hidden');
        $('#compress').css('visibility','visible');
    });
    $('iframe').parent().addClass('parent');
    
});



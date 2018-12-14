$(document).ready(function(){
  
var currTime;


if (window.matchMedia("(max-width: 768px)").matches) {

//Event para hacer hover inicialmente
 $(".tile").click(function(){
   var catalogo = $(this).parents(".slide.catalogo");
   var center = $(this).find(".center-block");
   var position = $(this).data("pos");
   //Evento para cerrar las otras cajas cuando la actual se abra
   $(".close-btn:visible").click();
   //
   catalogo.find(".isHover").removeClass("isHover");
   catalogo.find(".line .tile").find(".tile__media .tile__img").addClass("box-small");
   catalogo.find(".line .tile").find(".tile__media .slides-hover").hide();    
   catalogo.find(".line .tile").parent(".big").removeClass("big").addClass("small");
   catalogo.find(".line .tile").children(".line .tile__details").addClass("x-tile__details").removeClass("tile__img tile__details");
   catalogo.find(".left-controls").addClass("left-control-small");
   catalogo.find(".right-controls").addClass("right-control-small");
   catalogo.find(this).children(".tile__media").children(this).addClass("img-border");       
   catalogo.find(".info").fadeIn();
   catalogo.find(".tile__title").hide();
   center.addClass("flechaAbajo");

  catalogo.find(".info .title-caja").html("<p class='animated fadeInUp'>"+$(this).find(".catalogo-titulo").text()+"</p>");
  catalogo.find(".info .desc-caja").html("<p class='animated fadeInUp'>"+$(this).find(".catalogo-contenido").text()+"</p>");
  catalogo.find(".info").css({"background-image":"url(img/"+$(this).find(".catalogo-fondo").text()+")"});

  //Botones de facebook
    catalogo.find(".info .fb").html('<div class="fb-like fb_iframe_widget " data-font="" data-height="20" data-href="http://www.geotelematic.com/?'+$(this).find(".catalogo-titulo").text()+'" data-layout="button_count" data-send="false" data-show_faces="true" fb-xfbml-state="rendered"><span style="vertical-align: bottom; width: 104px; height: 20px;"></span></div>');
  
    FB.XFBML.parse(catalogo.find(".info .fb").get(0));

});
} else {
  $(".line .tile").mouseenter(
  function() {   
     if($(this).find(".tile__details").length>0){
      $(this).addClass("isHover");
    }
    var that=this;
    if(currTime)
    clearTimeout(currTime);
    var currTime= setTimeout(function() {
           if($(that).hasClass("isHover")){
             $(that).find(".tile__media .tile__img").hide();
             $(that).find(".tile__media .slides-hover").show(); 
           }
     }, 1500);
    }
  );
$(".line .tile").mouseleave(
   function() {
    clearTimeout(currTime);
    $(this).removeClass("isHover");
    $(this).find(".tile__media .tile__img").show();
    $(this).find(".tile__media .slides-hover").hide(); 
  }
);}

//Evento para que en la fila se redimensione las img al hacer click, agregar border
  $(".down-flec").click(function(){
    var catalogo =$(this).parents(".slide.catalogo");

    $(".close-btn:visible").click();

    catalogo.find(".isHover").removeClass("isHover");
    catalogo.find(".line .tile").find(".tile__media .tile__img").addClass("box-small");
    catalogo.find(".line .tile").find(".tile__media .slides-hover").hide();    
    catalogo.find(".line .tile").find(".tile__media .line .tile").addClass("img-border");
    catalogo.find(".line .tile").parent(".big").removeClass("big").addClass("small");
    catalogo.find(".line .tile").children(".line .tile__details").addClass("x-tile__details").removeClass("tile__img tile__details");
    catalogo.find(".left-controls").addClass("left-control-small");
    catalogo.find(".right-controls").addClass("right-control-small");
    catalogo.find(".info").fadeIn();
    catalogo.find(".tile__title").hide();        

});

//Evento para marcar borde y mostrar flecha
 $(".line .tile").hover(function(){
  var catalogo =$(this).parents(".slide.catalogo");

  if(catalogo.find(".x-tile__details").length>0){
    var center = $(this).find(".center-block");
    catalogo.find(".img-border").not($(this).children(".tile__media").children(this)).removeClass("img-border");   
    catalogo.find(".center-block").not(center).removeClass("flechaAbajo");
    catalogo.find(this).children(".tile__media").children(this).addClass("img-border");       
    center.addClass("flechaAbajo"); 
   
    //Recorre la posicion correspondiente
    var position = $(this).data("pos");

    catalogo.find(".info .title-caja").html("<p class='animated fadeInUp'>"+$(this).find(".catalogo-titulo").text()+"</p>");
    catalogo.find(".info .desc-caja").html("<p class='animated fadeInUp'>"+$(this).find(".catalogo-contenido").text()+"</p>");
    catalogo.find(".info").css({"background-image":"url(img/"+$(this).find(".catalogo-fondo").text()+")"});

    catalogo.find(".galeria").data("catalogo",position);

    //Agregar linea roja por default
    catalogo.find(".descrip-g").addClass("current");
    catalogo.find(".galeria").removeClass("current");
    catalogo.find(".comentarios").removeClass("current");
    
    //Botones de facebook
    catalogo.find(".info .fb").html('<div class="fb-like fb_iframe_widget " data-font="" data-height="20" data-href="http://www.geotelematic.com/?'+$(this).find(".catalogo-titulo").text()+'" data-layout="button_count" data-send="false" data-show_faces="true" fb-xfbml-state="rendered"><span style="vertical-align: bottom; width: 104px; height: 20px;"></span></div>');
   // catalogo.find(".info .fb").html('<div class="fb-like fb_iframe_widget" data-font="" data-height="20" data-href="http://www.c3software-ca.com/" data-layout="button_count" data-send="false" data-show_faces="true" fb-xfbml-state="rendered"><span style="vertical-align: bottom; width: 104px; height: 20px;"></span></div>');
    FB.XFBML.parse(catalogo.find(".info .fb").get(0));

  }
});

//Event para cerrar caja de info y se redimensione los elementos inicialmente
$(".close-btn").click(function(){
  var catalogo = $(this).parents(".slide.catalogo");

  catalogo.find(".line .tile").find(".tile__media .tile__img").attr("style","").removeClass("box-small");
  catalogo.find(".line .tile").find(".x-tile__details").addClass("tile__details").removeClass("x-tile__details");
  catalogo.find(".left-controls").removeClass("left-control-small");
  catalogo.find(".right-controls").removeClass("right-control-small");
  catalogo.find(".img-border").removeClass("img-border");  
  catalogo.find(".flechaAbajo").removeClass("flechaAbajo");  
  catalogo.find(".info").fadeOut();
  catalogo.find(".small").removeClass("small").addClass("big");
  catalogo.find(".tile__title").show()
  
});

//getdeails será nuestra función para enviar la solicitud ajax
var getdetails = function(id){
  return $.getJSON( "carrusel.php", { "id" : id });
}
     


//al hacer click sobre cualquier elemento que tenga el atributo data-user.....
$('.galeria[data-catalogo]').click(function(e){

    //Detenemos el comportamiento normal del evento click sobre el elemento clicado
    e.preventDefault();


    var catalogo = $(this).parents(".slide.catalogo");
       //Event remove y add class current (Linea roja)
    catalogo.find(".descrip-g").removeClass("current");
    $(this).addClass("current");
    catalogo.find(".comentarios").removeClass("current");
    catalogo.find(".fb").empty();
    //Carga y show galeria
    catalogo.find(".info .desc-caja").html('<div class="response-container animated fadeInUp"></div>');   


    var catalogo = $(this).parents(".slide.catalogo");
    var container= catalogo.find(".response-container");
    //Mostramos texto de que la solicitud está en curso
    container.html("<p>Buscando...</p>");
    //this hace referencia al elemento que ha lanzado el evento click
    //con el método .data('user') obtenemos el valor del atributo data-user de dicho elemento y lo pasamos a la función getdetails definida anteriormente
    getdetails($(this).data('catalogo'))
        .done( function( response ) {
    //done() es ejecutada cuándo se recibe la respuesta del servidor. response es el objeto JSON recibido
    if( response.success ) {
        var output =   response.data.message ;
        output += '<div class="container">';
        output += '<div class="row">';
        output += '<div class="col-md-12 portfolio-related-container" style="height:280px !important;">';
        output += '<div class="owl-carousel  popup-gallery">';

        //recorremos cada usuario

        $.each(response.data.users, function( key, value ) {

        output += '         <div class="portfolio-item portfolio-image-zoom portfolio-meta-slideup " style="height:200px !important;">';
        
        if( value['tipoimg']==1 ){
         
       output += '<figure>';
        output += '<a href="img/'+ value['nomimg'] +'" class="zoom-item" title="'+ value['des'] +'"><img src="img/'+ value['nomimg'] +'" alt="'+ value['des'] +'" class="img-responsive"></a>';
         output += '</figure>';
        }else{
          output += '<iframe width="232" height="180" src="'+ value['url'] +'"></iframe>';

        }
       
        output += ' <div class="portfolio-meta dark">';
        output += ' <div class="portfolio-tags" style="word-wrap:break-word !important;">'+ value['des'] +'</div>';
        output += '</div>';                            
        output += '</div> ';
        });
        output += '</div> ';
        output += '</div> ';
        output += ' <div class="customNavigation pull-right" style="margin-top:-390px">';
        output += '<a class="btn prev" style="background: #333 !important;"><i style="color:#fff !important;" class="fa fa-chevron-left"></i></a>&nbsp';
        output += '<a class="btn next" style="background: #333 !important;"><i style="color:#fff !important;" class="fa fa-chevron-right"></i></a>';
        //output += '<a class="btn play">Autoplay</a>';
        //output += '<a class="btn stop">Stop</a>';
        output += '</div>';
        //Actualizamos el HTML del elemento con id="#response-container"
       container.html(output);


        var owl=container.find(".owl-carousel.popup-gallery");
        catalogo.find(".next").click(function(){
            owl.trigger('owl.next');
        })
        catalogo.find(".prev").click(function(){
            owl.trigger('owl.prev');
        })
        /*
            $(".play").click(function(){
                owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
            })
            $(".stop").click(function(){
                owl.trigger('owl.stop');
            })
        */

        owl.magnificPopup({
            delegate: '.zoom-item',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function(item) {
                    return item.el.attr('title') + '&nbsp;&nbsp;<a class="image-source-link" href="'+item.el.attr('href')+'" target="_blank">Descargar &rarr;</a>';
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 400, // Duration for zoom animation 
                opener: function(element) {
                    return element.find('img');
                }
            }
        });
        owl.owlCarousel( {

          items : 5, //10 items above 1000px browser width
          itemsDesktop : [1000,5], //5 items between 1000px and 901px
          itemsDesktopSmall : [900,3], // betweem 900px and 601px
          itemsTablet: [600,1], //2 items between 600 and 0
          itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
        }); 



        } else {
        //response.success no es true
            container.html('No Existen imagenes Registradas: ' + response.data.message);
        }
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        container.html("Algo ha fallado: " +  textStatus);
    });
});



//Event Comentarios
 $(".comentarios").click(function(){
  var catalogo = $(this).parents(".slide.catalogo");
 
  //Event remove y add class current (Linea roja)
  catalogo.find(".galeria").removeClass("current");
    catalogo.find(this).addClass("current");
  catalogo.find(".descrip-g").addClass("current");
    catalogo.find(this).removeClass("current");
  catalogo.find(".descrip-g").removeClass("current");
    $(this).addClass("current");

  catalogo.find(".fb").empty();
  var position = catalogo.find(".flechaAbajo").parents(".tile").data("pos");

  //Carga de comentario facebook a caja
  catalogo.find(".info .desc-caja").html('<div class="comm animated fadeInUp"><div  class="fb-comments" data-href="http://www.google.co.ve?'+catalogo.find(".flechaAbajo").parents(".tile").find(".catalogo-titulo").text()+'" data-colorscheme="dark" data-numposts="5"></div></div>');
  FB.XFBML.parse(catalogo.find(".info .desc-caja").get(0));

 });

//Event Descripcion general
 $(".descrip-g").click(function(){
  var catalogo = $(this).parents(".slide.catalogo");

  //Event remove y add class current
  catalogo.find(".comentarios").removeClass("current");
  $(this).addClass("current");
  catalogo.find(".galeria").removeClass("current");
  catalogo.find(this).addClass("current");

  //Carga y show titulo
  var contenido=catalogo.find(".flechaAbajo").parents(".tile").find(".catalogo-contenido").text();

  catalogo.find(".info .desc-caja").html("<p class='animated fadeInUp'>"+contenido+"</p>"); 
  //Carga de comentario facebook a caja
//Botones de facebook
    catalogo.find(".info .fb").html('<div class="fb-like fb_iframe_widget " data-font="" data-height="20" data-href="http://www.geotelematic.com/?'+$(this).find(".catalogo-titulo").text()+'" data-layout="button_count" data-send="false" data-show_faces="true" fb-xfbml-state="rendered"><span style="vertical-align: bottom; width: 104px; height: 20px;"></span></div>');
   // catalogo.find(".info .fb").html('<div class="fb-like fb_iframe_widget" data-font="" data-height="20" data-href="http://www.c3software-ca.com/" data-layout="button_count" data-send="false" data-show_faces="true" fb-xfbml-state="rendered"><span style="vertical-align: bottom; width: 104px; height: 20px;"></span></div>');
    FB.XFBML.parse(catalogo.find(".info .fb").get(0));
 });

//Hover para que se active los controls
$("b").hide();
$(".tile").hover(
    function(){
      var catalogo = $(this).parents(".slide.catalogo");
      catalogo.find("b").show();
    },
    function(){
      var catalogo = $(this).parents(".slide.catalogo");
      catalogo.find("b").hide();
    }
);
$(".left-controls").hover(
    function(){
      var catalogo = $(this).parents(".slide.catalogo");
      catalogo.find("b").show();
    },
    function(){
      var catalogo = $(this).parents(".slide.catalogo");
      catalogo.find("b").hide();
    }
); 
$(".right-controls").hover(
    function(){
      var catalogo = $(this).parents(".slide.catalogo");
      catalogo.find("b").show();
    },
    function(){
      var catalogo = $(this).parents(".slide.catalogo");
      catalogo.find("b").hide();
    }
); 

//Loop carousel general controls 
  var catalogo   = $(this).parents(".slide.catalogo");

  //grab the width and calculate left value
  var item_width = catalogo.find('.slides li').outerWidth(); 
  var left_value = item_width * (-1); 
        
  //move the last item before first item, just in case user click prev button
  catalogo.find('.slides li:first').before(catalogo.find('.slides li:last'));
  
  //set the default item to the correct position 
  catalogo.find('.slides ul').css({'left' : left_value});
  $(".left-controls").hide();

  //if user clicked on prev button
  $('.prev').click(function() {
  var catalogo   = $(this).parents(".slide.catalogo");
  $(".left-controls").show();

    //get the right position            
    var left_indent = parseInt( catalogo.find('.slides ul').css('left')) + item_width;

    //slide the item            
     catalogo.find('.slides ul').animate({'left' : left_indent}, 200,function(){    

    //move the last item and put it as first item             
     catalogo.find('.slides li:first').before( catalogo.find('.slides li:last'));           

    //set the default item to correct position
     catalogo.find('.slides ul').css({'left' : left_value});
    
    });

    //cancel the link behavior            
    return false;
            
  });

  //if user clicked on next button
  $('.next').click(function() {
    var catalogo   = $(this).parents(".slide.catalogo");
    $(".left-controls").show();

    //get the right position
    var left_indent = parseInt(catalogo.find('.slides ul').css('left')) - item_width;
    
    //slide the item
    catalogo.find('.slides ul').animate({'left' : left_indent}, 200, function () {
            
    //move the first item and put it as last item
    catalogo.find('.slides li:last').after(catalogo.find('.slides li:first'));                  
      
    //set the default item to correct position
    catalogo.find('.slides ul').css({'left' : left_value});
    
    });
             
    //cancel the link behavior
    return false;
    
  });        
      
//Carousel interno auto

/* SET PARAMETERS */
  var change_img_time   = 2000;   
  var simple_slideshow  = $(".tile.isHover .slides-hover");

  var changeList = function () {

    var listE =$(".tile.isHover .slides-hover div");
    var listLen = listE.length;
    var h =0;
    for (var i = 0 ; i<listLen; i++) {
      if(listE.eq(i).is(":visible")){
        h =i;
        break;
      }
    }
    var n =h+1<listLen?h+1:0;
    listE.eq(h).hide();
    listE.eq(n).show();

  };
  $(".slides-hover div").hide();
  setInterval(changeList, change_img_time);  
});


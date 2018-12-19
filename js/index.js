
function confirma(id){
	decisao = confirm("Deseja excluir a publicação ?");

	if (decisao){
		window.location.assign("/php/excluir.php?del="+id);

	}
}
$(document).ready(function(){
	$("#ul-comunidades").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$(".dropdown-menu li").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
});

function cor(){
	var cor = document.getElementById('file');
	cor.className='file1';
}
$(document).ready(function() {

	$(".account-btn").click(function(){

		$("#account-panel").slideToggle();

	});

	$(window).click(function() {

		$("#account-panel").hide();

		$("#account-panel, .account-btn").click(function (event) {
			event.stopPropagation();
		});

	});

});

function options(){

	var ver= document.getElementById('opcoes');
	if (ver.className == "") {
		ver.className= "displaynone";
	}else{
		ver.className= "";
	}
}
document.addEventListener("DOMContentLoaded", function() {            
    //altera a URL do botão
    document.getElementById("facebook-share-btt").href = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(window.location.href);
  }, false);


function ver(){
	var s = document.getElementById("senha");            
	if (s.type == "text") {
		s.setAttribute('type', 'password');
	}else{
		s.setAttribute('type', 'text');
	}
}
function estrelas(){
$(document).ready(function(){
				
				/* 1. Visualizing things on Hover - See next part for action on click */
				$('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
    
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
    	if (e < onStar) {
    		$(this).addClass('hover');
    	}
    	else {
    		$(this).removeClass('hover');
    	}
    });
    
  }).on('mouseout', function(){
  	$(this).parent().children('li.star').each(function(e){
  		$(this).removeClass('hover');
  	});
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
    	$(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
    	$(stars[i]).addClass('selected');
    }
    // $('.rating-widget').addClass('displaynone');
    
    // JUST RESPONSE (Not needed)
    var ratingValue ={ 'valor' : parseInt($('#stars li.selected').last().data('value'), 10)};

    var pageurl = 'classificar.php';
    $.ajax({
    	url: pageurl,
    	data: ratingValue,
    	type: 'POST',
    	cache: false,
      success: function(retorno){
        $('#estrela').html(retorno);
        console.log(retorno);
      }
    });

    
    
  });
  
  
});
}

function getEstrela(){
  var pageurl = 'classificar.php';
    $.ajax({
      url: pageurl,
      cache: false,
      success: function(retorno){
        $('#estrela').html(retorno);
        estrelas();
      }
    });
}
function getComentarios(){
          $.ajax({
          url: $('#forms').attr('action'),
          success: function(data){
            $('#Pcoment').html(data);
          }
        })
      }
function getPostagens(){
          $.ajax({
          url: $('#postar').attr('action'),
          success: function(data){
            $('#all').html(data);
          }
        })
      }
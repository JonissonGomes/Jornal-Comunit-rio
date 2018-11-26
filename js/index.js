
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

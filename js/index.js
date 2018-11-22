
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
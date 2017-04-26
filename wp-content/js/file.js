$(document).ready(function(){
$("a").css("color","maroon");
$( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
 $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');
//$("<span><i class='fa fa-eye' aria-hidden='true'></i></span>").insertAfter(".owl-carousel-item-text");
$('.owl-carousel-item-text img').each(function(i, obj) {
  $(this).attr("id","img"+i);
});
$("body").append("<div id='myModal' class='modal'><span class='close'>×</span><img class='modal-content' id='img01'><div id='modal-footer'  style='width:50px;margin:auto'></div><div id='caption'></div></div>");
var modal = document.getElementById('myModal');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
var footerText = document.getElementById("modal-footer");

var span = document.getElementsByClassName("close")[0];
span.onclick = function() { 
    modal.style.display = "none";
}
$('.owl-carousel-item-text img').each(function(i, obj) {
 $(this).on("click", function(){

    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
    footerText.innerHTML =  $(this).attr("id");

});
});
});



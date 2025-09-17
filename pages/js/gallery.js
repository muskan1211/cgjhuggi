
function addgallery() {
var galleryimage = $("#galleryimage").val();
var description = $("#description").val();


if (galleryimage == ''|| description == '' ) {
alert("Failed!!! Add Your image Field are Blank....!!");
}  else {
// Returns successful data submission message when the entered information is stored in database.
$.post("add_gallery.php",{
galleryimage: galleryimage,
description: description}, function(data) {
alert(data);
$('#gallerys')[0].reset(); // To reset form fields

});
}
}

function worksubmit1() {
var testimonial = $("#testimonial").val();


if (testimonial == '' ) {
alert("Failed!!! Add Your words Field are Blank....!!");
}  else {
// Returns successful data submission message when the entered information is stored in database.
$.post("add_testimonial.php",{
testimonial: testimonial }, function(data) {
alert(data);
$('#workform')[0].reset(); // To reset form fields
});
}
}
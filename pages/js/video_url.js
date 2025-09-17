
function videosubmit() {
var videos_url = $("#videos_url").val();


if (videos_url == '' ) {
alert("Failed!!! Add Your videos_url Field are Blank....!!");
}  else {
// Returns successful data submission message when the entered information is stored in database.
$.post("videos_url.php",{
videos_url: videos_url}, function(data) {
alert(data);
$('#video_url')[0].reset(); // To reset form fields
});
}
}

function worksubmit5() {
var cust_name = $("#cust_name").val();
var cust_contactno = $("#cust_contactno").val();
var cust_contactno2 = $("#cust_contactno2").val();
var cust_bookingdate = $("#cust_bookingdate").val();
var cust_bookingstatus = $("#cust_bookingstatus").val();
var cust_deliveringdate = $("#cust_deliveringdate").val();
var cust_totalamount = $("#cust_totalamount").val();
var cust_balanceamount = $("#cust_balanceamount").val();
var cust_centername = $("#cust_centername").val();

if (cust_name == ''|| cust_contactno == ''|| cust_bookingdate == ''|| cust_bookingstatus == ''|| cust_deliveringdate == ''|| cust_totalamount == ''|| cust_balanceamount == ''|| cust_centername == '') {
alert("Failed!!! Some Field are Blank. Please Fill All Field...!!");
}  else {
// Returns successful data submission message when the entered information is stored in database.
$.post("add_booking.php",{
cust_name: cust_name,
cust_contactno: cust_contactno, 
cust_contactno2: cust_contactno2, 
cust_bookingdate: cust_bookingdate, 
cust_bookingstatus: cust_bookingstatus,
cust_deliveringdate: cust_deliveringdate, 
cust_totalamount: cust_totalamount, 
cust_balanceamount: cust_balanceamount, 
cust_centername: cust_centername }, function(data) {
alert(data);
$('#bookingform')[0].reset(); // To reset form fields
});
}
}
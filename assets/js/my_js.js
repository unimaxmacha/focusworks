// Validating Empty Field
function check_empty(value) {
if (document.getElementById('event').value == "" || document.getElementById('description').value == "" ) {
alert("Fill All Fields !");
} else {
//document.getElementById('form').submit();

$(function ()
{
  //-------------------------------------------------------------------------------------------
  // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
  //-------------------------------------------------------------------------------------------

eventdata = document.getElementById('event').value ;
eventdesc = document.getElementById('description').value ;
dataid = document.getElementById('dataid').value ;

action =  value ;

var start = document.getElementById('starttime').value ;
var end = document.getElementById('endtime').value ;
var status = document.getElementById('status').value ;

if (start>end) {
  alert("Start date should less than end Date");
  return ;
}

$.ajax({url: "edit_delete.php",
        data: "eventdata="+eventdata+"&eventdesc="+eventdesc+"&action="+action+"&dataid="+dataid+"&starttime="+start+"&endtime="+end+"&status="+status,
        success: function(result){

            if(result.toString()==="delete")
            {
              document.getElementById(dataid).remove();
              div_hide();
            }else{
            document.getElementById(dataid).innerHTML = result;
           }

       div_hide();

    }});
});

}
}



function check_save(value) {
if (document.getElementById('event1').value == "" || document.getElementById('description1').value == "" ) {
alert("Fill All Fields !");
} else {

  var start = document.getElementById('starttime1').value ;
  var end = document.getElementById('endtime1').value ;

  if (start>end) {
    alert("Start date should less than end Date");
    return ;
  }


$(function ()
{
  //-------------------------------------------------------------------------------------------
  // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
  //-------------------------------------------------------------------------------------------

eventdata = document.getElementById('event1').value ;
eventdesc = document.getElementById('description1').value ;
section = document.getElementById('sectionfield').value ;
date = document.getElementById('date1').value ;
relX = document.getElementById('left').value ;
relY = document.getElementById('top').value ;

action =  value ;

$.ajax({ url: "edit_delete.php",
        data: "eventdata="+eventdata+"&eventdesc="+eventdesc+"&action="+action+"&section="+section+"&date="+date+"&starttime="+start+"&endtime="+end,
        success: function(result){
        //alert(result);

        result_item = result.split("$");
        //alert(result_item);

       document.getElementById(relX).innerHTML = '<div id='+result_item[0]+' class="time-sch-item item-status-none ui-draggable ui-resizable" style="top:'+relY+'; width:100%;">'+result_item[1]+'</div>' ;
       //alert(document.getElementById(relX).innerHTML);
       document.getElementById('abc1').style.display = "none";
    }});
});

}
}

//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}


function div_show1(id) {


if(document.getElementById('abc').style.display != "block")
{

document.getElementById('sectionfield').value = id ;
document.getElementById('event1').value = "" ;
document.getElementById('description1').value = "" ;
document.getElementById('date1').value = "" ;
document.getElementById('abc1').style.display = "block";
var start = document.getElementById('starttime').value ;
var end = document.getElementById('endtime').value ;


$("#container").click(function(e){
   var wrapper = $(this).parent();
   var parentOffset = wrapper.offset();
   var relX = e.pageX - parentOffset.left + wrapper.scrollLeft();
   var relY = e.pageY - parentOffset.top + wrapper.scrollTop();

   $(this).append($('<div/>').addClass('placeddiv').attr("id",relX).css({
       left: relX-280,
       top: relY
   }));

   document.getElementById('left').value = relX ;
   document.getElementById('top').value = relY ;
});
}
}
//Function to Hide Popup
function div_hide1(){
document.getElementById('abc1').style.display = "none";
}

function sectionpopuphide(){
document.getElementById('sectionpopup').style.display = "none";
}


function sectionpopuphide2(){
document.getElementById('sectionpopup1').style.display = "none";
}


$(document).on('dblclick','.time-sch-section', function () {
//alert("HEllo");
var idatt = $(this).attr('id');
var sectionid = idatt.split(" ");
document.getElementById('sectionpopup').style.display = "block";
$('#sectionid').val(sectionid[1]) ;
var sectionname = $(this).html() ;
$('#sectionname').val(sectionname) ;
});


function save_section(){
    action = "editsection" ;
    var sectionid = $('#sectionid').val();
    var sectionname = $('#sectionname').val();
    var sectiondesc = $('#sectionname').val();
    var date = $('#date1').val();
    var date = $('#date1').val();

  $.ajax({ url: "edit_delete.php",
           data: "sectionid="+sectionid+"&sectionname="+sectionname+"&action="+action,
           success: function(result){
          //alert(result);
    var sectiontd = 'section '+sectionid;
         //$('#'+sectiontd).html(result) ;
         document.getElementById(sectiontd).innerHTML = result ;
         document.getElementById('sectionpopup').style.display = "none";
      }});


}


$(document).on('dblclick','.time-sch-date-header', function () {

action= "showdata" ;
var date = $(this).attr('id');
//alert(idatt);
document.getElementById('listpop').innerHTML = "";
document.getElementById('sectionpopup1').style.display = "block";

 $.ajax({ url: "edit_delete.php",
          data: "date="+date+"&action="+action,
          success: function(result){
          //$('#'+sectiontd).html(result) ;
          document.getElementById('listpop').innerHTML = result ;
        //  document.getElementById('sectionpopup1').style.display = "block";
     }});


});

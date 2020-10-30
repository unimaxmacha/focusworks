<h2><?php echo "Calendar"; ?></h2>
<table border="1px">
	
	<tr><th>id</th><th>Events</th><th>Description</th><th>Datetime</th><th>Section</th><th>Starttime</th><th>Endtime</th></tr>
<?php 
	$variable = '';
	//$section = 1;
	foreach ($calendar as $calendar_cat): 
?> 

	<tr>
		<td><?php echo $increment = $calendar_cat['id']; ?></td>
		<td><?php echo $event = $calendar_cat['event']; ?></td>
		<td><?php echo $description = $calendar_cat['description']; ?></td>
		<td><?php echo $datetime = $calendar_cat['datetime']; ?></td>
		<td><?php echo $calSection = $calendar_cat['section']; ?></td>
		<td><?php echo $starttime = $calendar_cat['starttime']; ?></td> 
		<td><?php echo $endtime = $calendar_cat['endtime']; ?></td>
	</tr>
	
<?php 
	$newDate = date("m-d-Y", strtotime($datetime));
	$variable .= "{ id: ".$increment.", name: '<div>".$event."</div><div>".$description."</div>',
	                start: moment('".$newDate."','MM-DD-YYYY').add('hours', '".$starttime."'),
	                end: moment('".$newDate."','MM-DD-YYYY').add('hours', '".$endtime."'), sectionID: ".$calSection.",classes: 'item-status-none'
	              },";
	endforeach; 
?>
</table>
Section:
<table border="1px">
	
	<tr><th>Section</th></tr>
<?php 

	$sectionvariable = '';
  $totalsection=0;
	
	foreach ($section as $section_item): 
    $id = $section_item['id'] ;
    $section = $section_item['section'] ;

    $sectionvariable .= "{     id: ".$id.",    name: '".$section."' },";
    $totalsection++ ;
?> 

	<tr>
		<td><?php echo $section = $section_item['section']; ?></td>
	</tr>
<?php 
endforeach; 
?>
</table>

<script >

        itemss = <?php echo $variable; ?>

        $(document).ready(function() {
                $("#date1").datepicker();
           });

        var today = moment().startOf('day');
        var Calendar = {
            Periods: [
                {
                    Name: '3 days',
                    Label: '3 days',
                    TimeframePeriod: (60 * 3),
                    TimeframeOverall: (60 * 24 * 3),
                    TimeframeHeaders: [
                        'Do MMM',
                        'HH'
                    ],
                    Classes: 'period-3day'
                },
                {
                    Name: '1 week',
                    Label: '1 week',
                    TimeframePeriod: (60 * 24),
                    TimeframeOverall: (60 * 24 * 7),
                    TimeframeHeaders: [
                        'MMM',
                        'Do'
                    ],
                    Classes: 'period-1week'
                },
                {
                    Name: '1 month',
                    Label: '1 month',
                    TimeframePeriod: (60 * 24 * 1),
                    TimeframeOverall: (60 * 24 * 28),
                    TimeframeHeaders: [
                        'MMM',
                        'Do'
                    ],
                    Classes: 'period-1month'
                }
            ],

            Items: [
                  <?php echo  $variable; ?>
            ],
            Sections: [ <?php echo $sectionvariable; ?>
              /*  {
                    id: 1,
                    name: 'Section 1'
                },
                {
                    id: 2,
                    name: 'Section 2'
                },
                {
                    id: 3,
                    name: 'Section 3'
                }*/
            ],
            Init: function () {
                TimeScheduler.Options.GetSections = Calendar.GetSections;
                TimeScheduler.Options.GetSchedule = Calendar.GetSchedule;
                TimeScheduler.Options.Start = today;
                TimeScheduler.Options.Periods = Calendar.Periods;
                TimeScheduler.Options.SelectedPeriod = '1 week';
                TimeScheduler.Options.Element = $('.calendar');

                TimeScheduler.Options.AllowDragging = true;
                TimeScheduler.Options.AllowResizing = true;

                TimeScheduler.Options.Events.ItemClicked = Calendar.Item_Clicked;
                TimeScheduler.Options.Events.ItemDropped = Calendar.Item_Dragged;
                TimeScheduler.Options.Events.ItemResized = Calendar.Item_Resized;

                TimeScheduler.Options.Events.ItemMovement = Calendar.Item_Movement;
                TimeScheduler.Options.Events.ItemMovementStart = Calendar.Item_MovementStart;
                TimeScheduler.Options.Events.ItemMovementEnd = Calendar.Item_MovementEnd;

                TimeScheduler.Options.Text.NextButton = '&nbsp;';
                TimeScheduler.Options.Text.PrevButton = '&nbsp;';

                TimeScheduler.Options.MaxHeight = 100;

                TimeScheduler.Init();
            },
            GetSections: function (callback) {
                callback(Calendar.Sections);
            },

            GetSchedule: function (callback, start, end) {
                callback(Calendar.Items);
            },

            Item_Clicked: function (item) {
                console.log(item);

                document.getElementById('event').value = "";
                document.getElementById('dataid').value ="";
                document.getElementById('description').innerHTML = "";
                document.getElementById('description').value = "";

                //alert()
                res = item.name.split("</div><div>");
                eventdata = res['0'].replace("<div>", " ");
                eventdesc = res['1'].replace("</div>", " ");

                //alert(res['0']); alert(res['1']);
                //alert(eventdata);
                document.getElementById('event').value = eventdata ;
                document.getElementById('dataid').value = item.id;
                document.getElementById('description').innerHTML = eventdesc ;
                document.getElementById('description').value = eventdesc ;
              //  document.getElementById('abc1').style.display = "none";


              $.ajax({ url: "edit_delete.php",
                      data: "action=showeditdata"+"&dataid="+item.id,
                      success: function(result){
                      //alert(result) ;
                     obj = JSON.parse(result);
                     document.getElementById('event').value = obj.event ;
                     document.getElementById('description').value = obj.description ;
                     $("#starttime").val(obj.starttime).change();
                     $("#endtime").val(obj.starttime).change();
                     $("#status").val(obj.status).change();



                  }});

                document.getElementById('abc').style.display = "block";


            },

            Item_Dragged: function (item, sectionID, start, end) {
                var foundItem;

                console.log(item);
                console.log(sectionID);
                console.log(start);
                console.log(end);

                for (var i = 0; i < Calendar.Items.length; i++) {
                    foundItem = Calendar.Items[i];

                    if (foundItem.id === item.id) {
                        foundItem.sectionID = sectionID;
                        foundItem.start = start;
                        foundItem.end = end;

                        Calendar.Items[i] = foundItem;
                    }
                }

                TimeScheduler.Init();
            },

            Item_Resized: function (item, start, end) {
                var foundItem;
                console.log(item);
                console.log(start);
                console.log(end);

                for (var i = 0; i < Calendar.Items.length; i++) {
                    foundItem = Calendar.Items[i];

                    if (foundItem.id === item.id) {
                        foundItem.start = start;
                        foundItem.end = end;

                        Calendar.Items[i] = foundItem;
                    }
                }

                TimeScheduler.Init();
            },
            Item_Movement: function (item, start, end) {
                var html;

                html =  '<div>';
                html += '   <div>';
                html += '       Start: ' + start.format('Do MMM YYYY HH:mm');
                html += '   </div>';
                html += '   <div>';
                html += '       End: ' + end.format('Do MMM YYYY HH:mm');
                html += '   </div>';
                html += '</div>';

                $('.realtime-info').empty().append(html);
            },
            Item_MovementStart: function () {
                $('.realtime-info').show();
            },
            Item_MovementEnd: function () {
                $('.realtime-info').hide();
            }
        };

        $(document).ready(Calendar.Init);

        </script>
        <!--<script src="<?= base_url('assets/js/calendar.js') ?>"></script> -->
        <link href="<?= base_url('assets/css/elements.css') ?>" rel="stylesheet">


    </head>
    <body>
        <div class="calendar" id="calendar">

        </div>
        <div class="realtime-info">

        </div>


<!-- Display Popup Button -->
<?php 
  /** Add New Event */
  include "addNewEvent.php"; 
  /** Edit or Delete Event */
  include "editOrDeleteEvent.php"; 
  /** Update Section */
  include "updateSection.php";
?>

<div id="sectionpopup1">
<!-- Popup Div Starts Here -->
<div id="popupContact3">
<!-- Contact Us Form -->

<form action="#" id="form3" method="post" name="form">
   <img id="close" src="<?= base_url('assets/css/images/close.png') ?>" onclick ="sectionpopuphide2()">
   <h2>Schertyuiop;eduale</h2>
   <hr>
   <div id="listpop"> &nbsp; </div>

</form>
</div>
<!-- Popup Div Ends Here -->
</div>
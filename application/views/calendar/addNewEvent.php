<div id="abc1">
<!-- Popup Div Starts Here -->
<div id="popupContact1">
<!-- Contact Us Form -->
<form action="#" id="form1" method="post" name="form">
<img id="close" src="<?= base_url('assets/css/images/close.png') ?>" onclick ="div_hide1()">
<h3>Calendar</h3>
<hr>

<input type="text" id="date1" placeholder="Date">
<input id="event1" name="event1" type="text" placeholder="Event"><p></p>
<span class="time">Time : </span><select id="starttime1" name="starttime1">
  <option value="00">00:00 </option>
  <option value="03">03:00 </option>
  <option value="06">06:00 </option>
  <option value="09">09:00 </option>
  <option value="12">12:00 </option>
  <option value="15">15:00 </option>
  <option value="18">18:00 </option>
  <option value="21">21:00 </option>
  <option value="24">23:59 </option>
</select>
 <span style="font-size:16px; font-family:raleway;color:#888; font-weight:400;">-To-</span>
<select id="endtime1" name="endtime1">
  <option value="00">00:00 </option>
  <option value="03">03:00 </option>
  <option value="06">06:00 </option>
  <option value="09">09:00 </option>
  <option value="12">12:00 </option>
  <option value="15">15:00 </option>
  <option value="18">18:00 </option>
  <option value="21">21:00 </option>
  <option value="24">23:59 </option>
</select>
<textarea id="description1" name="description1" placeholder="Message"></textarea>

<a href="javascript:%20check_save('save')" id="submit">Submit</a><br>


<input type="hidden" name="action" id = "action" value="save">
<input type="hidden" name="sectionfield" id = "sectionfield">
<input type="hidden" name="left" id = "left" >
<input type="hidden" name="top" id = "top" >
</form>
</div>
<!-- Popup Div Ends Here -->
</div>
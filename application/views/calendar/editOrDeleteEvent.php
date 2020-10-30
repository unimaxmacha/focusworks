<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
      <form action="#" id="form" method="post" name="form">
      <img id="close" src="<?= base_url('assets/css/images/close.png') ?>" onclick ="div_hide()">
      <h3>Calendar</h3>
      <hr>
      <input id="event" name="event"  type="text"> <p></p>
      <span class="time">Time : </span><select id="starttime" name="starttime">
        <option value="00">00:00 </option>
        <option value="03">03:00 </option>
        <option value="06">06:00 </option>
        <option value="09">09:00 </option>
        <option value="12">12:00 </option>
        <option value="15">15:00 </option>
        <option value="18">18:00 </option>
        <option value="21">23:59 </option>
      </select>
       <span style="font-size:16px; font-family:raleway;color:#888; font-weight:400;">-To-</span>
      <select id="endtime" name="endtime">
        <option value="00">00:00 </option>
        <option value="03">03:00 </option>
        <option value="06">06:00 </option>
        <option value="09">09:00 </option>
        <option value="12">12:00 </option>
        <option value="15">15:00 </option>
        <option value="18">18:00 </option>
        <option value="21">21:00 </option>
        <option value="21">21:00 </option>
        <option value="24">23:59 </option>
      </select>

      <textarea id="description" name="description" placeholder="Message"></textarea>

    <span class="time">  Status : </span>
    <select id="status" name="status">
        <option>--Select--</option>
        <option value = "no-show">no-show </option>
        <option value = "sick">sick </option>
        <option value = "delayed">delayed </option>
     </select>
     <p></p>

      <a href="javascript:%20check_empty('edit')" id="submit">Submit</a><br>
      <a href="javascript:%20check_empty('delete')" id="submit">Delete</a>
      <input type="hidden" name="action" id = "action">
      <input type="hidden" name="dataid" id = "dataid">
      </form>
</div>
<!-- Popup Div Ends Here -->
</div>
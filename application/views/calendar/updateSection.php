<div id="sectionpopup">
	<!-- Popup Div Starts Here -->
	<div id="popupContact2">
		<!-- Contact Us Form -->
		<form action="#" id="form2" method="post" name="form">
			<img id="close" src="<?= base_url('assets/css/images/close.png') ?>" onclick ="sectionpopuphide()">
			<h3>Calendar Section</h3>
			<hr>
			<input id="sectionname" name="sectionname"  type="text" placeholder="Section Name">
			</br><p>&nbsp;</p>
			<a href="javascript:%20save_section('save_section')" id="submit">Submit</a><br>

			<input type="hidden" name="action" id = "action" value="savesection">
			<input type="hidden" name="sectionid" id = "sectionid">

		</form>
	</div>
<!-- Popup Div Ends Here -->
</div>
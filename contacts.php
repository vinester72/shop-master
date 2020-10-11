<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
$page = "contacts";
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php'; 

?>
<div class="container">
	<div class="row mt-4">
	  <div class="col-12">
		  <div class="contacts " style=" display: flex; justify-content: center; flex-direction: column; padding-top: 40px">
			<div style="display: flex; justify-content: center; margin-bottom: 10px">
				<h3 style="font-weight: 700; color: #176b48; font-size: 25px;">Contact us</h3>
			</div>
			
			<div style="display: flex; justify-content: center; font-size: 17px; font-weight: 700; letter-spacing: 0.2em">
				
				<p style="margin-right: 10px; color: #7d887d">Email: </p>
				<a href="#" style="color: #176b48; font-weight: 300; border-bottom: 1px dotted  #176b48; margin-bottom: 30px">
					info@snagg.pro
				</a>
				<p style="margin-right: 10px; margin-left: 10px; color: #7d887d"> or call: </p>
				
				<a href="#" style="color: #176b48; font-weight: 300; border-bottom: 1px dotted  #176b48; margin-bottom: 30px">
					0207 060 67 37
				</a>
			</div>
			<div style="display: flex; justify-content: center; margin-top: -20px; margin-bottom: 70px; font-weight: 700; letter-spacing: 1.4em; font-size: 17px;">
				<p style="color: #7d887d">
					Mon - Sat from 9:00 AM until 8:30 PM
				</p>
			</div>
			</div>
		</div>
	</div>
</div>
	  <!--  <div class="container">	 -->
<div id="map" style="width: 100%; height: 600px;">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d949709.2523305727!2d33.76598082304594!3d48.89203021063674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dbfc84d050a199%3A0xc53554e665c371d7!2z0L_RgNC-0YHQvy4g0JPQtdGA0L7QtdCyLCAzNSwg0JTQvdC40L_RgNC-LCDQlNC90LXQv9GA0L7Qv9C10YLRgNC-0LLRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCwgNDkwMDA!5e0!3m2!1sru!2sua!4v1590500531267!5m2!1sru!2sua" width="1241" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>	

</div>	
<div class="container">
	<div class="row mt-4">
	  <div class="col-12">
		  <div class="visit-offis" style="width: 100%; display: flex; justify-content: center; padding: 15px 0">
				<p style="font-size: 15px; color: #176b48; letter-spacing: 0.3em ">
					Please visit our offices
				</p>
			</div>
		</div>
	</div>
</div>


<?php
include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>
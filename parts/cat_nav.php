<!-- <div class="col-2"> -->
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	
	<?php
	if(!isset($_GET["id"])) {
			echo "<a class='nav-link active' style='color: green; background: #eceef1;' href='/'>Все товары</a>";
		} else {
			echo "<a class='nav-link ' style='color: grey;' href='/'>Все товары</a>";
		}

		$sql = "SELECT * FROM categories";
		$result = $conn->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			if(isset($_GET['id']) && $_GET['id'] == $row['id']) {
				echo "<a class='nav-link active' style='color: green; background: #eceef1;' href='/cat.php?id=" . $row['id'] . "'>" . $row['title'] . "</a>";
			} else {
				echo "<a class='nav-link' style='color: grey' href='/cat.php?id=" . $row['id'] . "'>" . $row['title'] . "</a>";
			}
		}	
	?>
</div>
<!--  </div> -->
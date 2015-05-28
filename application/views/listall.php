<html>
	<head>
		<meta charset="UTF-8">
		<title>Gather Info from friends</title>
		<meta name="description" content="Gather Info from friends">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<style type="text/css">
			.img-responsive img{
				height: 25%;
				width: 75%;
			}
		</style>
	</head>

<body class='container'>
	<div class='row'>	
		<div class="col-md-8 col-md-offset-1">
			<table class='table'>
				<tr>
					<td>Reference Link</td>
					<td>Scrape</td>
					<td>Scrape Status</td>
					<td>Drill</td>
					<td>Drill Status</td>
				</tr>
				<?php foreach($listdata as $key) {
					echo '<tr>';
					echo '<td>'.$key['ref_link'].'</td>';
					echo '<td><input type="submit" name="'. '"
					</td>';
					echo '<td>'.$key['scrapeStaus'].'</td>';
					echo '<td>'.$key['drill'].'</td>';
					echo '<td>'.$key['drillStatus'].'</td>';
					echo '</tr>';
				}?>
			</table>
		</div>
	</div>
</body>
</html>
<?php
include_once 'measurement-class.php';
?>
<html>
	<head>
		<title><?php echo 'Bags of topsoil'; ?></title>
	</head>
	<body>
		<form class="measure_wrap" method="post">
			<div class="measurementunit">
				<label><?php echo 'Select Measurement Unit'; ?></label>
				<select name="measurementunit">
					<option value="meters"><?php echo 'Meters'; ?></option>
					<option value="feet"><?php echo 'Feet'; ?></option>
					<option value="yards"><?php echo 'Yards'; ?></option>
				</select>
			</div>
			<div class="depthmeasurementunit">
				<label><?php echo 'Select Depth Measurement Unit'; ?></label>
				<select name="depthmeasurementunit">
					<option value="centimeters"><?php echo 'Centimeters'; ?></option>
					<option value="inches"><?php echo 'Inches'; ?></option>
				</select>
			</div>
			<div class="dimension">
				<div class="length">
					<label><?php echo 'Length'; ?></label>
					<input type="number" name="length" />
				</div>
				<div class="width">
					<label><?php echo 'Width'; ?></label>
					<input type="number" name="width" />
				</div>
				<div class="depth">
					<label><?php echo 'Depth'; ?></label>
					<input type="number" name="depth" />
				</div>
			</div>
			<input type="submit" value="Calculate" name="measure_submit" />
		</form>
		<style>
			.measure_wrap > div {
				margin: 10px 0;
			}
			.measure_wrap .dimension {
				display: flex;
			}
		</style>
		<?php
		if(isset($_POST['measure_submit'])) {
			$measurementunit = $_POST['measurementunit'];
			$depthmeasurementunit = $_POST['depthmeasurementunit'];
			$length = $_POST['length'];
			$width = $_POST['width'];
			$depth = $_POST['depth'];
			
			$classinit = new Calculate_Topsoil_Bags();
			$classinit->SetMeasurementUnit( $measurementunit );
			$classinit->SetDepthMeasurementUnit( $depthmeasurementunit );
			$classinit->SetMeteresSquared( $length, $width );
			$classinit->SetCubicMeter( $depth );
			
			$meteressquared = $classinit->GetMeteresSquared();
			$cubicmeter = $classinit->GetCubicMeter();
			$totalbags = $classinit->CalculateBags();
			$totalcubicbags = $classinit->CalculateCubicBags();
			
			?>
			<h2>---------- Meteres Squared Bags ----------</h2>
			<?php
			echo 'Measurement Unit: '.ucfirst($measurementunit).'<br>';
			echo 'Length: '.$length.' '.$measurementunit.'<br>';
			echo 'Width: '.$width.' '.$measurementunit.'<br>';
			echo 'Depth: '.$depth.' '.$depthmeasurementunit.'<br>';
			echo 'Meteres Squared: '.$meteressquared.'<br>';
			?>
			<h4>Bag Quantity Calculation</h4>
			<?php
			echo $meteressquared.' * 1.4 = '.$meteressquared * '1.4'.'<br>';
			echo $meteressquared * '1.4'.' * 0.025 = '.$meteressquared * '1.4' * '0.025'.'<br>';
			echo 'Number of Bags required = '.$totalbags.'<br>';
			?>
			<h2>---------- Cubic Meteres Bags ----------</h2>
			<?php
			echo 'Measurement Unit: '.ucfirst($measurementunit).'<br>';
			echo 'Depth Measurement Unit: '.ucfirst($depthmeasurementunit).'<br>';
			echo 'Length: '.$length.' '.$measurementunit.'<br>';
			echo 'Width: '.$width.' '.$measurementunit.'<br>';
			echo 'Depth: '.$depth.' '.$depthmeasurementunit.'<br>';
			echo 'Cubic Meteres: '.$cubicmeter.'<br>';
			?>
			<h4>Bag Quantity Calculation</h4>
			<?php
			echo $cubicmeter.' * 1.4 = '.$cubicmeter * '1.4'.'<br>';
			echo $cubicmeter * '1.4'.' * 0.025 = '.$cubicmeter * '1.4' * '0.025'.'<br>';
			echo 'Number of Bags required = '.$totalcubicbags.'<br>';
			
			$classinit->SaveObject( $measurementunit, $depthmeasurementunit, $length, $width, $depth, $meteressquared, $cubicmeter, $totalbags, $totalcubicbags );
		}
		?>
	</body>
</html>

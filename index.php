<?php
include_once 'measurement-class.php';
$classinit = new Calculate_Topsoil_Bags();
$classinit->SetMeteresSquared( 11, 10 );
echo $classinit->GetMeteresSquared();
echo $classinit->CalculateBags();

?>
<div class="measure_wrap">
	<div class="measurementunit">
		<label><?php echo 'Select Measurement Unit'; ?></label>
		<select>
			<option><?php echo 'Meters'; ?></option>
			<option><?php echo 'Feet'; ?></option>
			<option><?php echo 'Yards'; ?></option>
		</select>
	</div>
	<div class="dimension">
		<div class="length">
			<label><?php echo 'Length'; ?></label>
			<input type="number" />
		</div>
		<div class="width">
			<label><?php echo 'Width'; ?></label>
			<input type="number" />
		</div>
	</div>
	<input type="submit" value="Calculate" />
</div>
<style>
	.measure_wrap > div {
		margin: 10px 0;
	}
	.measure_wrap .dimension {
		display: flex;
	}
</style>

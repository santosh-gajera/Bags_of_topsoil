<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'bags-of-topsoil');
if ( !class_exists( 'Calculate_Topsoil_Bags' ) ) {
	class Calculate_Topsoil_Bags {
		public function __construct() {
			$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
			$this->conn = $conn;
		}
		
		public function feetToMeters($feet){
			return $feet * 0.3048;
		}
		
		public function yardsToMeters($yards){
			return $yards * 0.9144;
		}
		
		public function centimetersToMeters($centimeters){
			return $centimeters * 0.01;
		}
		
		public function inchesToMeters($inches){
			return $inches * 0.0254;
		}
		
		public function SetMeasurementUnit($measureunit) {
			$this->measurementunit = $measureunit;
		}
		
		public function GetMeasurementUnit() {
			return $this->measurementunit;
		}
		
		public function SetDepthMeasurementUnit($depthmeasureunit) {
			$this->depthmeasurementunit = $depthmeasureunit;
		}
		
		public function GetDepthMeasurementUnit() {
			return $this->depthmeasurementunit;
		}
		
		public function SetDimensions($length, $width, $depth) {
			$this->dimensions = $length * $width * $depth;
		}
		
		public function GetDimensions() {
			return $this->dimensions;
		}
		
		public function SetMeteresSquared($length, $width) {
			if($this->measurementunit == 'feet') {
				$length = $this->feetToMeters($length);
				$width = $this->feetToMeters($width);
			}
			if($this->measurementunit == 'yards') {
				$length = $this->yardsToMeters($length);
				$width = $this->yardsToMeters($width);
			}
			$this->meteressquared = $length * $width;
		}
		
		public function GetMeteresSquared() {
			return $this->meteressquared;
		}
		
		public function SetCubicMeter($depth) {
			if($this->depthmeasurementunit == 'centimeters') {
				$depth = $this->centimetersToMeters($depth);
			}
			if($this->depthmeasurementunit == 'inches') {
				$depth = $this->inchesToMeters($depth);
			}
			$this->cubicmeter = $this->meteressquared * $depth;
		}
		
		public function GetCubicMeter() {
			return $this->cubicmeter;
		}
		
		public function CalculateBags() {
			return round( $this->meteressquared * 1.4 * 0.025 );
		}
		
		public function CalculateCubicBags() {
			return round( $this->cubicmeter * 1.4 * 0.025 );
		}
		
		public function SaveObject( $measurementunit, $depthmeasurementunit, $length, $width, $depth, $meteressquared, $cubicmeter, $totalbags, $totalcubicbags ) {
			$query = "INSERT INTO `bags-calculation-result` (`measurementunit`, `depthmeasurementunit`, `length`, `width`, `depth`, `meteressquared`, `cubicmeter`, `totalbags`, `totalcubicbags`) VALUES('$measurementunit', '$depthmeasurementunit', $length, $width, $depth, '$meteressquared', '$cubicmeter', $totalbags, $totalcubicbags )";
			mysqli_query($this->conn, $query);
		}
	}
}
new Calculate_Topsoil_Bags();

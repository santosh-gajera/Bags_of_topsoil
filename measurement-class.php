<?php
if ( !class_exists( 'Calculate_Topsoil_Bags' ) ) {
	class Calculate_Topsoil_Bags {
		public function __construct() {
			
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
			$this->meteressquared = $length * $width;
		}
		
		public function GetMeteresSquared() {
			return $this->meteressquared;
		}
		
		public function CalculateBags() {
			return round( $this->meteressquared * 1.4 * 0.025 );
		}
		
		public function SaveObject() {
			
		}
	}
}
new Calculate_Topsoil_Bags();

<style>
.cat > select{
    -webkit-appearance: none;
    -moz-appearance: none;
    text-indent: 1px;
    text-overflow: '';
	color:#808080;
}</style>

		 <div class="toolsBar">
									<div class="cell-12 left products-filter-top">
										<div class="left cat">
										<span>Category: </span>
										<!--<div style="background-color:#555;padding:10px;float:"><?php //echo $movCategory; ?></div> -->
										<select onchange="location = this.options[this.selectedIndex].value;" class="cat">
											<option><?php echo strtoupper($movCategory); ?></option>
											</select>
										</div>
										<div class="left">
											<span>Quality:</span>
											<select onchange="location = this.options[this.selectedIndex].value;">
											<?php echo QualityCollect($movCategory,$movquality); ?>
											</select>
										</div>
										<div class="left">
											<span>Genre:</span>
											<select onchange="location = this.options[this.selectedIndex].value;">
												<?php echo GenreCollect($movCategory,$movGenre); ?>
											</select>
										</div>
										<div class="left">
											<span>Year:</span>
											<select onchange="location = this.options[this.selectedIndex].value;">
												<?php echo YearCollect($movCategory,$year); ?>
											</select>
										</div>
										
									</div>
									<div class="right cell-2 list-grid">
										<!--<a class="list-btn" href="#" data-title="List view" data-tooltip="true"><i class="fa fa-list"></i></a>-->
										<!--<a class="grid-btn selected" href="#" data-title="Grid view" data-tooltip="true"><i class="fa fa-th"></i></a>-->
									</div>
							</div>
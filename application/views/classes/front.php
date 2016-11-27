<div id = 'classes'>
	<h1 class = 'main-title'>Classes</h1>
	<h2 class = 'sub-title'>Our Classes are not just rooms but Knowledge for Students</h2>
		<?php $index = 0; ?>
<div class='container'>
<?php 
	for($i = 0 ; $i < count($classes) ; ){
?> 
	<div class = 'row'>
		<?php for($j = 0 ; $j < 3 && $i < count($classes) ; $j++ , $i++){
			$item = $classes[$i] ;
		?>
		<div style = 'margin-top : 10px; border-radius : 30%;' class = 'col-sm-4'>
			<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
				<div class="flipper">
					<div class="front">
						<div class = 'class-front'>
							<div class = 'class-image-container'>
								<a href = "<?=base_url()?>index.php/classes/view/<?=$classes[$i]['class_id']?>">
									<img class = 'mythumbnail' src = '<?=base_url()?>res/classes/<?=$classes[$i]['class_id']?>/img.jpg' />
								</a>
							</div>	
							<p class = 'class-name'><?=$classes[$i]['class_name']?></p>		
						</div>
					</div>
					<div class="back">
						<div class = 'class-back'></div>
					</div>
				</div>
			</div>
		</div>
	
	<?php } ?> 
</div>
<?php } ?>
</div>
</div>
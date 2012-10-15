<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<link href="<?php echo base_url();?>asset/css/cap-slide.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>asset/js/jquery.capSlide.js"></script>
<script type="text/javascript">
	$(function() {
		$(".whole-galery").capslide({
			caption_color : 'black',
			caption_bgcolor : '#f68a21',
			overlay_bgcolor : '#f68a21',
			border : '',
			showcaption : false
		});
	});
	</script>

	
<?php foreach ($images as $item): ?>	
	<div class="whole-gallery">
		<a href="#">
			<img src="<?php echo $item;?>" width="240" height="180" alt=""/>
			<br>Caption
		</a>
	</div>
<?php endforeach;
	echo print_r($pictures);
?>
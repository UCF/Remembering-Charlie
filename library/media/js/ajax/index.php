<?php
	$youtube_id = (isset($_GET['youtube'])) ? $_GET['youtube'] : 0;
	if($youtube_id):
?>
<object width="1068" height="604">
	<param name="bgcolor" value="#000000"></param>
	<param name="allowFullScreen" value="true"></param>
	<param name="movie" value="http://www.youtube.com/v/<?=$youtube_id?>&hl=en_US&fs=1&rel=0&hd=1"></param>
	<param name="allowscriptaccess" value="always"></param>
	<embed src="http://www.youtube.com/v/<?=$youtube_id?>&hl=en_US&fs=1&rel=0&hd=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="1068" height="604" bgcolor="#000000"></embed>
</object>

<?php endif; 
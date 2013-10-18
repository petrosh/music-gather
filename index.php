<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>music-gather</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- SOUNDCLOUD -->
	<script src="//connect.soundcloud.com/sdk.js"></script>
	<script src="js/music-gather.js"></script>
</head>
<body>
	<!-- <div id="fb-root"></div> include facebook.js-->
	<?php
	/**
	 * PHP OUTPUT
	 *
	 */

	/**
	 * BASE 64
	 *
	 */
	// LEVATO <div id="fb-root"></div>
	$string='<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs); }(document, \'script\', \'facebook-jssdk\'));</script>
	<div class="fb-post" data-href="https://www.facebook.com/sonormusiceditions/posts/155486794660479" data-width="550"><div class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/sonormusiceditions/posts/155486794660479">post</a> di <a href="https://www.facebook.com/sonormusiceditions">SONOR Music Editions</a>.</div></div>
	';
	$encoded=base64_encode($string);
	//echo $encoded;
	//echo stripslashes(base64_decode($encoded));
	//echo'<pre>'; print_r($tracks); echo'</pre>';
	?>
	<h2>db</h2><div id="db"></div>
	<input type="button" id="loadTracks" value="Update tracks from Soundcloud" />
	<input type="button" id="loadDb" value="Update Flintstone" />
	<input type="button" id="flushDb" value="Flush db" />
	<h2>tracks</h2><ul id="track"></ul>
	<fieldset>
		<legend>runtime</legend>
		<div id="runtime"></div>
	</fieldset>
</body>
</html>
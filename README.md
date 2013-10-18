Music gather
============

[music-gather](https://github.com/petrosh/music-gather) - API driven PHP aggregator for musical contents – Flintstone on stage

Data
----

- bandcamp / player – *share / embed*
	```html
	<iframe style="border: 0; width: 350px; height: 470px;" src="http://bandcamp.com/EmbeddedPlayer/album=2338123705/size=large/bgcol=ffffff/linkcol=0687f5/notracklist=true/transparent=true/" seamless><a href="http://syntheticshadows.bandcamp.com/album/diaframma-live-1983-ss06">DIAFRAMMA - Live 1983 (SS06) by Synthetic Shadows</a></iframe>
	```

- facebook / post – *incorpora post*
	```html
	<div id="fb-root"></div> <script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
	<div class="fb-post" data-href="https://www.facebook.com/sonormusiceditions/posts/155486794660479" data-width="550"><div class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/sonormusiceditions/posts/155486794660479">post</a> di <a href="https://www.facebook.com/sonormusiceditions">SONOR Music Editions</a>.</div></div>
	```

Tables
------

- bandcamp
	```php
	$bandcamps = Flintstone::load('users', $options);
	$bandcamps->set(timestamp, array('title'=>'primo post', 'code'=>''))
	```

- soundcloud (logged with facebook)
	```javascript
	
	```
/**
 * loadDb
 * f = function (load, save, flush); t = table (flintstone load);
 * d = data (empty or json array); i = index (empty or record id in table)
 */

function loadDb(f,t,d,i){
	console.log({ "t" : t, "d" : d, "f" : f, "i" : i })
    $.post('php/db.php', { "t" : t, "d" : d, "f" : f, "i" : i }, function(respond){
		$.each(respond, function(key,value) {
			$("#db").append( '<a href="#" class="loadRec" data-id="'+value+'" data-table="soundcloud">'+key+'</a><br>' );
		});
	},'json');
	return true;
}

/**
 * JQUERY
 *
 */
$(document).ready(function(){
	console.log('jquery version '+$().jquery);
	loadDb('load','soundcloud','','');
	loadRuntime();
});

function loadRuntime(){
	var options = { "t": "soundcloud", "d": "", "f": "display", "i": "index"};
	$.ajax({
		url: "php/db.php",
		data: options,
		type: "POST",
		dataType: "json",
		success: function( response ){
			$.each(response, function( key, value ) {
				$("#runtime").append( value.id + ' - ' + value.title );
			});
			
		},
		error: function( request, status, error ){
			console.log( request, status, error );
		}
	})
	return true;
}
	
SC.initialize({
  client_id: "e31d6d4ea94c769510c7742a731ee87b"
});

$("#loadTracks").live("click", function(){
	// https://soundcloud.com/armagideon-times/sets/sonor-music-editions
	SC.get("/playlists/11888204", {limit: 100}, function(playlist){			
		for (i in playlist['tracks']) {
			$('#track').append('<li>'+playlist['tracks'][i]['title']+' <a href="#" class="addSC" data-track="'+playlist['tracks'][i]['id']+'">add</a></li>');
		};
		//var track = tracks[0];
		//SC.oEmbed(track.uri, document.getElementById("track"));
	});
});

$("#loadDb").live("click", function(e){
	e.preventDefault();
	loadDb('load','soundcloud','','');
});

$("#flushDb").live("click", function(e){
	e.preventDefault();
	loadDb('flush','soundcloud','','');
});
	
$('.addSC').live("click", function(e){
	e.preventDefault();
	var id=$(this).attr('data-track');
	SC.get("/tracks/"+id, {limit: 1}, function(track){
		loadDb('save','soundcloud',JSON.stringify(track),'');
	});
});

$('.loadRec').live("click", function(e){
	e.preventDefault();
	var id=$(this).attr('data-id');
	var table=$(this).attr('data-table');
	loadRec('load',table,'',id);
});

function loadRec(f,t,d,i){
	console.log({ "t" : t, "d" : d, "f" : f, "i" : i })
    $.post('php/db.php', { "t" : t, "d" : d, "f" : f, "i" : i }, function(respond){
		console.log(respond);
		$("#db").html('');
		$.each(respond, function(key,value) {
			$("#db").append( '<i>'+key+':</i> '+value+'<br>' );
		});
	},'json');
	return true;
}

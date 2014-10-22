
$(function() { 

	//CUSTOM PLAYER
	 // inner variables
    var song;
    var tracker = $('.tracker');
    var volume = $('.volume');
    var playlistButton = $('.pl');
    var playlist = $('.playlist');

    function initAudio(elem) {
        var url = elem.attr('audiourl');
        var title = elem.text();
        var cover = elem.attr('cover');
        var artist = elem.attr('artist');

        $('.player .title').text(title);
        $('.player .artist').text(artist);
        $('.player .cover').css('background-image','url(asset/albumcover/40_40/' + cover+')');;

        song = new Audio(url);

        // timeupdate event listener
        song.addEventListener('timeupdate',function (){
            var curtime = parseInt(song.currentTime, 10);
            tracker.slider('value', curtime);
        });

        $('.playlist li').removeClass('active');
        elem.addClass('active');
    }
    function playAudio() {
        song.play();

        tracker.slider("option", "max", song.duration);

        $('.play').addClass('hidden');
        $('.pause').addClass('visible');
    }
    function stopAudio() {
        song.pause();

        $('.play').removeClass('hidden');
        $('.pause').removeClass('visible');
    }

    // play click
    $('.play').click(function (e) {
        e.preventDefault();

        playAudio();
    });

    // pause click
    $('.pause').click(function (e) {
        e.preventDefault();

        stopAudio();
    });

    // forward click
    $('.fwd').click(function (e) {
        e.preventDefault();

        stopAudio();

        var next = $('.playlist li.active').next();
        if (next.length == 0) {
            next = $('.playlist li:first-child');
        }
        initAudio(next);
    });

    // rewind click
    $('.rew').click(function (e) {
        e.preventDefault();

        stopAudio();

        var prev = $('.playlist li.active').prev();
        if (prev.length == 0) {
            prev = $('.playlist li:last-child');
        }
        initAudio(prev);
    });

    // show playlist
    $(playlistButton).click(function (e) {
        e.preventDefault();
        if ( $(playlist).hasClass('sixteen'))
        {
        	$('.playlist').removeClass('sixteen columns');
        } 
        else
        {
        	$('.playlist').addClass('sixteen columns');
        }
        
    });

    $

    // playlist elements - click
    $('.playlist li').click(function () {
        stopAudio();
        initAudio($(this));
    });

    // initialization - first element in playlist
    initAudio($('.playlist li:first-child'));

    // set volume
    song.volume = 0.8;

    // initialize the volume slider
    volume.slider({
        range: 'min',
        min: 1,
        max: 100,
        value: 80,
        start: function(event,ui) {},
        slide: function(event, ui) {
            song.volume = ui.value / 100;
        },
        stop: function(event,ui) {},
    });

    // empty tracker slider
    tracker.slider({
        range: 'min',
        min: 0, max: 10,
        start: function(event,ui) {},
        slide: function(event, ui) {
            song.currentTime = ui.value;
        },
        stop: function(event,ui) {}
    });



	//#END CUSTOM PLAYER

	//START AUDIOJS
	// Setup the player to autoplay the next track
	// var a = audiojs.createAll({
	//   trackEnded: function() {
	//     var next = $('ol li.playing').next();
	//     if (!next.length) next = $('ol li').first();
	//     next.addClass('playing').siblings().removeClass('playing');
	//     audio.load($('a', next).attr('data-src'));
	//     audio.play();
	//   }
	// });

	// // Load in the first track
	// var audio = a[0];
	//     first = $('ol a').attr('data-src');
	// $('ol li').first().addClass('playing');
	// audio.load(first);

	// // Load in a track on click
	// $('ol li').click(function(e) {
	//   e.preventDefault();
	//   $(this).addClass('playing').siblings().removeClass('playing');
	//   audio.load($('a', this).attr('data-src'));
	//   audio.play();
	// });
	// // Keyboard shortcuts
	// $(document).keydown(function(e) {
	//   var unicode = e.charCode ? e.charCode : e.keyCode;
	//      // right arrow
	//   if (unicode == 39) {
	//     var next = $('li.playing').next();
	//     if (!next.length) next = $('ol li').first();
	//     next.click();
	//     // back arrow
	//   } else if (unicode == 37) {
	//     var prev = $('li.playing').prev();
	//     if (!prev.length) prev = $('ol li').last();
	//     prev.click();
	//     // spacebar
	//   } else if (unicode == 32) {
	//     audio.playPause();
	//   }
	// });

	//#END AUDIOJS
});


  
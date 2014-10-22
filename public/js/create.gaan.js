$(function(document){
	console.log('doc ready');
	var gaanForm = $('form#gaanform');
	console.log(gaanForm);
	$('input[type="file"]').on('change', function(evnt) {
		
	    id3(this.files[0], function(err, tags) {
	        console.log(tags);
	        // populate input fields
	        $('input[name="title"]').val(tags.title);
	        $('input[name="artist"]').val(tags.artist);
	        $('input[name="album"]').val(tags.album);
	        $('input[name="trackno"]').val(tags.v1.track);
	        $('input[name="genre"]').val(tags.v1.genre);
	        $('input[name="year"]').val(tags.year);

	        $('input[name="publisher"]').val(tags.v2.publisher);
	        $('input[name="composer"]').val(tags.v2.composer);
	        $('input[name="band"]').val(tags.v2.band);

	        evnt.preventDefault();
	    });
	});


	// ANGULARJS
	// function GaanCtrl($scope) {
	//   $scope.checkID3Tag = function() {
	//   	console.log = 'file selected';
	//   };
	// }
	// #ANGULARJS

}); //END DOC END
App = Ember.Application.create();

App.Router.map(function() {
  // put your routes here
    this.resource('artists', function(){
        this.route('songs', { path: ':slug' });
    });
});



App.ArtistsRoute = Ember.Route.extend({
    model: function() {
        var artistObjects = [];
        Ember.$.getJSON('http://bazana.app/artist', function(artists) {
        //console.log(artists);
            artists.forEach(function(data) {
                artistObjects.pushObject(App.Artist.createRecord(data));
            });
        });
        return artistObjects;
    },
    actions: {
        createArtist: function() {
            var name = this.get('controller').get('newName');

            Ember.$.ajax('http://bazana.app/artist', {
                type: 'POST',
                dataType: 'json',
                data: { name: name },
                context: this,
                success: function(data) {
                    var artist = App.Artist.createRecord(data);
                    this.modelFor('artists').pushObject(artist);
                    this.get('controller').set('newName', '');
                    this.transitionTo('artists.songs', artist);
                },
                error: function() {
                    alert('failed to save artist');
                }
            });
        }
    }
});


App.ArtistsController = Ember.ArrayController.extend({
    newName: '',
    disabled: function() {
        return Ember.isEmpty(this.get('newName'));
    }.property('newName')
});


App.StartRating = Ember.View.extend({
    className: ['rating-panel'],
    templateName: 'star-rating',

    rating: Ember.computed.alias('context.rating'),
    fullStars: Ember.computed.alias('rating'),
    numStars: Ember.computed.alias('maxRating'),

    stars: function() {
        var ratings = [];
        var fullStars = this.startRange(1, this.get('fullStars'), 'full');
        var emptyStars = this.startRange(this.get('fullStars') + 1, this.get('numStars'), 'empty' );
        Array.prototype.push.apply(ratings, fullStars);
        Array.prototype.push.apply(ratings, emptyStars);
        return ratings;
    }.property('fullStars', 'numStars'),

    startRange: function(start, end, type) {
        var starsData = [];
        for ( i = start; i <= end; i++ ) {
            starsData.push({ rating: i, full: type === 'full' });
        };
        return starsData;
    }

});

<?php namespace Bazna\Repo;

//GAAN
use Gaan;
use Bazna\Repo\Gaan\EloquentGaan;

use Artist;
use Bazna\Repo\Artist\EloquentArtist;

use Album;
use Bazna\Repo\Album\EloquentAlbum;
//#GAAN

//USER
use User;
use Bazna\Repo\User\EloquentUser;
//#USER



use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app->bind('Bazna\Repo\Artist\ArtistInterface', function($app)
        {
            $artist =  new EloquentArtist(
                new Artist
            );

            return $artist;
        });

        $app->bind('Bazna\Repo\User\UserInterface', function($app)
        {
            $user =  new EloquentUser(
                new User
            );

            return $user;
        });


        $app->bind('Bazna\Repo\Album\AlbumInterface', function($app)
        {
            $album =  new EloquentAlbum(
                new Album
            );

            return $album;
        });

        $app->bind('Bazna\Repo\Gaan\GaanInterface', function($app)
        {
            $gaan =  new EloquentGaan(
                new Gaan,
                $app->make('Bazna\Repo\Artist\ArtistInterface', 'Bazna\Repo\Artist\EloquentArtist'),
                $app->make('Bazna\Repo\Album\AlbumInterface', 'Bazna\Repo\Album\EloquentAlbum')
            );

            return $gaan;
        });

    }

}
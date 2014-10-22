<?php
use Bazna\Repo\Artist\ArtistInterface;

class ArtistsController extends \BaseController {

	protected $artist;

	public function __construct(ArtistInterface $artist)
	{
		$this->artist = $artist;
	}


	/**
	 * Display a listing of Artist.
	 *
	 * @return view with paginated Artist
	 */
	public function index()
	{
        //get recent artists
        $artistsData= $this->artist->getRecent();
        if ($artistsData)
        {
            if (Request::ajax())
                //return 'ajax';
                return Respone::json(array( 'items'=>$data->toArray()), 200)->setCallback(Input::get('callback'));
            else
                //return 'web';
                return View::make('artists.index')->with('artistsData', $artistsData);
        }
        else
        {
            $errors = $this->artist->whatErrors();
            return Response::json(array($errors['code'], 'status'=>$errors['evils'] ), 400);
        }
		// return View::make('artists.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        echo 'show artist create form';
		//return View::make('artists.index');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$result = $this->artist->create($input);
		if ($result)
			return Response::json(array('code'=>201, 'status'=>'Created'));
        else
        {
            $errors = $this->artist->whatErrors();
			return Response::json(array('code'=>$errors['code'], 'status'=>$errors['evils'] ));
        }
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		echo '<p>Update Artist:<pre>'; var_dump($this->artist->get($id)); echo '</pre></p>';
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$artistData = $this->artist->get($id);

		if ($artistData)
            if (Request::ajax())
            {
                //return 'ajax';
                return Response::json(array('code'=>201, 'status'=>'Success', 'data'=>$artistData->toArray()));
            }
            else
            {
                //return 'web';
                return View::make('artists.show')->with('artistData', $artistData);
            }
        else
        {
            $errors = $this->artist->whatErrors();
			return Response::json(array('code'=>$errors['code'], 'status'=>$errors['evils'] ));
        }
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		echo '<p>Edit Artist:<pre>'; var_dump($this->artist->get($id)); echo '</pre></p>';
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//echo '<p>'.$id.'#Destroy Artist:</p>';
        $deleted = $this->artist->delete($id);
        if($deleted)
			return Response::json(array('code'=>200, 'status'=>'Ok'));
        else
        {
            $errors = $this->artist->whatErrors();
			return Response::json(array('code'=>$errors['code'], 'status'=>$errors['evils'] ));
        }
	}

}

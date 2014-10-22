<?php
use Bazna\Repo\Album\AlbumInterface;

class AlbumsController extends \BaseController {

	protected $album;

	public function __construct(AlbumInterface $album)
	{
		$this->album = $album;
	}


	/**
	 * Display a listing of album.
	 *
	 * @return view with paginated album
	 */
	public function index()
	{
		echo 'album index';
		// return View::make('albums.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        echo 'show album create form';
		//return View::make('albums.index');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$result = $this->album->update($input);
		if ($result)
			return Response::json(array('code'=>201, 'status'=>'Created'));
        else
        {
            $errors = $this->album->whatErrors();
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
        $input = Input::all();
        $result = $this->album->get($id);
        echo '<p>Update this<pre>'; var_dump($result); echo '</pre></p>';
        //if ($result)
            //return Response::json(array('code'=>200, 'status'=>'Ok'));
        //else
        //{
            //$errors = $this->album->whatErrors();
            //return Response::json(array('code'=>$errors['code'], 'status'=>$errors['evils'] ));
        //}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = $this->album->get($id);

		if ($data)
			return Response::json(array('code'=>201, 'status'=>'Success', 'data'=>$data));
        else
        {
            $errors = $this->album->whatErrors();
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
		echo '<p>Edit album:<pre>'; var_dump($this->album->get($id)); echo '</pre></p>';
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//echo '<p>'.$id.'#Destroy album:</p>';
        $deleted = $this->album->delete($id);
        if($deleted)
			return Response::json(array('code'=>200, 'status'=>'Ok'));
        else
        {
            $errors = $this->album->whatErrors();
			return Response::json(array('code'=>$errors['code'], 'status'=>$errors['evils'] ));
        }
	}

}

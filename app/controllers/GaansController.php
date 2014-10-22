<?php
use Bazna\Repo\Gaan\GaanInterface;

class GaansController extends \BaseController {

	protected $gaan;

	public function __construct(GaanInterface $gaan = null)
	{
		$this->gaan = ($gaan === null)? new GaanInterface : $gaan;
		//filters
		//$this->beforeFilter('csrf', array('on' => 'post'));

		//$this->beforeFilter('auth_admin', array('only' => 'create', 'store', 'edit', 'update', 'destroy' ));
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get data
        $gaanData = $this->gaan->getRecent();
        if ($gaanData)
            if (Request::ajax())
                return Response::json(array( 'gaans'=>$gaanData->toArray()), 200)->setCallback(Input::get('callback'));
            else
                return Response::json(array( 'gaans'=>$gaanData->toArray()), 200);
        else
        {
            $errors = $this->artist->whatErrors();
            return Response::json(array($errors['code'], 'status'=>$errors['evils'] ), 400);
        }
		// return View::make('gaans.index', array('gaans'=>$gaanData));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        //echo 'show form';
		return View::make('gaans.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$result = $this->gaan->create($input);
		if($result === 1)
			return Response::json(array('status'=>1, 'msg'=>'Gaan Uploaded Succesfully'));
		else
			return Response::json(array('status'=>0, 'msg'=>'Failed to create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		dd($this->gaan->byId($id));
		// return View::make('gaans.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('gaans.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		echo 'update edited gaan';
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		echo 'edited song';
	}

}

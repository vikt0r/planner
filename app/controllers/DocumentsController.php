<?php
use Planner\Repo\Document\DocumentInterface;

class DocumentsController extends \BaseController {

	protected $document;

	public function __construct(DocumentInterface $document = null)
	{
		$this->document = ($document === null)? new DocumentInterface : $document;
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
        $documentData = $this->document->getRecent();
        if ($documentData)
            if (Request::ajax())
                return Response::json(array( 'documents'=>$documentData->toArray()), 200)->setCallback(Input::get('callback'));
            else
                return Response::json(array( 'documents'=>$documentData->toArray()), 200);
        else
        {
            $errors = $this->artist->whatErrors();
            return Response::json(array($errors['code'], 'status'=>$errors['evils'] ), 400);
        }
		// return View::make('documents.index', array('documents'=>$documentData));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        //echo 'show form';
		return View::make('documents.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$result = $this->document->create($input);
		if($result === 1)
			return Response::json(array('status'=>1, 'msg'=>'document Uploaded Succesfully'));
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
		dd($this->document->byId($id));
		// return View::make('documents.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('documents.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		echo 'update edited document';
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

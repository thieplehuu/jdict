<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\GuestStoreWordRequest;
use App\Models\Category;
use App\Models\Word;
use Session;
use App\Models\Meaning;
class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 * @param \Illuminate\Http\Request $request
     *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{		
		$perPage = 5;
		$meanings = array();
		$words = array();
		$search = "";
		$category_id = null;
		if (!empty($request->all())) {
			
			
			$data = $request->all();
			$search_unique = null;
			
			if(isset($data['category_id']) && $data['category_id'] > 0){
				$category_id = $data['category_id'];
			}
			if(isset($data['search_unique'])){
				$search = $data['search_unique'];					
				$words = Word::where('word', '=', "$search")
				->orWhere('furigana', '=', "$search")
				->orWhere('related', '=', "$search")				
				->with('means')->paginate($perPage);
			}else{
				if(isset($data['search'])){
					$search = $data['search'];
				}
				if($category_id > 0){
					$words = Word::join('category_word', function($join) {
				     	$join->on('words.id', '=', 'category_word.word_id');
					})->where('category_word.category_id', '=', $category_id)
					->where(function ($query)  use ($search){
						$query->where('word', 'LIKE', "$search%")
						->orWhere('furigana', 'LIKE', "$search%")
						->orWhere('related', 'LIKE', "$search%");
					})
					->with('means')->paginate($perPage);
				} else {
					$words = Word::where(function ($query)  use ($search){
						$query->where('word', 'LIKE', "$search%")
						->orWhere('furigana', 'LIKE', "$search%")
						->orWhere('related', 'LIKE', "$search%");
					})
					->with('means')->paginate($perPage);
				}
			}

		}
		if($category_id == null){
			$category_id = 0;
		}

		$categories =  Category::pluck('name', 'id')->all();
		$categories[0] = 'All';
		ksort($categories);
		return view('home.index', compact('categories','words', 'search', 'category_id'));
	}
	
	public function autocomplete(Request $request){
		
		$perPage = 10;
		$results = array();
		$query = $request->query();
		$term = $query['query'];
		$words = Word::where('word', 'LIKE', '%'.$term.'%')
		->orWhere('furigana', 'LIKE', "$term%")
		->paginate($perPage);
		$results = array();
		foreach ($words as $word)
		{
			$results[] = $word->word;
		}
		return response()->json($results);
		
	}
	
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function add_word($word = null)
    {
    	$categories = Category::pluck('name', 'id');
    	return view('home.add_word', compact('word'))->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(GuestStoreWordRequest $request)
    {
    	 
        $word = new Word();        
        $word->word = $request->word;
        $word->furigana = $request->furigana;
        $word->related = $request->related;
        $word->published = 0;
        $word->save();        
        $word->categories()->sync($request->category_list, false);
        
        $meanings = array();
        
        foreach ($request->meaning as $key => $value){
        	$meanings[] = new Meaning(array('meaning' => $value['mean'], 'examples' => $value['examples']));
        }
        
        $word->means()->saveMany($meanings);
        
        Session::flash('flash_message', 'Word added!');

        return redirect('home/add_word');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
    	$word = Word::with('means')->with('categories')->findOrFail($id);
    	return view('home.show', compact('word'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function related($related)
    {
    	$word = Word::where('word', '=', $related)->with('means')->with('categories')->first();
    	if($word){
    		return view('home.related', compact('word'));
    	}else{
    		return view('home.related', compact('related'));
    	}
    }
}

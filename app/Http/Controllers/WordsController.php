<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWordRequest;
use App\Http\Requests\UpdateWordRequest;
use Session;
use App\Models\Word;
use App\Models\Category;
use App\Models\Meaning;
use Excel;

class WordsController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 10;
        $search = "";
        $category_id = 0;        
        $words = null;
        
        $data = $request->all();
        //print_r($data); die();
        if(isset($data['category_id']) && $data['category_id'] > 0){
        	$category_id = $data['category_id'];
        }
        if(isset($data['search'])){
        	$search = $data['search'];
        }
        
        if($category_id > 0){
        	$words = Word::join('category_word', function($join) {
        		$join->on('words.id', '=', 'category_word.word_id');
        	})->where('category_word.category_id', '=', $category_id);
        }
        if (!empty($search)) {
        	if($words != null){
        		$words = $words->where(function ($query)  use ($search){
        			$query->where('word', 'LIKE', "$search%")
        			->orWhere('furigana', 'LIKE', "$search%")
        			->orWhere('related', 'LIKE', "$search%");
        		});
        	}else{
	            $words = Word::where('word', 'LIKE', "%$search%")
					->orWhere('furigana', 'LIKE', "%$search%")
					->orWhere('related', 'LIKE', "%$search%")
					->orderBy('created_at', 'desc');
        	}
        }
        
        if($words == null){
            $words = Word::orderBy('created_at', 'desc');
        }
			
        $words = $words->paginate($perPage);
        $categories =  Category::pluck('name', 'id')->all();
        $categories[0] = 'All';
        ksort($categories);
        return view('words.index', compact('words', 'categories', 'search', 'category_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
    	$categories = Category::pluck('name', 'id');
        return view('words.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreWordRequest $request)
    {
    	
        $word = new Word();        
        $word->word = $request->word;
        $word->furigana = $request->furigana;
        $word->related = $request->related;
        $word->published = 1;
        if($request->published == 'on'){
        	$word->published = 0;
        }
        $word->save();        
        $word->categories()->sync($request->category_list, false);
        
        $meanings = array();
        
        foreach ($request->meaning as $key => $value){
        	$meanings[] = new Meaning(array('meaning' => $value['mean'], 'examples' => $value['examples']));
        }
        
        $word->means()->saveMany($meanings);
        
        Session::flash('flash_message', 'Word added!');

        return redirect('words/create');
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
        return view('words.show', compact('word'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $word = Word::with('means')->with('categories')->findOrFail($id);
        $categories = Category::pluck('name', 'id');
        return view('words.edit', compact('word', 'categories'));
    }
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function publish($id)
    {
    	$word = Word::findOrFail($id);
    	$word->published = 1;
    	$word->save();    	
    	Session::flash('flash_message', 'Confirm Success!');
    	return redirect('words/reviews');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdateWordRequest $request)
    {
        
        $requestData = $request->all();
        
        $word = Word::findOrFail($id);
        
        $word->update($requestData);
        
        $word->categories()->sync($request->category_list);
        
        $meanings = array();
        foreach ($request->meaning as $key => $value){
        	$meanings[] = new Meaning(array('meaning' => $value['mean'], 'examples' => $value['examples']));
        }
        $word->means()->delete();
        $word->means()->saveMany($meanings);
        
        Session::flash('flash_message', 'Word updated!');

        return redirect('words');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Word::destroy($id);

        Session::flash('flash_message', 'Word deleted!');

        return redirect('words');
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    
    public function reviews(Request $request)
    {

    	$search = "";
    	$category_id = null;
    	$words = null;    	
    	$perPage = 10;
    	
    	$requestData = $request->all();
    	if(isset($requestData['category_id']) && $requestData['category_id'] > 0){
    		$category_id = $requestData['category_id'];
    	}
    	if(isset($requestData['search'])){
    		$search = $requestData['search'];
    	}
    	
    	if($category_id > 0){
    		$words = Word::join('category_word', function($join) {
    			$join->on('words.id', '=', 'category_word.word_id');
    		})->where('category_word.category_id', '=', $category_id);
    	}
    	
    	if (!empty($search)) {
    		if($words != null){
    			$words = $words->where('published', '=', "0")
    			->where(function ($query) use ($search){
    				$query->where('word', 'LIKE', "%$search%")
    				->orWhere('furigana', 'LIKE', "%$search%")
    				->orWhere('related', 'LIKE', "%$search%")
    				->orderBy('created_at', 'desc');
    			});
    		} else{
    			$words = Word::where('word', 'LIKE', "%$search%")
    			->orWhere('furigana', 'LIKE', "%$search%")
    			->orWhere('related', 'LIKE', "%$search%")
    			->orderBy('created_at', 'desc');
    		}
    		
    	}
    	
    	if($words == null){
    		$words = Word::where('published', '=', "0")
					->orderBy('created_at', 'desc');
    	}
    	
    	$words = $words->paginate($perPage);

    	$categories =  Category::pluck('name', 'id')->all();
    	$categories[0] = 'All';
    	ksort($categories);
    	
    	return view('words.reviews', compact('words', 'categories', 'search', 'category_id'));
    }
    
    public function export($type, $category_id, $search = null)
    {
    
    	$words = null;    	
    	if($category_id > 0){
    		$words = Word::join('category_word', function($join) {
    			$join->on('words.id', '=', 'category_word.word_id');
    		})->where('category_word.category_id', '=', $category_id);
    	}
    	if (!empty($search)) {
    		if($words != null){
    			$words = $words->where(function ($query)  use ($search){
    				$query->where('word', 'LIKE', "$search%")
    				->orWhere('furigana', 'LIKE', "$search%")
    				->orWhere('related', 'LIKE', "$search%");
    			});
    		}else{
    			$words = Word::where('word', 'LIKE', "%$search%")
    			->orWhere('furigana', 'LIKE', "%$search%")
    			->orWhere('related', 'LIKE', "%$search%")
    			->orderBy('created_at', 'desc');
    		}
    	}
    	
    	if($words == null){
    		$words = Word::orderBy('created_at', 'desc');
    	}
    	
    	$words = $words->with('means')->with('categories')->get()->toArray();
    	//print_r($words); die();
    	return Excel::create('words', function($excel) use ($words) {
    		$excel->sheet('mySheet', function($sheet) use ($words)
    		{
    			$sheet->getStyle('D')->getAlignment()->setWrapText(true);
    			
    			$index = 1;
    			$sheet->row($index,array('Vocabulary', 'Furigana', 'Related', 'Means', 'Categories'));
    			
    			foreach ($words as $word){
    				$index ++;
    				$row_data = array();
    				$row_data['word'] 		= $word['word'];
    				$row_data['furigana'] 	= $word['furigana'];
    				$row_data['related'] 	= $word['related'];
    				$means = '';
    				
    				$j = 0;
    				foreach ($word['means'] as $mean){
    					if(sizeof($word['means']) > 1){
	    					$j ++;
	    					$means 	.=  $j . ": ";
    					}
    					$means 	.= $mean['meaning'];
    					$means	.= "\r\n";
    					$means	.= $mean['examples'];
    					$means	.= "\r\n";
    				}
    				$row_data['means'] = $means;
    				
    				$categories = '';
    				foreach ($word['categories'] as $category){
    					$categories .= $category['name'];
    					$categories	.= ", ";
    				}
    				$categories = rtrim($categories, ", ");
    				$row_data['categories'] = $categories;
    				
    				$sheet->row($index,$row_data);
    			}
    			
    		});
    	})->download($type);
    }
    
    
}

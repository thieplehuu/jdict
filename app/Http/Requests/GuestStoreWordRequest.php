<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GuestStoreWordRequest extends StoreWordRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
    	$rules = [
        	'word' => 'required|unique:words|max:255',
        	'furigana' => 'required',
        ];
        
        foreach($this->request->get('meaning') as $key => $val)
        {
        	foreach($val as $key2 => $val2)
        	{
        		$rules['meaning.'.$key .'.'. $key2] = 'required';
        	}
        	
        }
        return $rules;
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
    	
    	return [
    			'word.required' => 'A word is required',
    			'furigana.required'  => 'A furigana is required',
    			'meaning.0.mean.required'  => 'A mean is required',
    			'meaning.0.examples.required'  => 'A examples is required',
    	];
    }
}

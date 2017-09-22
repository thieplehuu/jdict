<?php namespace App\Services;

use Collective\Html\FormBuilder;

class Macros extends FormBuilder {
	public function listMeaning($name, $selected = null, $options = array())
	{
		// When building a select box the "value" attribute is really the selected one
		// so we will use that when checking the model or session for a value which
		// should provide a convenient method of re-populating the forms on post.
		$selected = $this->getValueAttribute($name, $selected);
		
		$options['id'] = $this->getIdAttribute($name, $options);
		
		if (! isset($options['name'])) {
			$options['name'] = $name;
		}
		
		// We will simply loop through the options and build an HTML value for each of
		// them until we have an array of HTML declarations. Then we will join them
		// all together into one single HTML element that can be put on the form.
		$html = [];
		
		if (isset($options['placeholder'])) {
			$html[] = $this->placeholderOption($options['placeholder'], $selected);
			unset($options['placeholder']);
		}
		
		// Once we have all of this HTML, we can join this into a single element after
		// formatting the attributes into an HTML "attributes" string, then we will
		// build out a final select statement, which will contain all the values.
		$options = $this->html->attributes($options);
		
		$errors = $this->session->get('errors');
		$html = '';
		if(isset($this->model)){
			$i = 0;
			foreach ($this->model->means as $meaning){
				$index = $i+1;
				$html.= '<div class = "row" id = "'. $index .'">
				<div class="panel-custom col-md-10" ';
				if($i>0){
					$html.= ' style = "border-top: none"';
				}
				$html.='>
						<div class="form-group ';
						if(isset($errors) && $errors->has('meaning.'.$i.'.mean')){
							$html.= 'has-error';
						}						
						$html.= '">'
						.$this->label('meaning.0.mean', 'Meaning', ['class' => 'col-md-4 control-label'])
					    .'<div class="col-md-8">'
					    		.$this->textarea('meaning['.$i.'][mean]', $meaning['meaning'], ['id' => 'input-mean','class' => 'form-control', 'size' => '30x2']);
							if(isset($errors) ){
					        	$html.= $errors->first('meaning.'.$i.'.mean', '<p class="help-block">:message</p>');
							}
					    $html.='</div>
						</div>
					    <div class="form-group ';
						if(isset($errors) && $errors->has('meaning.'.$i.'.examples')){
							$html.= 'has-error';
						}						
						$html.= '">'
					    .$this->label('meaning.0.examples', 'Examples', ['class' => 'col-md-4 control-label'])
					    .'<div class="col-md-8">'
					    		.$this->textarea('meaning['.$i.'][examples]', $meaning['examples'], ['id' => 'input-example','class' => 'form-control', 'size' => '30x5']);	
							if(isset($errors) ){
					        $html.= $errors->first('meaning.'.$i.'.examples', '<p class="help-block">:message</p>');
							}
					    $html.='</div>
						</div> 
					</div>';
				if($i==0){
					$html.= '<div class="col-md-2">';							
					$html.= $this->button('Add', ['id' => 'btn-add-mean-field', 'class' => 'btn btn-primary']);
					$html.= '</div></div>';
				}else{
					$html.= '<div class="col-md-2">';
					$html.= $this->button('Remove', ['id' => 'btn-add-mean-field', 'class' => 'btn btn-primary', 'onclick' => 'removeMeanField(this)']);
					$html.= '</div></div>';
				}
				'</div>';
				$i++;
			}
			
		}else{
		}
		
	
		return $html;
	}
}
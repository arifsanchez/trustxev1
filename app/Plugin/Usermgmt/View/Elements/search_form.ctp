<div class="searchForm">
<?php
$isAjax=true;
if(isset($options['useAjax']) && !$options['useAjax']) {
	$isAjax=false;
}
if($isAjax) {
	$data = $this->Js->get('#'.$modelName.'Usermgmt')->serializeForm(array('isForm' => true, 'inline' => true));
	$this->Js->get('#'.$modelName.'Usermgmt')->event(
		  'submit',
		  $this->Js->request(
			array('action' => $this->request->action),
			array(
					'update' => '#'.$options['updateDivId'],
					'before' => '$("#'.$options['updateDivId'].'").html(\'<div class="loadning-indicator"></div>\');',
					'data' => $data,
					'async' => true,
					'dataExpression'=>true,
					'method' => 'POST'
				)
			)
		);
}
?>
<?php
	echo $this->Form->create(false, array('url' => '/'.$this->request->url, 'id' => $modelName.'Usermgmt'));
	if (isset($options['legend'])) {
		echo "<div class='searchTitle'>".$options['legend']."</div>";
	}
	echo $this->Form->input('Usermgmt.searchFormId', array('type' => 'hidden', 'value' => $modelName));

	if (isset($viewSearchParams)) {
		$jq = "<script type='text/javascript'>";
		foreach ($viewSearchParams as $field) {
			$search_options= $field['options'];
			$search_level = $search_options['label'];
			$search_options['label'] = false;
			$search_options['div'] = false;
			$search_options['autoComplete'] = "off";
			echo "<div style='display:inline-block'>";
			echo "<div class='tl'>".$this->Form->label(__($search_level))."</div>";
			echo "<div class='tf'>".$this->Form->input($field['name'], $search_options)."</div>";
			echo "<div style='clear:both'></div>";
			echo "</div>";
			if($search_options['type']=="text") {
				$parts = array_values(Set::filter(explode('.', $field['name']), true));
				$fieldModel = $modelName;
				$fieldName = $search_options['field'];
				if(isset($parts[1])) {
					$fieldModel = $parts[0];
					$fieldName = $parts[1];
				}
				$fieldId = $fieldModel.Inflector::camelize($fieldName);
				$url = SITE_URL."usermgmt/autocomplete/fetch/".$fieldModel."/".$fieldName;
				$jq .=  "$(function() {
							var cache = {},
								lastXhr;
							$('#".$fieldId."').autocomplete({
								minLength: 2,
								source: function( request, response ) {
									var term = request.term;
									if ( term in cache ) {
										response( cache[ term ] );
										return;
									}
									lastXhr = $.getJSON( '".$url."', request, function( data, status, xhr ) {
										cache[ term ] = data;
										if ( xhr === lastXhr ) {
											response( data );
										}
									});
								}
							});
						});";
			}
		}
		$jq .="$(function() {
					$('#searchButtonId').click(function(){
						$('#searchClearId').val(1);
					});
				});";
		$jq .="</script>";
		$jq .="</script>";
		echo $jq;
	}
	echo "<div class='search_submit'>".$this->Form->submit(__('Search'))."</div>";
	echo "<div class='search_submit'>".$this->Form->hidden("search_clear" ,array('id' => 'searchClearId', 'value' => 0)).$this->Form->submit(__('Clear'), array('id'=>'searchButtonId'))."</div>";
	echo "<div style='clear:both'></div>";
	$this->Form->unlockField('search_clear');
	echo $this->Form->end();
	echo $this->Js->writeBuffer();
?>
</div>
<?php
include_once('rhaco3_min.php');
$flow = new \org\rhaco\Flow();
$flow->output(array(''
,'nomatch_redirect'=>'/'
,'error_redirect'=>''
,'modules'=>array(
	'flow.module.Formatter',
	'org.rhaco.flow.module.HtmlFilter',
)
,'patterns'=>array(
	''=>array('name'=>'index','template'=>'rhaco3.html')
	,'packager.html'=>array('template'=>'packager.html','name'=>'packager')
	,'develop.html'=>array('name'=>'develop','template'=>'develop.html')
	,'download/(.+)'=>array('name'=>'download','action'=>'org.rhaco.flow.parts.File::attach')
	
	,'rhaco1.html'=>array('name'=>'rhaco1','template'=>'rhaco1.html')
	,'rhaco2.html'=>array('name'=>'rhaco2','template'=>'rhaco2.html')
	,'rhaco3.html'=>array('name'=>'rhaco3','template'=>'rhaco3.html')
	,'simple.html'=>array('name'=>'simple','template'=>'simple.html','action'=>'org.rhaco.flow.parts.File::tree','args'=>array('pattern'=>'simple'))

	,'rhaco3/(.+)'=>array('name'=>'rhaco3_document','action'=>'org.rhaco.flow.parts.PatternBlocks::select','template'=>'index.html','args'=>array('path'=>'rhaco3'))
	,'rhaco2/(.+)'=>array('name'=>'rhaco2_document','action'=>'org.rhaco.flow.parts.PatternBlocks::select','template'=>'index.html','args'=>array('path'=>'rhaco2'))
	,'rhaco1/(.+)'=>array('name'=>'rhaco1_document','action'=>'org.rhaco.flow.parts.PatternBlocks::select','template'=>'index.html','args'=>array('path'=>'rhaco1'))
	,'simple/(.+)'=>array('name'=>'simple_document','action'=>'org.rhaco.flow.parts.PatternBlocks::select','template'=>'index.html','args'=>array('path'=>'simple'))
	
	,'dev'=>array('class'=>'org.rhaco.flow.parts.Developer','mode'=>'local')
)));

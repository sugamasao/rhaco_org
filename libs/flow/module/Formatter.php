<?php
namespace flow\module;

class Formatter{
	public function before_template(&$src){
		if(\org\rhaco\Xml::set($tag,$src,'body')){
			foreach($tag->in(array("pre")) as $b){
				if($b->in_attr("trans") == "true"){
					$b->escape(false);
					$b->rm_attr("trans");
					$b->attr('class','prettyprint linenums" style="margin-top: 20px;');
					$value = \org\rhaco\lang\Text::plain($b->value());
					$value = preg_replace("/<(rt:.+?)>/ms","&lt;\\1&gt;",$value);
					$value = str_replace(array('<php>','</php>'),array('<?php','?>'),$value);
					$value = str_replace(array("<",">","'","\""),array("&lt;","&gt;","&#039;","&quot;"),$value);
					$value = preg_replace("/!!!(.+?)!!!/ms","<code>\\1</code>",$value);
					$value = str_replace("\t","&nbsp;&nbsp;",$value);
					$b->value($value);
					$src = str_replace($b->plain(),str_replace(array('$','='),array('__RTD__','__RTE__'),$b->get()),$src);
				}
			}
		}
	}
	public function after_exec_template(&$src){
		$src = str_replace(array('__RTD__','__RTE__'),array('$','='),$src);
	}
}
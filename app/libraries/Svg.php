<?php

class Svg
{

	public static  function __callStatic($name, $args)
	{
		if (view_exist("svg/{$name}"))
		{
			return self::loadSvgView($name, $args);
		}
	}


	public function __call($name, $args)
	{
		if (view_exist("svg/{$name}"))
		{
			return self::loadSvgView($name, $args);
		}
	}


	private static function loadSvgView($svg, $attrbs = array())
	{
		//		dd();
		$ci = &get_instance();

		$svgObj = new static;
		$attr = $svgObj->parseAttributes($attrbs);
		$v['attr'] = $attr;
		$v['attrString'] = $svgObj->attributesString($attr);

		return $ci->load->view("svg/{$svg}", $v, true);
	}

	public function parseAttributes($attrbs = array())
	{

		if(! isset($attrbs[0]))
		{
			return array('class' => '');
		}

		$classes = '';
		if(isset($attrbs[0]['class']))
		{
			$classes = $attrbs[0]['class'];

			unset($attrbs[0]['class']);
		}


		return array_merge(array('class' => $classes), $attrbs[0]);
	}

	public function attributesString($attr)
	{
		unset($attr['class']);

		$string = '';

		foreach($attr as $n => $v)
		{
			$string .= " {$n}=\"{$v}\"";
		}

		return $string;
	}
} 
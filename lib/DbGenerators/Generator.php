<?php

namespace DbGenerators;

class Generator {

	protected $option;
	protected $datas;

	public function __construct($option, $datas) {
		$this->option = $option;
		$this->datas = $datas;
	}

}
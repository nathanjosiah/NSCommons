<?php

namespace NSCommons\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;

class RichSnippets extends AbstractHelper {
	protected $data = array();

	public function __invoke(array $data=null) {
		if(isset($data)) {
			$this->setData($data);
		}
		return $this;
	}

	public function render() {
		$json = [
			'@context' => 'http://schema.org',
			'@type' => 'WebPage'
		];
		if(isset($this->data['title'])) $json['name'] = $this->data['title'];
		if(isset($this->data['description'])) $json['description'] = $this->data['description'];
		$html = '<script type="application/ld+json">' . json_encode($json) . '</script>';
		return $html;
	}

	public function setData(array $data) {
		if(isset($data['video'])) {
			$view = $this->getView();
			$headMeta = $view->headMeta();
			$headMeta
				->setProperty('og:video',$data['video'])
				->setProperty('og:video:width',$data['video']['width'])
				->setProperty('og:video:height',$data['video']['height']);
		}
		$this->data = $data;
		return $this;
	}
}

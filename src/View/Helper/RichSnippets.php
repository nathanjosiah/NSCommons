<?php

namespace NSCommons\View\Helper;

use Zend\View\Helper\AbstractHelper;

class RichSnippets extends AbstractHelper {
	protected $data = array();

	public function render() {
		$json = [
			'@context' => 'http://schema.org',
			'@type' => 'WebPage'
		];
		if(isset($this->data['title'])) $json['name'] = $this->data['title'];
		if(isset($this->data['description'])) $json['description'] = $this->data['description'];
		$html = '<script type="application/ld+json">' . json_encode($json) . '</script>';

		if(isset($this->data['video'])) {
			$view = $this->getView();
			$html .= '<meta property="og:video" content="' . $view->escapeHtml($this->data['video']['url']) . '" />';
			$html .= '<meta property="og:video:width" content="' . $view->escapeHtml($this->data['video']['width']) . '" />';
			$html .= '<meta property="og:video:height" content="' . $view->escapeHtml($this->data['video']['height']) . '" />';

/*
			$html .= '
			<div itemprop="video" itemscope itemtype="http://schema.org/VideoObject">
				<span itemprop="name">' . $view->escapeHtml($this->data['video']['title']) . '</span>
				<meta itemprop="duration" content="T1H3M33s" />
				<meta itemprop="thumbnailUrl" content="' . $view->escapeHtml($this->data['video']['thumbnail_url']) . '" />
				<meta itemprop="contentURL" content="' . $view->escapeHtml($this->data['video']['url']) . '" />
			</div>
			';
			*/
		}

		return $html;
	}

	public function setVideo($url,$width,$height/*,$title=null,$thumbnail_url=null,$file_url=null*/) {
		$video = [
			'url' => $url,
			'width' => $width,
			'height' => $height/*,
			'title' => $title,
			'thumbnail_url' => $thumbnail_url,
			'file_url' => $file_url*/
		];
		$this->data['video'] = $video;
		return;
	}
	public function setTitle($title) {
		$this->data['title'] = $title;
		return;
	}

	public function setDescription($description) {
		$this->data['description'] = $description;
		return;
	}

	public function __invoke(array $data=null) {
		if(isset($data)) {
			$this->setData($data);
		}
		return $this;
	}

	public function setData(array $data) {
		$this->data = $data;
		return $this;
	}

	public function __toString() {
		return $this->render();
	}
}

<?php

namespace NSCommons\Validator;

use Zend\Validator\AbstractValidator;

class Email extends AbstractValidator {
	const MESSAGE_INVALID = 'invalid';
	protected $messageTemplates = [
		self::MESSAGE_INVALID => 'The e-mail address supplied is invalid.'
	];
	public function isValid($value) {
		if(preg_match('/^[a-z0-9._%+-]+@(?:[a-z0-9-]+\.)+(?:com|org|net|edu|gov|mil|info|mobi|[a-z]{2}|xn--[a-z0-9-]+|museum|travel|academy|aero|agency|arpa|asia|bargains|berlin|bike|biz|blue|boutique|build|builders|buzz|cab|camera|camp|cards|careers|cat|catering|center|ceo|cheap|cleaning|clothing|club|codes|coffee|community|company|computer|condos|construction|contractors|cool|coop|cruises|dance|dating|democrat|diamonds|directory|domains|education|email|enterprises|equipment|estate|events|expert|exposed|farm|fish|flights|florist|foundation|futbol|gallery|gift|glass|graphics|guitars|guru|holdings|holiday|house|immobilien|industries|institute|int|international|jobs|kaufen|kim|kitchen|kiwi|land|lighting|limo|link|luxury|maison|management|mango|marketing|menu|moda|monash|nagoya|name|neustar|ninja|onl|partners|parts|photo|photography|photos|pics|pink|plumbing|post|pro|productions|properties|qpon|recipes|red|rentals|repair|report|reviews|rich|ruhr|sexy|shiksha|shoes|singles|social|solar|solutions|supply|support|systems|tattoo|technology|tel|tienda|tips|today|tokyo|tools|training|uno|vacations|ventures|viajes|villas|vision|voting|voyage|wang|watch|wed|wien|wiki|works|xxx|xyz|zone)$/i',$value)) {
			return true;
		}
		$this->error(self::MESSAGE_INVALID);
		return false;
	}
}

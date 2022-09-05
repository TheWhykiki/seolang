<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.remember
 *
 * @copyright   (C) 2007 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */


defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Uri\Uri;

/**
 * Joomla! System Remember Me Plugin
 *
 * @since  1.5
 */

class PlgSystemSeolang extends CMSPlugin
{
	/**
	 * @var    string[]
	 * @since  1.0.0
	 */
	protected $unsetUrls = [
		'https://hickenbick-hair.com/en/',
		'https://hickenbick-hair.com/fr/',
		'https://hickenbick-hair.com/es/',
		'https://hickenbick-hair.com/at/',
		'https://www.coiffeurhickenbick.ch/cms/',
		'https://www.coiffeurhickenbick.ch/cms/fr/',
		'https://www.hickenbick-hair.de/',
	];

	/**
	 * @var    string[]
	 * @since  1.0.0
	 */
	protected $switchLanguage = [
		'https://www.coiffeurhickenbick.ch/cms/'
	];

	/**
	 * Datenset Links aus Excel
	 *
	 * @var    string[][]
	 * @since  1.0.0
	 */
	protected $datas = [
        [
            'de-ch'      =>     'https://www.coiffeurhickenbick.ch/cms/shop/bonding-extensions',
            'fr-ch'      =>     'https://www.coiffeurhickenbick.ch/cms/fr/shop/extensions-de-cheveux',
            'de-de'      =>     'https://www.hickenbick-hair.de/bonding-extensions',
            'en-gb'      =>     'https://hickenbick-hair.com/en/hair-extensions/pre-bonded-keratin-extensions',
            'fr-fr'      =>     'https://hickenbick-hair.com/fr/extensions-de-cheveux/extensions-de-cheveux-keratine',
            'de-at'      =>     'https://hickenbick-hair.com/at/hair-extensions/bonding-extensions',
            'es-es'      =>     'https://hickenbick-hair.com/es/extensiones-de-pelo/extensiones-de-queratina',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/wavy-curly-bonding-extensions',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/hair-extension-gelockt',
            'de-de'     =>      'https://www.hickenbick-hair.de/bonding-extensions/curly-hair-extensions',
            'en-gb'     =>      'https://hickenbick-hair.com/en/hair-extensions/pre-bonded-keratin-extensions/keratin-flat-tip-extensions-wavy',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/extensions-de-cheveux/extensions-de-cheveux-keratine/extensions-de-cheveux-keratine-ondule',
            'de-at'     =>      'https://hickenbick-hair.com/at/hair-extensions/bonding-extensions/keratin-bondings-wavy',
            'es-es'     =>      'https://hickenbick-hair.com/es/extensiones-de-pelo/extensiones-de-queratina/extensiones-de-queratina-ondulado',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/microring-extensions',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/extensions-a-microrings',
            'de-de'     =>      'https://www.hickenbick-hair.de/microring-extensions',
            'en-gb'     =>      'https://hickenbick-hair.com/en/hair-extensions/microring-hair-extensions',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/extensions-de-cheveux/extensions-a-froid-microring',
            'de-at'     =>      'https://hickenbick-hair.com/at/hair-extensions/microring-extensions',
            'es-es'     =>      'https://hickenbick-hair.com/es/shopcategorys/extensiones-de-micro-ring',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/tape-in-extensions',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/extensions-en-bandes-adhesives',
            'de-de'     =>      'https://www.hickenbick-hair.de/tape-extensions',
            'en-gb'     =>      'https://hickenbick-hair.com/en/hair-extensions/tape-extensions',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/extensions-de-cheveux/extensions-adhesives-tape',
            'de-at'     =>      'https://hickenbick-hair.com/at/hair-extensions/tape-extensions',
            'es-es'     =>      'https://hickenbick-hair.com/es/extensiones-de-pelo/extensiones-adhesivas',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/clip-in-extensions',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/extensions-a-clips',
            'de-de'     =>      'https://www.hickenbick-hair.de/clip-in-extensions',
            'en-gb'     =>      'https://hickenbick-hair.com/en/hair-extensions/clip-in-extensions',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/extensions-de-cheveux/extensions-a-clips',
            'de-at'     =>      'https://hickenbick-hair.com/at/hair-extensions/clip-in-extensions',
            'es-es'     =>      'https://hickenbick-hair.com/es/extensiones-de-pelo/extensiones-de-clip',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/flip-in-extensions',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/flip-in-extensions',
            'de-de'     =>      'https://www.hickenbick-hair.de/clip-in-extensions/flip-in-extensions-luxury-100g',
            'en-gb'     =>      'https://hickenbick-hair.com/en/hair-extensions/clip-in-extensions/flip-in-extensions-luxury-100g',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/extensions-de-cheveux/extensions-a-clips/extensions-flip-in-100g',
            'de-at'     =>      'https://hickenbick-hair.com/at/hair-extensions/clip-in-extensions/flip-in-extensions-luxury-100g',
            'es-es'     =>      'https://hickenbick-hair.com/es/extensiones-de-pelo/extensiones-de-clip/extensiones-de-hilo-flip-in',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/pferdeschwanz-clip-in-ponytail',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/queue-de-cheval',
            'de-de'     =>      'https://www.hickenbick-hair.de/ponytail',
            'en-gb'     =>      'https://hickenbick-hair.com/en/hair-extensions/human-ponytail-extensions',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/extensions-de-cheveux/ponytail',
            'de-at'     =>      'https://hickenbick-hair.com/at/hair-extensions/ponytail',
            'es-es'     =>      'https://hickenbick-hair.com/es/extensiones-de-pelo/extensiones-de-coleta',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/echthaar-haargummi',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/elastique-a-cheveux',
            'de-de'     =>      'https://www.hickenbick-hair.de/echthaar-haargummi',
            'en-gb'     =>      'https://hickenbick-hair.com/en/hair-extensions/hair-pieces/human-hair-scrunchie',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/extensions-de-cheveux/postiches/chouchou-en-cheveux-naturels',
            'de-at'     =>      'https://hickenbick-hair.com/at/hair-extensions/haarteile/echthaar-haargummi',
            'es-es'     =>      'https://hickenbick-hair.com/es/extensiones-de-pelo/partes-del-pelo/mono-de-pelo',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/trend-peruecken',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/perruques-tendance',
            'de-de'     =>      'https://www.hickenbick-hair.de/trend-peruecken',
            'en-gb'     =>      'https://hickenbick-hair.com/en/hair-extensions/wigs',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/extensions-de-cheveux/perruques',
            'de-at'     =>      'https://hickenbick-hair.com/at/hair-extensions/peruecken',
            'es-es'     =>      'https://hickenbick-hair.com/es/extensiones-de-pelo/pelucas',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/clip-in-pony',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/frange-a-clipser',
            'de-de'     =>      'https://www.hickenbick-hair.de/clip-in-stirnfransen',
            'en-gb'     =>      'https://hickenbick-hair.com/en/hair-extensions/hair-pieces',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/extensions-de-cheveux/postiches',
            'de-at'     =>      'https://hickenbick-hair.com/at/hair-extensions/haarteile',
            'es-es'     =>      'https://hickenbick-hair.com/es/extensiones-de-pelo/partes-del-pelo/flequillos-de-pelo',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/top-piece',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/top-piece',
            'de-de'     =>      'https://www.hickenbick-hair.de/top-piece',
            'en-gb'     =>      'https://hickenbick-hair.com/en/shopcategorys/top-piece',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/shopcategorys/top-piece',
            'de-at'     =>      'https://hickenbick-hair.com/at/shopcategorys/top-piece',
            'es-es'     =>      'https://hickenbick-hair.com/es/shopcategorys/top-piece',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/weft-extensions-haartressen',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/tissages-bandes-de-cheveux',
            'de-de'     =>      'https://www.hickenbick-hair.de/echthaar-tressen',
            'en-gb'     =>      'https://hickenbick-hair.com/en/hair-extensions/weft-extensions',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/extensions-de-cheveux/tissage-cheveux-naturels',
            'de-at'     =>      'https://hickenbick-hair.com/at/hair-extensions/echthaar-tressen',
            'es-es'     =>      'https://hickenbick-hair.com/es/extensiones-de-pelo/extensiones-de-cortina',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/geraete',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/appareils',
            'de-de'     =>      'https://www.hickenbick-hair.de/extensions-pflege/geraete',
            'en-gb'     =>      'https://hickenbick-hair.com/en/extensions-accessories-styling/extensions-tools',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/accessories-soins/appareils',
            'de-at'     =>      'https://hickenbick-hair.com/at/zubehor-pflege/gerate',
            'es-es'     =>      'https://hickenbick-hair.com/es/accesorios/aparatos',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/extensions-zubehoer',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/accessoires-pour-extensions',
            'de-de'     =>      'https://www.hickenbick-hair.de/extensions-pflege',
            'en-gb'     =>      'https://hickenbick-hair.com/en/shopcategorys/extensions-accessories-styling',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/shopcategorys/accessoires-pour-extensions',
            'de-at'     =>      'https://hickenbick-hair.com/at/shopcategorys/extensions-zubehor-pflege',
            'es-es'     =>      'https://hickenbick-hair.com/es/shopcategorys/accesorios-extensiones',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/extensions-zubehoer/bonding-zubehoer',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/accessoires-pour-extensions/accessoires',
            'de-de'     =>      'https://www.hickenbick-hair.de/extensions-pflege/bondings-zubehoer',
            'en-gb'     =>      'https://hickenbick-hair.com/en/extensions-accessories-styling/bondings-accessories',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/accessories-soins/materiel-pose-a-cheveux-keratine',
            'de-at'     =>      'https://hickenbick-hair.com/at/zubehor-pflege/bondings-zubehoer',
            'es-es'     =>      'https://hickenbick-hair.com/es/accesorios/accesorios-extensiones-de-queratina',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/extensions-zubehoer/tape-extensions-zubehoer',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/accessoires-pour-extensions/accessoires-pour-extensions-%C3%A0-bandes-adh%C3%A9sives',
            'de-de'     =>      'https://www.hickenbick-hair.de/extensions-pflege/tape-extensions-zubehoer',
            'en-gb'     =>      'https://hickenbick-hair.com/en/extensions-accessories-styling/tape-extensions-accessories',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/accessories-soins/materiel-pose-a-cheveux-tape',
            'de-at'     =>      'https://hickenbick-hair.com/at/zubehor-pflege/tape-extensions-zubehoer',
            'es-es'     =>      'https://hickenbick-hair.com/es/accesorios/accesorios-extensiones-adhesivas',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/extensions-zubehoer/microring-extensions-zubeh%C3%B6r',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/accessoires-pour-extensions/connecteurs-microrings',
            'de-de'     =>      'https://www.hickenbick-hair.de/extensions-pflege/microrings-zubehoer',
            'en-gb'     =>      'https://hickenbick-hair.com/en/extensions-accessories-styling/microrings-accessories',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/accessories-soins/materiel-pose-a-cheveux-froid',
            'de-at'     =>      'https://hickenbick-hair.com/at/zubehor-pflege/microrings-zubehor',
            'es-es'     =>      'https://hickenbick-hair.com/es/accesorios/accesorios-extensiones-de-micro-ring',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/shop/extensions-haarpflege',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/shop/soins-des-extensions-de-cheveux',
            'de-de'     =>      'https://www.hickenbick-hair.de/extensions-pflege/extensions-pflege',
            'en-gb'     =>      'https://hickenbick-hair.com/en/extensions-accessories-styling/extensions-haircare',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/accessories-soins/soins-des-extensions-de-cheveux',
            'de-at'     =>      'https://hickenbick-hair.com/at/zubehor-pflege/extensions-pflege',
            'es-es'     =>      'https://hickenbick-hair.com/es/accesorios/cuidado-de-las-extensiones',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/ueber-uns',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/a-propos-de-nous',
            'de-de'     =>      'https://www.hickenbick-hair.de/uber-uns',
            'en-gb'     =>      'https://hickenbick-hair.com/en/about-us',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/les-8-avantages-de-hickenbick-hair',
            'de-at'     =>      'https://hickenbick-hair.com/at/ueber-uns',
            'es-es'     =>      'https://hickenbick-hair.com/es/sobre-nosotros',
        ],
        [
            'de-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/kontakt',
            'fr-ch'     =>      'https://www.coiffeurhickenbick.ch/cms/fr/contact',
            'de-de'     =>      'https://www.hickenbick-hair.de/kontakt',
            'en-gb'     =>      'https://hickenbick-hair.com/en/contacts',
            'fr-fr'     =>      'https://hickenbick-hair.com/fr/contact',
            'de-at'     =>      'https://hickenbick-hair.com/at/kontakt',
            'es-es'     =>      'https://hickenbick-hair.com/es/contacto',
        ],
    ];

    /**
     * Change Head Links
     *
     * @return  void
     * @since   1.0.0
	 */

    public function onBeforeCompileHead()
    {
	    $doc = Factory::getDocument();

	    $head_data = $doc->getHeadData();
	    $links     = $head_data['links'];

	    $lang        = Factory::getLanguage();
	    $languageTag = strtolower($lang->get('tag'));
		$baseUrl = Uri::base();

		if(in_array($baseUrl, $this->switchLanguage))
		{
			if ($languageTag == 'de-de')
			{
				$languageTag = 'de-ch';
			}
			if ($languageTag == 'fr-fr')
			{
				$languageTag = 'fr-ch';
			}
		}

		$currentUrl = Uri::current();
	    $urlArray   = $this->_searchForArray($currentUrl, $languageTag);

        if(!empty($urlArray))
        {
	        foreach ($links as $link => $values)
	        {
		        $language = $values['attribs']['hreflang'];

		        if (isset($language))
                {
                    foreach($urlArray as $languageKey => $data)
                    {
                        $doc->addHeadLink($data, 'alternate', 'hreflang',['hreflang' => $languageKey]);
                    }
                }
	        }

	        foreach ($this->unsetUrls as $url)
	        {
		        unset($doc->_links[$url]);
	        }
        }
    }

	/**
	 * Suchen nach einzelnem Arrayelement auf Basis der aktuellen URL
	 *
	 * @param   string  $url      Aktuelle URL
	 * @param   string  $langTag  e.g. de-ch
	 *
	 * @return  array
	 *
	 * @since   1.0.0
	 */
	protected function _searchForArray($url, $langTag)
	{
		$array = $this->datas;

		foreach ($array as $key => $val)
		{
			if ($val[$langTag] === $url)
			{
				return $val;
			}
		}

		return array();
	}
}

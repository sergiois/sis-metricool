<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.SISMetricool
 *
 * @copyright	Copyright © 2019 SergioIglesiasNET - All rights reserved.
 * @license		GNU General Public License v2.0
 * @author 		Sergio Iglesias (@sergiois)
 */

defined('_JEXEC') or die;

class PlgSystemSismetricool extends JPlugin
{
	public function onAfterRender()
	{
		$app = JFactory::getApplication();
		if ($app->isClient('site') && $this->params->get('hash_metricool'))
		{
			$html = $app->getBody();

			$script_metricool = '<script>function loadScript(a){var b=document.getElementsByTagName("head")[0],c=document.createElement("script");c.type="text/javascript",c.src="https://tracker.metricool.com/resources/be.js",c.onreadystatechange=a,c.onload=a,b.appendChild(c)}loadScript(function(){beTracker.t({hash:"'.$this->params->get('hash_metricool').'"})});</script>';

			$html = str_replace('</body>',$script_metricool . '</body>',$html);

			$app->setBody($html);
        }
	}
}

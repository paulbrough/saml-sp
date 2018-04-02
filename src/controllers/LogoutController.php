<?php
/**
 * Created by PhpStorm.
 * User: dsmrt
 * Date: 1/10/18
 * Time: 11:52 AM
 */

namespace flipbox\saml\sp\controllers;


use craft\web\Request;
use flipbox\saml\core\controllers\messages\AbstractLogoutController;
use flipbox\saml\core\records\ProviderInterface;
use flipbox\saml\core\SamlPluginInterface;
use flipbox\saml\sp\Saml;
use flipbox\saml\sp\services\bindings\Factory;
use LightSaml\Model\Protocol\SamlMessage;
use LightSaml\Model\Protocol\StatusResponse;

/**
 * Class LogoutController
 * @package flipbox\saml\sp\controllers
 */
class LogoutController extends AbstractLogoutController
{
    /**
     * @return SamlPluginInterface
     */
    protected function getSamlPlugin(): SamlPluginInterface
    {
        return Saml::getInstance();
    }

    /**
     * @return ProviderInterface
     */
    protected function getRemoteProvider(): ProviderInterface
    {
        return $this->getSamlPlugin()->getProvider()->findByIdp();
    }

    /**
     * @param SamlMessage $samlMessage
     * @param ProviderInterface $provider
     * @throws \flipbox\saml\core\exceptions\InvalidMetadata
     */
    protected function send(SamlMessage $samlMessage, ProviderInterface $provider)
    {
        Factory::send($samlMessage, $provider);
        exit;
    }

    /**
     * @param Request $request
     * @return StatusResponse
     * @throws \flipbox\saml\core\exceptions\InvalidSignature
     */
    protected function receive(Request $request): StatusResponse
    {
        return Factory::receive($request);
    }
}
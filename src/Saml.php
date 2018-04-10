<?php
/**
 * Created by PhpStorm.
 * User: dsmrt
 * Date: 1/9/18
 * Time: 9:11 AM
 */

namespace flipbox\saml\sp;


use Craft;
use craft\console\Application as ConsoleApplication;
use craft\events\RegisterUrlRulesEvent;
use craft\web\UrlManager;
use flipbox\saml\core\models\SettingsInterface;
use flipbox\saml\core\SamlPluginInterface;
use flipbox\saml\core\AbstractPlugin;
use flipbox\saml\sp\models\Settings;
use flipbox\saml\sp\services\messages\AuthnRequest;
use flipbox\saml\sp\services\messages\LogoutRequest;
use flipbox\saml\sp\services\messages\LogoutResponse;
use flipbox\saml\sp\services\messages\Metadata;
use flipbox\saml\sp\services\messages\Response;
use flipbox\saml\sp\services\bindings\HttpPost;
use flipbox\saml\sp\services\bindings\HttpRedirect;
use flipbox\saml\sp\services\Login;
use flipbox\saml\sp\services\Provider;
use flipbox\saml\sp\services\ProviderIdentity;
use flipbox\saml\core\services\Session;
use yii\base\Event;

class Saml extends AbstractPlugin implements SamlPluginInterface
{

    public $hasCpSection = true;

    public function init()
    {
        parent::init();

        $this->initComponents();
        $this->initEvents();

        // Switch target to console controllers
        if (Craft::$app instanceof ConsoleApplication) {
            $this->controllerNamespace = __NAMESPACE__ . '\cli';
            $this->controllerMap = [
                'metadata' => \flipbox\saml\sp\cli\Metadata::class,
                'keychain' => \flipbox\saml\sp\cli\KeyChain::class,
            ];
        }

    }

    /**
     * Events
     */
    protected function initEvents()
    {
        // CP routes
        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_CP_URL_RULES,
            [self::class, 'onRegisterCpUrlRules']
        );


        /**
         * Clean Frontend Endpoints
         */
        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules = array_merge(
                    $event->rules,
                    [
                        'POST,GET /sso/login'     => 'saml-sp/login',
                        'GET /sso/login/request'  => 'saml-sp/login/request',
                        'POST,GET /sso/logout'    => 'saml-sp/logout',
                        'GET /sso/logout/request' => 'saml-sp/logout/request',
                    ]
                );
            }
        );
    }

    /**
     * Components
     */
    public function initComponents()
    {
        $this->setComponents([
            'authnRequest'     => AuthnRequest::class,
            'httpPost'         => HttpPost::class,
            'httpRedirect'     => HttpRedirect::class,
            'login'            => Login::class,
            'logoutRequest'    => LogoutRequest::class,
            'logoutResponse'   => LogoutResponse::class,
            'provider'         => Provider::class,
            'providerIdentity' => ProviderIdentity::class,
            'metadata'         => Metadata::class,
            'response'         => Response::class,
            'session'          => Session::class,
        ]);
    }

    /**
     * @param RegisterUrlRulesEvent $event
     */
    public static function onRegisterCpUrlRules(RegisterUrlRulesEvent $event)
    {
        $event->rules = array_merge(
            $event->rules,
            [
                'saml-sp/'                          => 'saml-sp/cp/view/general/setup',

                /**
                 * Keychain
                 */
                'saml-sp/keychain'                  => 'saml-sp/cp/view/keychain/index',
                'saml-sp/keychain/new'              => 'saml-sp/cp/view/keychain/edit',
                'saml-sp/keychain/new-openssl'      => 'saml-sp/cp/view/keychain/edit/openssl',
                'saml-sp/keychain/<keypairId:\d+>'  => 'saml-sp/cp/view/keychain/edit',

                /**
                 * Metadata
                 */
                'saml-sp/metadata'                  => 'saml-sp/cp/view/metadata/default',
                'saml-sp/metadata/new'              => 'saml-sp/cp/view/metadata/edit',
                'saml-sp/metadata/my-provider'      => 'saml-sp/cp/view/metadata/edit/my-provider',
                'saml-sp/metadata/<providerId:\d+>' => 'saml-sp/cp/view/metadata/edit',
            ]
        );
    }

    /**
     * @return Settings
     */
    public function getSettings(): SettingsInterface
    {
        return parent::getSettings();
    }

    /**
     * @inheritdoc
     */
    public function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * Components
     */

    /**
     * @return AuthnRequest
     */
    public function getAuthnRequest()
    {
        return $this->get('authnRequest');
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->get('response');
    }

    /**
     * @return Login
     */
    public function getLogin()
    {
        return $this->get('login');
    }

    /**
     * @return Session
     * @throws \yii\base\InvalidConfigException
     */
    public function getSession()
    {
        return $this->get('session');
    }

    /**
     * Util Methods
     */

    public function getMyType()
    {
        return static::SP;
    }
}
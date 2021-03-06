<?php
/**
 * Created by PhpStorm.
 * User: dsmrt
 * Date: 1/11/18
 * Time: 8:30 PM
 */

namespace flipbox\saml\sp\services;

use craft\base\Component;
use craft\elements\User;
use flipbox\saml\core\exceptions\InvalidMessage;
use flipbox\saml\core\helpers\MessageHelper;
use flipbox\saml\sp\events\UserLogin;
use flipbox\saml\sp\models\Settings;
use flipbox\saml\sp\records\ProviderIdentityRecord;
use flipbox\saml\sp\records\ProviderRecord;
use flipbox\saml\sp\Saml;
use flipbox\saml\sp\services\login\AssertionTrait;
use SAML2\Response as SamlResponse;
use yii\base\UserException;

/**
 * Class Consumer
 * @package flipbox\saml\sp\services\login
 */
class Login extends Component
{
    use AssertionTrait;

    const EVENT_BEFORE_RESPONSE_TO_USER = 'eventBeforeResponseToUser';
    const EVENT_AFTER_RESPONSE_TO_USER = 'eventAfterResponseToUser';

    public function transformToUser(
        User $user,
        SamlResponse $response,
        ProviderRecord $idp,
        ProviderRecord $sp,
        Settings $settings
    ) {
        /**
         * Before user transformation
         */
        $event = new UserLogin();
        $event->response = $response;
        $event->user = $user;

        $this->trigger(
            static::EVENT_BEFORE_RESPONSE_TO_USER,
            $event
        );

        // Sync
        Saml::getInstance()->getUser()->sync(
            $user,
            $response,
            $idp,
            $sp,
            $settings
        );

        /**
         * After user save
         */
        $event = new UserLogin();
        $event->response = $response;
        $event->user = $user;

        $this->trigger(
            static::EVENT_AFTER_RESPONSE_TO_USER,
            $event
        );

        return $user;
    }

    /**
     * @param ProviderIdentityRecord $identityRecord
     * @throws UserException
     * @throws \Throwable
     */
    public function byIdentity(ProviderIdentityRecord $identityRecord)
    {
        /**
         * Log user in
         */
        if (! Saml::getInstance()->getUser()->login($identityRecord)) {
            throw new UserException("Unknown error while logging in.");
        }
        /**
         * User's successfully logged in so we can now set the lastLogin for the
         * provider identity and save it to the db.
         */
        $identityRecord->lastLoginDate = new \DateTime();
        if (! Saml::getInstance()->getProviderIdentity()->save($identityRecord)) {
            throw new UserException("Error while saving identity.");
        }
    }
}

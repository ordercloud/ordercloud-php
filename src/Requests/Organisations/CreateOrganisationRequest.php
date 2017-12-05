<?php namespace Ordercloud\Requests\Organisations;

use Ordercloud\Entities\Organisations\OrganisationProfile;
use Ordercloud\Entities\Organisations\OrganisationBillingProfile;
use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetSettingsByOrganisationRequest
 *
 * @see Ordercloud\Requests\Organisations\Handlers\CreateOrganisationRequestHandler
 */
class CreatenOrganisationRequest implements Command
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $code;
    /**
     * @var OrganisationProfile
     */
    private $profile;
    /**
     * @var array
     */
    private $types;
    /**
     * @var array
     */

    private $industry;
    /**
     * @var integer
     */

    private $timezoneOffset;
    /**
     * @var boolean
     */
    private $registeredDirectly;

    /**
     * @var array
     */
    private $connectionTypeCode;

    /**
     * @var string
     */
    private $notificationSourceEmail;

    /**
     * @var array
     */
    private $operatingHours;


    /**
     * @var string
     */

    private $currencyCode;

    /**
     * @var OrganisationProfile
     */
    private $billingProfile;


    /**
     * CreatenOrganisationRequest constructor.
     * @param $name
     * @param $code
     * @param OrganisationProfile $profile
     * @param array $types
     * @param array $industry
     * @param bool $registeredDirectly
     * @param string $currencyCode
     * @param string $timezoneOffset
     */
    public function __construct($name, $code, OrganisationProfile $profile = null, array $types = [],  array $industry = [],  $registeredDirectly = true, $currencyCode = 'ZA', $timezoneOffset='+2')
    {
        $this->name = $name;
        $this->code = $code;
        $this->profile = $profile;
        $this->types = $types;
        $this->industry = $industry;
        $this->registeredDirectly = $registeredDirectly;
        $this->timezoneOffset = $timezoneOffset;
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return OrganisationProfile
     */
    public function getProfile(): OrganisationProfile
    {
        return $this->profile;
    }

    /**
     * @return array
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @return array
     */
    public function getIndustry(): array
    {
        return $this->industry;
    }

    /**
     * @return int
     */
    public function getTimezoneOffset(): int
    {
        return $this->timezoneOffset;
    }

    /**
     * @return bool
     */
    public function isRegisteredDirectly(): bool
    {
        return $this->registeredDirectly;
    }

    /**
     * @return array
     */
    public function getConnectionTypeCode(): array
    {
        return $this->connectionTypeCode;
    }

    /**
     * @return string
     */
    public function getNotificationSourceEmail(): string
    {
        return $this->notificationSourceEmail;
    }

    /**
     * @return array
     */
    public function getOperatingHours(): array
    {
        return $this->operatingHours;
    }

    /**
     * @return OrganisationProfile
     */
    public function getBillingProfile(): OrganisationProfile
    {
        return $this->billingProfile;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }
}

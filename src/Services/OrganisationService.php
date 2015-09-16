<?php namespace Ordercloud\Services;

use Ordercloud\Entities\Organisations\Organisation;
use Ordercloud\Entities\Organisations\OrganisationAccessToken;
use Ordercloud\Entities\Organisations\OrganisationAddress;
use Ordercloud\Entities\Settings\SettingsCollection;
use Ordercloud\Requests\Auth\Entities\Authorisation;
use Ordercloud\Requests\Organisations\GetOrganisationAccessTokenRequest;
use Ordercloud\Requests\Organisations\GetOrganisationAddressRequest;
use Ordercloud\Requests\Organisations\GetOrganisationRequest;
use Ordercloud\Requests\Organisations\GetSettingsByOrganisationRequest;

class OrganisationService extends OrdercloudService
{
    /**
     * @param $organisationId
     *
     * @return SettingsCollection
     */
    public function getSettings($organisationId)
    {
        return $this->request(
            new GetSettingsByOrganisationRequest($organisationId)
        );
    }

    /**
     * @param int           $organisationId
     * @param Authorisation $authorisation
     *
     * @return OrganisationAccessToken
     */
    public function getAccessToken($organisationId, Authorisation $authorisation)
    {
        return $this->request(
            new GetOrganisationAccessTokenRequest($organisationId, $authorisation)
        );
    }

    /**
     * @param $organisationId
     *
     * @return OrganisationAddress
     */
    public function getAddress($organisationId)
    {
        return $this->request(
            new GetOrganisationAddressRequest($organisationId)
        );
    }

    /**
     * @param $organisationId
     *
     * @return Organisation
     */
    public function getOrganisation($organisationId)
    {
        return $this->request(
            new GetOrganisationRequest($organisationId)
        );
    }
}

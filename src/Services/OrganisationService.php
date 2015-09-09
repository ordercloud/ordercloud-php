<?php namespace Ordercloud\Services;

use Ordercloud\Entities\Settings\SettingsCollection;
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
}

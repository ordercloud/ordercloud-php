<?php namespace spec\Ordercloud\Entities\Settings;

use Ordercloud\Entities\Organisations\OrganisationShort;
use Ordercloud\Entities\Settings\Setting;
use Ordercloud\Entities\Settings\SettingKey;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SettingsCollectionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([
            new Setting(1, '2', new SettingKey(1, 'shop_limit'), null, null, new OrganisationShort(null, null, null)),
            new Setting(2, 'true', new SettingKey(2, 'delivery'), null, null, new OrganisationShort(null, null, null)),
            new Setting(3, 'false', new SettingKey(3, 'enabled'), null, null, new OrganisationShort(null, null, null)),
        ]);
    }

    function it_returns_a_setting_by_key()
    {
        $this->getSettingByKey(new SettingKey(1, null))->shouldReturnAnInstanceOf('Ordercloud\Entities\Settings\Setting');

        $this->getSettingByKey(new SettingKey(null, 'delivery'))->shouldReturnAnInstanceOf('Ordercloud\Entities\Settings\Setting');

        $this->getSettingByKey(new SettingKey(null, null))->shouldReturn(null);
    }

    function it_returns_a_setting_by_key_name()
    {
        $this->getSettingByKeyName('delivery')->shouldReturnAnInstanceOf('Ordercloud\Entities\Settings\Setting');

        $this->getSettingByKeyName('unknown')->shouldReturn(null);
    }

    function it_returns_a_setting_by_key_id()
    {
        $this->getSettingByKeyID(1)->shouldReturnAnInstanceOf('Ordercloud\Entities\Settings\Setting');

        $this->getSettingByKeyID(43)->shouldReturn(null);
    }

    function it_returns_a_setting_value_by_key()
    {
        $this->getSettingValueByKey(new SettingKey(1, null))->shouldReturn('2');

        $this->getSettingValueByKey(new SettingKey(null, 'delivery'))->shouldReturn('true');

        $this->getSettingValueByKey(new SettingKey(null, null))->shouldReturn(null);
    }

    function it_returns_a_setting_value_by_key_name()
    {
        $this->getSettingValueByKeyName('delivery')->shouldReturn('true');

        $this->getSettingValueByKeyName('unknown')->shouldReturn(null);
    }

    function it_returns_a_setting_value_by_key_id()
    {
        $this->getSettingValueByKeyID(1)->shouldReturn('2');

        $this->getSettingValueByKeyID(43)->shouldReturn(null);
    }
}

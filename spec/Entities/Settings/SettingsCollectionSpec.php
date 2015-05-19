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
        $this->getByKey(new SettingKey(1, null))->shouldReturnAnInstanceOf('Ordercloud\Entities\Settings\Setting');

        $this->getByKey(new SettingKey(null, 'delivery'))->shouldReturnAnInstanceOf('Ordercloud\Entities\Settings\Setting');

        $this->getByKey(new SettingKey(null, null))->shouldReturn(null);
    }

    function it_returns_a_setting_by_key_name()
    {
        $this->getByKeyName('delivery')->shouldReturnAnInstanceOf('Ordercloud\Entities\Settings\Setting');

        $this->getByKeyName('unknown')->shouldReturn(null);
    }

    function it_returns_a_setting_by_key_id()
    {
        $this->getByKeyID(1)->shouldReturnAnInstanceOf('Ordercloud\Entities\Settings\Setting');

        $this->getByKeyID(43)->shouldReturn(null);
    }

    function it_returns_a_setting_value_by_key()
    {
        $this->getValueByKey(new SettingKey(1, null))->shouldReturn('2');

        $this->getValueByKey(new SettingKey(null, 'delivery'))->shouldReturn('true');

        $this->getValueByKey(new SettingKey(null, null))->shouldReturn(null);
    }

    function it_returns_a_setting_value_by_key_name()
    {
        $this->getValueByKeyName('delivery')->shouldReturn('true');

        $this->getValueByKeyName('unknown')->shouldReturn(null);
    }

    function it_returns_a_setting_value_by_key_id()
    {
        $this->getValueByKeyID(1)->shouldReturn('2');

        $this->getValueByKeyID(43)->shouldReturn(null);
    }
}

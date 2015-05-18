<?php namespace Ordercloud\Entities\Settings;

class SettingsCollection
{
    /**
     * @var array|Setting[]
     */
    private $settings;

    public function __construct(array $settings = [])
    {
        $this->settings = $settings;
    }

    /**
     * @return array|Setting[]
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @param SettingKey $key The setting key
     *
     * @return Setting|null
     */
    public function getSettingByKey(SettingKey $key)
    {
        foreach ($this->getSettings() as $setting) {
            if ($setting->getKey()->getId() == $key->getId() || $setting->getKey()->getName() == $key->getName()) {
                return $setting;
            }
        }

        return null;
    }

    /**
     * @param string $keyName The setting key name
     *
     * @return Setting|null
     */
    public function getSettingByKeyName($keyName)
    {
        return $this->getSettingByKey(new SettingKey(null, $keyName));
    }

    /**
     * @param int $keyID The setting key ID
     *
     * @return Setting|null
     */
    public function getSettingByKeyID($keyID)
    {
        return $this->getSettingByKey(new SettingKey($keyID, null));
    }

    /**
     * @param SettingKey $key
     * @param mixed $default The default value to return if setting not found
     *
     * @return null|string
     */
    public function getSettingValueByKey(SettingKey $key, $default = null)
    {
        $setting = $this->getSettingByKey($key);

        if (is_null($setting)) {
            return $default;
        }

        return $setting->getValue();
    }

    /**
     * @param string $keyName The setting key name
     * @param mixed $default The default value to return if setting not found
     *
     * @return string|null
     */
    public function getSettingValueByKeyName($keyName, $default = null)
    {
        return $this->getSettingValueByKey(new SettingKey(null, $keyName), $default);
    }

    /**
     * @param int $keyID The setting key ID
     * @param mixed $default The default value to return if setting not found
     *
     * @return string|null
     */
    public function getSettingValueByKeyID($keyID, $default = null)
    {
        return $this->getSettingValueByKey(new SettingKey($keyID, null), $default);
    }
}

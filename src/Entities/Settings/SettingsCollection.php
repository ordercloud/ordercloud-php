<?php namespace Ordercloud\Entities\Settings;

use JsonSerializable;
use Ordercloud\Support\Collection;

class SettingsCollection extends Collection implements JsonSerializable
{
    /**
     * @param SettingKeyShort $key The setting key
     *
     * @return Setting|null
     */
    public function getByKey(SettingKeyShort $key)
    {
        foreach ($this->all() as $setting) {
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
    public function getByKeyName($keyName)
    {
        return $this->getByKey(new SettingKeyShort(null, $keyName));
    }

    /**
     * @param int $keyID The setting key ID
     *
     * @return Setting|null
     */
    public function getByKeyID($keyID)
    {
        return $this->getByKey(new SettingKeyShort($keyID, null));
    }

    /**
     * @param SettingKeyShort $key
     * @param mixed $default The default value to return if setting not found
     *
     * @return null|string
     */
    public function getValueByKey(SettingKeyShort $key, $default = null)
    {
        $setting = $this->getByKey($key);

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
    public function getValueByKeyName($keyName, $default = null)
    {
        return $this->getValueByKey(new SettingKeyShort(null, $keyName), $default);
    }

    /**
     * @param int $keyID The setting key ID
     * @param mixed $default The default value to return if setting not found
     *
     * @return string|null
     */
    public function getValueByKeyID($keyID, $default = null)
    {
        return $this->getValueByKey(new SettingKeyShort($keyID, null), $default);
    }

    /**
     * @return Setting[]
     */
    public function all()
    {
        return parent::all();
    }
}

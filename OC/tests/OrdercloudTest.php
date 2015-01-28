<?php
/**
 * Created by PhpStorm.
 * User: willem
 * Date: 2015/01/28
 * Time: 10:47 AM
 */

use PHPUnit_Framework_TestCase;
use Ordercloud\Ordercloud\Ordercloud;

class OrdercloudTest extends PHPUnit_Framework_TestCase {

    public function testConstruct ()
    {
        $config = array(
            "base_url" => "test.url.com",
            "verify_ssl" => true,
            "username" => "username",
            "password" => "password",
            "client_secret" => "123ClientSecret123",
            "organisation_id" => 69
        );
        $oc = new Ordercloud($config);
        $this->assertAttributeEquals("username", "username", $oc);
        /**
         * $this->client = new Client($config["base_url"]);
        $this->client->setDefaultOption('verify', $config["verify_ssl"]);
        $this->username = $config["username"];
        $this->password = $config["password"];
        $this->clientSecret = $config["client_secret"];
        $this->organisationId = $config["organisation_id"];
         */
    }

}
 
<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Entities\Users\UserShort;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Users\UpdateUserProfile;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class UpdateUserProfileHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;
    /** @var Parser */
    private $parser;

    public function __construct(Ordercloud $ordercloud, Parser $parser)
    {
        $this->ordercloud = $ordercloud;
        $this->parser = $parser;
    }

    /**
     * @param UpdateUserProfile $request
     *
     * @return UserShort
     */
    public function handle($request)
    {
        $userID = $request->getUserID();
        $profile = $request->getProfile();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                'PUT',
                "resource/users/{$userID}/profile",
                [
                    'firstName'       => $profile->getFirstName(),
                    'surname'         => $profile->getSurname(),
                    'nickName'        => $profile->getNickName(),
                    'email'           => $profile->getEmail(),
                    'cellphoneNumber' => $profile->getCellphoneNumber(),
                    'sex'             => $profile->getSex(),
                    'access_token'    => $request->getAccessToken()
                ]
            )
        );

        return $this->parser->parseUserProfile($response->getData());
    }
}

<?php
/***************************************************************************
 *                                                                          *
 *   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 *                                                                          *
 ****************************************************************************
 * PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
 * "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
 ****************************************************************************/


namespace Tygh\Api\Entities\v40;

use Tygh\Api\Entities\Users as BaseUsers;

/**
 * Represents api v4.0 of the users resource
 *
 * @package Tygh\Api\Entities\v40
 */
class Users extends BaseUsers
{
    /**
     * @inheritDoc
     */
    protected function filterUserData($user_data)
    {
        $user_data = parent::filterUserData($user_data);

        unset($user_data['salt']);

        if (isset($user_data['password'])) {
            $user_data['password1'] = $user_data['password2'] = $user_data['password'];
            unset($user_data['password']);
        }

        return $user_data;
    }
}
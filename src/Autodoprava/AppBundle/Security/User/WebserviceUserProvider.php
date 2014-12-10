<?php

namespace Autodoprava\AppBundle\Security\User;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Autodoprava\AppBundle\Model\DBConnection;

class WebserviceUserProvider implements UserProviderInterface
{

    function __construct(DBConnection $conn) {
        $this->connection = $conn;
    }

    public function loadUserByUsername($username)
    {
        $fetchUser = $this->connection->dibi->query('SELECT * FROM [uzivatele] WHERE [login] = %s', $username)->fetchAll();
        if(count($fetchUser) > 0)
        {
            $userData = $fetchUser[0];
            if ($userData) {
                $password = $userData['heslo'];
                $id = $userData['id_uzivatele'];
                
                return new WebserviceUser($id, $username, $password, null, array("ROLE_ADMIN"));
            }
        }

        throw new UsernameNotFoundException(
            sprintf('Přihlašovací jméno "%s" neexistuje.', $username)
        );
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof WebserviceUser) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === 'Autodoprava\AppBundle\Security\User\WebserviceUser';
    }
}
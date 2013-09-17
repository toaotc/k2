<?php

namespace Kimai\Bundle\AuthBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Kimai\Bundle\CoreBundle\Menu\ConfigureMenuEvent;
use Kimai\Bundle\CoreBundle\Menu\MenuEvents;

/**
 * UserMenuListener
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 */
class UserMenuListener implements EventSubscriberInterface
{
    /**
     * @param ConfigureMenuEvent $event
     */
    public function onMenuConfigure(ConfigureMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu
            ->addChild(
                'logout',
                array(
                    'route' => 'kimai_auth_security_logout',
                    'label' => 'logout.button',
                    'extras' => array(
                        'translation_domain' => 'KimaiAuth'
                    )
                )
            );
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            MenuEvents::CONFIGURE_USER => array('onMenuConfigure', 128)
        );
    }
}

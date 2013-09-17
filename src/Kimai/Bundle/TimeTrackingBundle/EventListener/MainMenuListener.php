<?php

namespace Kimai\Bundle\TimeTrackingBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Kimai\Bundle\CoreBundle\Menu\ConfigureMenuEvent;
use Kimai\Bundle\CoreBundle\Menu\MenuEvents;

/**
 * MainMenuListener
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 */
class MainMenuListener implements EventSubscriberInterface
{
    /**
     * @param ConfigureMenuEvent $event
     */
    public function onMenuConfigure(ConfigureMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu
            ->addChild(
                'timtracking_index',
                array(
                    'route' => 'kimai_timetracking_default_index',
                    'label' => 'menu.timetracking',
                    'extras' => array(
                        'translation_domain' => 'KimaiTimeTracking'
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
            MenuEvents::CONFIGURE_MAIN => array('onMenuConfigure', 128)
        );
    }
}

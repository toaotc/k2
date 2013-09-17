<?php

namespace Kimai\Bundle\CoreBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * MenuBuilder
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 */
class MenuBuilder extends ContainerAware
{
    /**
     * @param FactoryInterface $factory
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function buildAdminMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('kimai.core.menu.admin');

        $this->container->get('event_dispatcher')->dispatch(
            MenuEvents::CONFIGURE_ADMIN,
            new ConfigureMenuEvent($factory, $menu)
        );

        return $menu;
    }

    /**
     * @param FactoryInterface $factory
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function buildMainMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('kimai.core.menu.main');

        $this->container->get('event_dispatcher')->dispatch(
            MenuEvents::CONFIGURE_MAIN,
            new ConfigureMenuEvent($factory, $menu)
        );

        return $menu;
    }

    /**
     * @param FactoryInterface $factory
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function buildUserMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('kimai.core.menu.user');

        $this->container->get('event_dispatcher')->dispatch(
            MenuEvents::CONFIGURE_USER,
            new ConfigureMenuEvent($factory, $menu)
        );

        return $menu;
    }
}

<?php

namespace Kimai\Bundle\CoreBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class ConfigureMenuEvent
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 */
class ConfigureMenuEvent extends Event
{
    /** @var Knp\Menu\FactoryInterface */
    private $factory;

    /** @var Knp\Menu\ItemInterface */
    private $menu;

    /**
     * @param FactoryInterface $factory
     * @param ItemInterface    $menu
     */
    public function __construct(FactoryInterface $factory, ItemInterface $menu)
    {
        $this->factory = $factory;
        $this->menu = $menu;
    }
    /**
     * @return \Knp\Menu\FactoryInterface
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * @return \Knp\Menu\ItemInterface
     */
    public function getMenu()
    {
        return $this->menu;
    }
}

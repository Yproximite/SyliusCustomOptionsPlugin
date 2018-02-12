<?php
/**
 * Created by PhpStorm.
 * User: jtolkemit
 * Date: 09.02.18
 * Time: 13:23
 */

namespace Brille24\CustomerOptionsPlugin\Menu;


use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event){
        $menu = $event->getMenu();

        $newSubmenu = $menu
            ->getChild('catalog')
            ->addChild('new-subitem', ['route' => 'brille24_admin_customer_option_index'])
            ->setLabel('sylius.menu.admin.main.catalog.customer_options')
            ->setLabelAttribute('icon', 'options')
        ;
    }
}
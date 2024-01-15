<?php

namespace App\EventSubscriber;

use Ibexa\AdminUi\Menu\Event\ConfigureMenuEvent;
use Ibexa\AdminUi\Menu\MainMenuBuilder;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class QuotaRequestMenuEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            ConfigureMenuEvent::MAIN_MENU => 'addMenuEntry',
        ];
    }

    public function addMenuEntry(ConfigureMenuEvent $event): void
    {
        $menu = $event->getMenu();

        $contentMenu = $menu[MainMenuBuilder::ITEM_ADMIN];

        $contentMenu->addChild(
            'Quota requests',
            [
                'route' => 'admin_quota_requests_list',
            ],
        );
    }
}

<?php

namespace App\EventSubscriber;

use Ibexa\AdminUi\Menu\Event\ConfigureMenuEvent;
use Ibexa\AdminUi\Menu\MainMenuBuilder;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class QuotaRequestMenuEventSubscriber implements EventSubscriberInterface, LoggerAwareInterface
{
    use LoggerAwareTrait;

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
        if ($contentMenu === null) {
            $this->logger?->warning(sprintf(
                'Main admin menu is missing %s item. Failed to add %s menu position.',
                MainMenuBuilder::ITEM_ADMIN,
                'Quota requests',
            ));

            return;
        }

        $contentMenu->addChild(
            'Quota requests',
            [
                'route' => 'admin_quota_requests_list',
            ],
        );
    }
}

<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Component\Resource\Translation;

use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Translation\Provider\TranslationLocaleProviderInterface;

/**
 * @author Michał Marcinkowski <michal.marcinkowski@lakion.com>
 */
final class TranslatableEntityLocaleAssigner implements TranslatableEntityLocaleAssignerInterface
{
    /**
     * @var TranslationLocaleProviderInterface
     */
    private $translationLocaleProvider;

    /**
     * @param TranslationLocaleProviderInterface $translationLocaleProvider
     */
    public function __construct(TranslationLocaleProviderInterface $translationLocaleProvider)
    {
        $this->translationLocaleProvider = $translationLocaleProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function assignLocale(TranslatableInterface $translatableEntity)
    {
        $localeCode = $this->translationLocaleProvider->getDefaultLocaleCode();

        $translatableEntity->setCurrentLocale($localeCode);
        $translatableEntity->setFallbackLocale($localeCode);
    }
}

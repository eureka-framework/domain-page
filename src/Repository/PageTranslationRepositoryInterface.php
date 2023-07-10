<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Eureka\Domain\Page\Repository;

use Eureka\Component\Orm\RepositoryInterface;
use Eureka\Domain\Page\Entity\PageTranslation;

/**
 * PageTranslation repository interface.
 *
 * @author Eureka Orm Generator
 */
interface PageTranslationRepositoryInterface extends RepositoryInterface
{
    public function findByPageIdAndLang(int $id, string $lang): PageTranslation;
}

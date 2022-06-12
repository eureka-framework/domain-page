<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Eureka\Domain\Page\Enum;

/**
 * Page Status Enum.
 *
 * @author Romain Cottard
 */
class PageStatus
{
   public const DISABLED = 0;
   public const DRAFT = 1;
   public const PUBLISHED = 2;
}

<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Eureka\Domain\Page\Enum;

enum PageStatus: int
{
    case Disabled = 0;
    case Draft = 1;
    case Published = 2;
}

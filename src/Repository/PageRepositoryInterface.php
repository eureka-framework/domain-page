<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Eureka\Domain\Page\Repository;

use Eureka\Component\Orm\Exception\EntityNotExistsException;
use Eureka\Component\Orm\Exception\InvalidQueryException;
use Eureka\Component\Orm\Exception\OrmException;
use Eureka\Component\Orm\RepositoryInterface;
use Eureka\Domain\Page\Entity\Page;

/**
 * Page repository interface.
 *
 * @author Eureka Orm Generator
 */
interface PageRepositoryInterface extends RepositoryInterface
{
    /**
     * @param string $slug
     * @return Page
     * @throws EntityNotExistsException
     * @throws InvalidQueryException
     * @throws OrmException
     */
    public function findPublishedPageBySlug(string $slug): Page;
}

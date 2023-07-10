<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Eureka\Domain\Page\Infrastructure\Mapper;

use Eureka\Component\Orm\Exception\EntityNotExistsException;
use Eureka\Component\Orm\Exception\InvalidQueryException;
use Eureka\Component\Orm\Exception\OrmException;
use Eureka\Domain\Page\Entity\Page;
use Eureka\Domain\Page\Enum\PageStatus;
use Eureka\Domain\Page\Repository\PageRepositoryInterface;

/**
 * Mapper class for table "page"
 *
 * @author Eureka Orm Generator
 */
class PageMapper extends Abstracts\AbstractPageMapper implements PageRepositoryInterface
{
    /**
     * @param string $slug
     * @return Page
     * @throws EntityNotExistsException
     * @throws InvalidQueryException
     * @throws OrmException
     */
    public function findPublishedPageBySlug(string $slug): Page
    {
        /** @var Page $page */
        $page = $this->findByKeys(['page_slug' => $slug, 'page_status' => PageStatus::Published->value]);

        return $page;
    }
}

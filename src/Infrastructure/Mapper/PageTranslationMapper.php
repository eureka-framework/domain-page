<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Eureka\Domain\Page\Infrastructure\Mapper;

use Eureka\Component\Orm\Query\SelectBuilder;
use Eureka\Domain\Page\Entity\PageTranslation;
use Eureka\Domain\Page\Repository\PageTranslationRepositoryInterface;

/**
 * Mapper class for table "page_translation"
 *
 * @author Eureka Orm Generator
 */
class PageTranslationMapper extends Abstracts\AbstractPageTranslationMapper implements PageTranslationRepositoryInterface
{
    public function findByPageIdAndLang(int $id, string $lang): PageTranslation
    {
        $builder = new SelectBuilder($this);
        $builder->addWhere('page_id', $id);
        $builder->addWhere('lang_code', $lang);

        return $this->selectOne($builder);
    }
}

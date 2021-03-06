<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Eureka\Domain\Page\Infrastructure\Mapper\Abstracts;

use Eureka\Component\Orm\AbstractMapper;
use Eureka\Domain\Page\Entity\Page;

/**
 * Abstract Page mapper class.
 *
 * /!\ AUTO GENERATED FILE. DO NOT EDIT THIS FILE.
 * You can add your specific code in child class: {{ class.child }}
 *
 * @author Eureka Orm Generator
 */
abstract class AbstractPageMapper extends AbstractMapper
{
    /**
     * Initialize mapper with proper values for mapped table.
     *
     * @return void
     */
    protected function initialize(): void
    {
        $this->setEntityClass(Page::class);
        $this->setTable('page');

        $this->setFields([
            'page_id',
            'page_name',
            'page_slug',
            'page_content',
            'page_status'
        ]);

        $this->setPrimaryKeys([
            'page_id'
        ]);

        $this->setNamesMap([
            'page_id' => [
                'get'      => 'getId',
                'set'      => 'setId',
                'property' => 'id',
            ],
            'page_name' => [
                'get'      => 'getName',
                'set'      => 'setName',
                'property' => 'name',
            ],
            'page_slug' => [
                'get'      => 'getSlug',
                'set'      => 'setSlug',
                'property' => 'slug',
            ],
            'page_content' => [
                'get'      => 'getContent',
                'set'      => 'setContent',
                'property' => 'content',
            ],
            'page_status' => [
                'get'      => 'getStatus',
                'set'      => 'setStatus',
                'property' => 'status',
            ],
        ]);

        $this->setValidatorConfig([
            'page_id' => [
                'type'      => 'integer',
                'options'   => ['min_range' => 0, 'max_range' => 4294967295],
            ],
            'page_name' => [
                'type'      => 'string',
                'options'   => ['min_length' => 0, 'max_length' => 100],
            ],
            'page_slug' => [
                'type'      => 'string',
                'options'   => ['min_length' => 0, 'max_length' => 100],
            ],
            'page_content' => [
                'type'      => 'string',
                'options'   => ['min_length' => 0, 'max_length' => 65535],
            ],
            'page_status' => [
                'type'      => 'integer',
                'options'   => ['min_range' => -128, 'max_range' => 127],
            ],
        ]);

        $this->setJoinConfigs([
        ]);
    }
}

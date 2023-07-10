<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Eureka\Domain\Page\Entity\Abstracts;

use Eureka\Component\Orm\AbstractEntity;
use Eureka\Component\Orm\RepositoryInterface;
use Eureka\Component\Validation\Exception\ValidationException;
use Eureka\Component\Validation\ValidatorFactoryInterface;
use Eureka\Component\Validation\ValidatorEntityFactoryInterface;

/**
 * Abstract PageTranslation data class.
 *
 * /!\ AUTO GENERATED FILE. DO NOT EDIT THIS FILE.
 * You can add your specific code in child class: PageTranslation
 *
 * @author Eureka Orm Generator
 */
abstract class AbstractPageTranslation extends AbstractEntity
{
    /** @var int $pageId Property pageId */
    protected int $pageId = 0;

    /** @var string $langCode Property langCode */
    protected string $langCode = '';

    /** @var string $content Property content */
    protected string $content = '';

    /**
     * AbstractEntity constructor.
     *
     * @param RepositoryInterface $repository
     * @param ValidatorFactoryInterface|null $validatorFactory
     * @param ValidatorEntityFactoryInterface|null $validatorEntityFactory
     */
    public function __construct(
        RepositoryInterface $repository,
        ?ValidatorFactoryInterface $validatorFactory = null,
        ?ValidatorEntityFactoryInterface $validatorEntityFactory = null
    ) {
        $this->setRepository($repository);
        $this->setValidatorFactories($validatorFactory, $validatorEntityFactory);

        $this->setValidatorConfig([
            'page_id' => [
                'type'      => 'integer',
                'options'   => ['min_range' => 0, 'max_range' => 4294967295],
            ],
            'lang_code' => [
                'type'      => 'string',
                'options'   => ['min_length' => 0, 'max_length' => 2],
            ],
            'page_translation_content' => [
                'type'      => 'string',
                'options'   => ['min_length' => 0, 'max_length' => 65535],
            ],
        ]);
    }

    /**
     * Get cache key
     *
     * @return string
     */
    public function getCacheKey(): string
    {
        return 'eka.dm.blog.page.translation.' . $this->getPageId() . $this->getLangCode();
    }

    /**
     * Get value for property "page_id"
     *
     * @return int
     */
    public function getPageId(): int
    {
        return $this->pageId;
    }

    /**
     * Get value for property "lang_code"
     *
     * @return string
     */
    public function getLangCode(): string
    {
        return $this->langCode;
    }

    /**
     * Get value for property "page_translation_content"
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set value for property "page_id"
     *
     * @param  int $pageId
     * @return $this
     * @throws ValidationException
     */
    public function setPageId(int $pageId): self
    {
        $this->validateInput('page_id', $pageId);

        if ($this->exists() && $this->pageId !== $pageId) {
            $this->markFieldAsUpdated('pageId');
        }

        $this->pageId = $pageId;

        return $this;
    }

    /**
     * Set value for property "lang_code"
     *
     * @param  string $langCode
     * @return $this
     * @throws ValidationException
     */
    public function setLangCode(string $langCode): self
    {
        $this->validateInput('lang_code', $langCode);

        if ($this->exists() && $this->langCode !== $langCode) {
            $this->markFieldAsUpdated('langCode');
        }

        $this->langCode = $langCode;

        return $this;
    }

    /**
     * Set value for property "page_translation_content"
     *
     * @param  string $content
     * @return $this
     * @throws ValidationException
     */
    public function setContent(string $content): self
    {
        $this->validateInput('page_translation_content', $content);

        if ($this->exists() && $this->content !== $content) {
            $this->markFieldAsUpdated('content');
        }

        $this->content = $content;

        return $this;
    }
}

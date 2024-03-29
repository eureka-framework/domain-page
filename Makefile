.PHONY: validate install update phpcs phpcbf php81compatibility php82compatibility phpstan analyze tests testdox ci clean

PHP_FILES := $(shell find src tests -type f -name '*.php')
define header =
    @if [ -t 1 ]; then printf "\n\e[37m\e[100m  \e[104m $(1) \e[0m\n"; else printf "\n### $(1)\n"; fi
endef

#~ Composer dependency
validate:
	$(call header,Composer Validation)
	@composer validate

install:
	$(call header,Composer Install)
	@composer install

update:
	$(call header,Composer Update)
	@composer update

composer.lock: install

orm: install
	$(call header,ORM re-generation)
	@bin/console orm/script/generator

#~ Vendor binaries dependencies
vendor/bin/phpcbf:
vendor/bin/phpcs:
vendor/bin/phpstan:
vendor/bin/phpunit:

#~ Report directories dependencies
build/reports/phpunit:
	@mkdir -p build/reports/phpunit

build/reports/phpcs:
	@mkdir -p build/reports/cs

build/reports/phpstan:
	@mkdir -p build/reports/phpstan

#~ main commands
phpcs: vendor/bin/phpcs build/reports/phpcs
	$(call header,Checking Code Style)
	@./vendor/bin/phpcs --standard=./ci/phpcs/eureka.xml --cache=./build/cs_deezer.cache -p --report-full --report-checkstyle=./build/reports/cs/eureka.xml src/ tests/

phpcbf: vendor/bin/phpcbf
	$(call header,Fixing Code Style)
	@./vendor/bin/phpcbf --standard=./ci/phpcs/eureka.xml src/ tests/

php81compatibility: vendor/bin/phpstan build/reports/phpstan
	$(call header,Checking PHP 8.1 compatibility)
	@./vendor/bin/phpstan analyse --configuration=./ci/php81-compatibility.neon --error-format=table

php82compatibility: vendor/bin/phpstan build/reports/phpstan
	$(call header,Checking PHP 8.2 compatibility)
	@./vendor/bin/phpstan analyse --configuration=./ci/php82-compatibility.neon --error-format=table

analyze: vendor/bin/phpstan build/reports/phpstan
	$(call header,Running Static Analyze - Pretty tty format)
	@./vendor/bin/phpstan analyse --error-format=table

phpstan: vendor/bin/phpstan build/reports/phpstan
	$(call header,Running Static Analyze)
	@./vendor/bin/phpstan analyse --error-format=checkstyle > ./build/reports/phpstan/phpstan.xml

tests: vendor/bin/phpunit build/reports/phpunit $(PHP_FILES)
	$(call header,Running Unit Tests)
	@XDEBUG_MODE=coverage php -dzend_extension=xdebug.so ./vendor/bin/phpunit --coverage-clover=./build/reports/phpunit/clover.xml --log-junit=./build/reports/phpunit/unit.xml --coverage-php=./build/reports/phpunit/unit.cov --coverage-html=./build/reports/coverage/ --fail-on-warning

testdox: vendor/bin/phpunit $(PHP_FILES)
	$(call header,Running Unit Tests (Pretty format))
	@XDEBUG_MODE=coverage php -dzend_extension=xdebug.so ./vendor/bin/phpunit --fail-on-warning --testdox

clean:
	$(call header,Cleaning previous build)
	@if [ "$(shell ls -A ./build)" ]; then rm -rf ./build/*; fi; echo " done"

ci: clean validate install phpcs tests php81compatibility php82compatibility analyze

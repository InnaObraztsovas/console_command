FROM php:8.1-cli

WORKDIR /app

COPY --from=composer:2.1.9 /usr/bin/composer /usr/bin/composer


FROM ghcr.io/phpstan/phpstan:latest
RUN composer global require phpstan/phpstan-phpunit
#
#
#CMD ["vendor/bin/phpstan", "analyse","--level", "9", "src", "index.php"]

ENTRYPOINT ["vendor/bin/phpstan", "analyse","-c", "phpstan.neon"]

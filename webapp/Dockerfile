FROM php:7.1-fpm
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer
RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
zlib1g-dev \
vim
RUN apt-get update \
    && apt-get install -y libpq-dev locales cron \
    && pecl install xdebug-2.9.8 \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-enable xdebug
RUN locale-gen ja_JP UTF-8
ENV TZ Asia/Tokyo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
WORKDIR /var/www/html
COPY xdebug.ini /usr/local/etc/php/conf.d/
COPY crontab /var/spool/cron/crontabs/root
RUN crontab /var/spool/cron/crontabs/root
CMD cron && docker-php-entrypoint php-fpm

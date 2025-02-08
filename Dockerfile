ARG PHP_VERSION=8.3 \
	COMPOSER_VERSION=latest

# At the moment, it's NOT possible to interpolate inside the COPY --from
FROM composer:${COMPOSER_VERSION} AS composer
FROM php:${PHP_VERSION}
COPY --from=composer /usr/bin/composer /usr/bin/composer

# https://getcomposer.org/doc/articles/troubleshooting.md#root-package-version-detection
ENV COMPOSER_ROOT_VERSION=2.0.x-dev

ARG USERNAME=faker \
 	USER_UID=1000 \
	USER_GID=$USER_UID

RUN groupadd --gid $USER_GID $USERNAME \
    && useradd --uid $USER_UID --gid $USER_GID -m $USERNAME

RUN apt-get update && apt-get install -y \
		gzip \
		unzip

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN install-php-extensions intl 

USER $USERNAME

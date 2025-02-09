ARG PHP_VERSION=8.3 \
	COMPOSER_VERSION=latest \
	EXTENSION_INSTALLER_VERSION=latest

# At the moment, it's NOT possible to interpolate inside the COPY --from
FROM mlocati/php-extension-installer:${EXTENSION_INSTALLER_VERSION} AS extension-installer
FROM composer:${COMPOSER_VERSION} AS composer
FROM php:${PHP_VERSION}
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY --from=extension-installer --chmod=0755 /usr/bin/install-php-extensions /usr/local/bin/

# https://getcomposer.org/doc/articles/troubleshooting.md#root-package-version-detection
ENV COMPOSER_ROOT_VERSION=2.0.x-dev

ARG USERNAME=FakerPHP \
 	USER_UID=1000 \
	USER_GID=$USER_UID

RUN groupadd --gid $USER_GID $USERNAME \
    && useradd --uid $USER_UID --gid $USER_GID -m $USERNAME

RUN apt-get update && apt-get install -y \
		unzip

RUN install-php-extensions intl 

USER $USERNAME

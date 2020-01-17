FROM phpdockerio/php73-fpm:latest

RUN apt-get update \
    && apt-get -y --no-install-recommends install imagemagick php7.3-mysql php7.3-gd php7.3-gmp php7.3-iconv php7.3-intl php7.3-mbstring php7.3-sqlite3\
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*


WORKDIR "/var/www/kilo"
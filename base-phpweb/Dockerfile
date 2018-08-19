FROM php:7.2-apache

RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite

# custom apache config -- DEVOPS~!
ADD ./conf/ /opt/docker-conf
RUN cp /opt/docker-conf/httpd_symfony.conf /etc/apache2/conf-enabled/httpd_symfony.conf

RUN mkdir /webapp && rm -rf /var/www/html && \
  ln -s /webapp/public /var/www/html

VOLUME /webapp

EXPOSE 80

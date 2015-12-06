FROM centos
RUN yum install -y epel-release
RUN yum install -y gcc automake autoconf libtool make
RUN yum install -y libxml2-devel gd-devel libmcrypt-devel libcurl-devel openssl-devel
RUN yum install -y wget
ENV PHP_VERSION php-7.0.0
ADD $PHP_VERSION $PHP_VERSION
RUN cd $PHP_VERSION && ./configure --prefix=/usr/local/php --with-config-file-path=/usr/local/php/etc --enable-fpm --enable-shared --with-libxml-dir --with--mysql --with-gd --with-openssl --enable-mbstring --with-mcrypt --with-mysqli --enable-opcache --enable-mysqlnd --enable-zip --with-zlib-dir --with-pdo-mysql --with-jpeg-dir --with-freetype-dir --with-curl --without-pdo-sqlite --without-sqlite3
RUN cd $PHP_VERSION && make
RUN cd $PHP_VERSION && make install
RUN mv /usr/local/php/etc/php-fpm.conf.default /usr/local/php/etc/php-fpm.conf
RUN ln -s /usr/local/php/sbin/php-fpm /usr/sbin/php-fpm
RUN cat /usr/local/php/etc/php-fpm.d/www.conf.default
RUN groupadd www
RUN useradd www -g www
ADD php-fpm.conf /usr/local/php/etc/php-fpm.conf
ADD php-fpm/www.conf /usr/local/php/etc/php-fpm.d/www.conf
RUN yum install -y nginx && chown -R www:www /var/lib/nginx
RUN yum install -y supervisor
RUN mkdir -p /var/run/sshd
RUN mkdir -p /var/log/supervisor
ADD supervisord.conf /etc/supervisord.conf
EXPOSE 80
ADD nginx.conf /etc/nginx/
ADD site /etc/nginx/conf.d
RUN echo "daemon off;" >> /etc/nginx/nginx.conf
ADD src /usr/share/nginx/html/zfblog
ADD composer.phar /usr/bin/composer
RUN cd /usr/share/nginx/html/zfblog && composer install
RUN chown -R www:www /usr/share/nginx/html/zfblog
CMD ["/usr/bin/supervisord"]

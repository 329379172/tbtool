FROM centos:7
RUN yum install -y epel-release
RUN yum install -y git
RUN yum install -y gcc automake autoconf libtool make
RUN yum install -y libxml2-devel gd-devel libmcrypt-devel libcurl-devel openssl-devel
ADD php-7.0.0.zip php-7.0.0.zip
RUN unzip php-7.0.0.zip
RUN cd php-7.0.0 && ls && ./configure --prefix=/usr/local/php --with-config-file-path=/usr/local/php/etc --enable-fpm --enable-shared --with-libxml-dir --with--mysql --with-gd --with-openssl --enable-mbstring --with-mcrypt --with-mysqli --enable-opcache --enable-mysqlnd --enable-zip --with-zlib-dir --with-pdo-mysql --with-jpeg-dir --with-freetype-dir --with-curl --without-pdo-sqlite --without-sqlite3
RUN cd php-7.0.0 && make
RUN cd php-7.0.0 && make install
RUN mv /usr/local/php/etc/php-fpm.conf.default /usr/local/php/etc/php-fpm.conf
RUN ln -s /usr/local/php/sbin/php-fpm /usr/sbin/php-fpm
RUN groupadd www
RUN useradd www -g www
ADD php-fpm.conf /usr/local/php/etc/php-fpm.conf
ADD php-fpm/www.conf /usr/local/php/etc/php-fpm.d/www.conf
ADD libunwind-1.1-3.sdl7.x86_64.rpm libunwind-1.1-3.sdl7.x86_64.rpm
RUN rpm -Uvh libunwind-1.1-3.sdl7.x86_64.rpm
RUN yum install -y nginx && chown -R www:www /var/lib/nginx
RUN yum install -y supervisor
RUN mkdir -p /var/run/sshd
RUN mkdir -p /var/log/supervisor
ADD supervisord.conf /etc/supervisord.conf
ADD nginx.conf /etc/nginx/
ADD site /etc/nginx/conf.d
ADD src /usr/share/nginx/html/zfblog
#ADD composer.phar /usr/bin/composer
#RUN ln -s /usr/local/php/bin/php /usr/bin/php
#RUN cd /usr/share/nginx/html/zfblog && composer install
RUN chown -R www:www /usr/share/nginx/html/zfblog
EXPOSE 80
CMD ["/usr/bin/supervisord"]

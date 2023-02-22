FROM php:8.1.1-fpm

# Arguments
ARG user=raycon
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    iputils-ping \
    htop \
    supervisor \
    cron \
    tzdata \
    sqlite3

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# set timezone
ENV TZ="America/Sao_Paulo"

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

RUN docker-php-ext-install calendar
RUN docker-php-ext-install zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY docker/php.ini /usr/local/etc/php/

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Laravel schedule
RUN echo "* * * * * cd /var/www && php artisan schedule:run >> /dev/null 2>&1" | crontab -

COPY docker/schedule-laravel/supervisord.conf /etc/supervisor/supervisord.conf

COPY docker/schedule-laravel/entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh

# Set working directory
WORKDIR /var/www

USER $user


## DOCKERFILE FUNCIONANDO, MAS O ENV EXAMPLE TÁ COM SQLITE PARA TESTE, FAZER O COMPOSE COM O DB
# Build stage for Node.js
FROM node:20-slim AS node-builder
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# PHP stage
FROM php:8.2.12-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader

# Copy built assets from node stage
COPY --from=node-builder /app/public/build /app/public/build

# Copy the rest of the application
COPY . .

# Generate optimized autoload files
RUN composer dump-autoload --optimize

# Set appropriate permissions
COPY .env.example .env
RUN php artisan key:generate
RUN chmod -R 775 storage bootstrap/cache

# Expose port 9000 for PHP-FPM
EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
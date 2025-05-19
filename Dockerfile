FROM php:8.3-fpm

# Instala dependencias del sistema operativo (incluyendo Node.js y npm)
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libpq-dev \
    libzip-dev \
    nodejs \
    npm \
    --no-install-recommends # La última línea de apt-get install NO lleva \

# Limpia el cache de apt para reducir el tamaño de la imagen
RUN rm -rf /var/lib/apt/lists/*

# Instala extensiones de PHP
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd pdo_pgsql

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia el proyecto Laravel
WORKDIR /var/www
COPY . .

# Instala dependencias PHP del proyecto
RUN composer install --no-dev --optimize-autoloader

# Limpia caché de Laravel (recomendado)
RUN php artisan optimize:clear && php artisan config:clear && php artisan route:clear && php artisan view:clear

# Instala las dependencias de Node.js (package.json) y compila los assets de frontend
RUN npm install && npm run build

# Genera APP_KEY y enlaces (si no se genera por Render)
RUN php artisan key:generate && \
    php artisan storage:link || true

# Exposición del puerto para PHP server
EXPOSE 8000

# Comando para ejecutar la aplicación
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
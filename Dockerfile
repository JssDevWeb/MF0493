FROM php:8.3-fpm

# Instala dependencias necesarias para PHP, la base de datos y Node.js/NPM
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
    nodejs \ # <-- Añadido: Instala Node.js
    npm \    # <-- Añadido: Instala npm
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd pdo_pgsql

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia el proyecto Laravel
WORKDIR /var/www
COPY . .

# Instala dependencias PHP del proyecto
RUN composer install --no-dev --optimize-autoloader

# Limpia caché de Laravel (recomendado, para asegurar que no haya caché local)
RUN php artisan optimize:clear && php artisan config:clear && php artisan route:clear && php artisan view:clear

# *** NUEVOS PASOS PARA EL FRONTEND ***
# Instala las dependencias de Node.js (package.json)
RUN npm install

# Compila los assets de frontend para producción
RUN npm run build
# ***********************************

# Genera APP_KEY y enlaces (si no se genera por Render)
RUN php artisan key:generate && \
    php artisan storage:link || true

# Exposición del puerto para PHP server
EXPOSE 8000

# Comando para ejecutar la aplicación
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
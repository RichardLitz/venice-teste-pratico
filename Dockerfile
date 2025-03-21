# Use a imagem base do PHP 8.2 com FPM (para Nginx)
FROM php:8.2.11-fpm

# Instale as dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    nginx \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip mbstring exif pcntl bcmath

# Instale o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instale o Node.js 20
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Copie os arquivos do projeto para o container
COPY . /var/www/html
WORKDIR /var/www/html

# Instale as dependências do Composer e do Node.js
RUN composer install --no-dev --optimize-autoloader
RUN npm install

# Compile os assets do Tailwind CSS
RUN npm run build

# Defina as permissões corretas
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copie o arquivo de configuração do Nginx
COPY ./docker/nginx.conf /etc/nginx/sites-available/default

# Exponha a porta 80
EXPOSE 80

# Comando para iniciar o Nginx e o PHP-FPM
CMD service nginx start && php-fpm
# Usar la imagen oficial PHP 8.2 CLI
FROM php:8.2-cli

# Instalar dependencias del sistema (zip, git, curl)
RUN apt-get update && apt-get install -y \ 
    zip \
    git \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Instalar Node.js y npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar extensiones PHP necesarias (pdo_mysql)
RUN docker-php-ext-install pdo_mysql

# Establecer el directorio de trabajo
WORKDIR /app
COPY ../ /app
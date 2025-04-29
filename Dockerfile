FROM php:8.4-apache

# Copia tu proyecto al contenedor
COPY . /var/www/html/

# Habilita el módulo de reescritura si lo necesitas (opcional)
RUN a2enmod rewrite

# Asegúrate de que Apache escucha en el puerto 80
EXPOSE 80
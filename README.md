<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Acarca de la aplicación

Este proyecto permite gestionar de forma integral las operaciones de un taller mecánico: clientes, vehículos, servicios, productos, reparaciones, pagos y turnos.

Desarrollado con [Laravel](https://laravel.com/) y [Filament Admin](https://filamentphp.com/), está pensado para facilitar el día a día del taller de manera ágil, ordenada y profesional.

## Funcionalidades principales

### Gestión de clientes

-   Registro de datos personales, localidad, provincia y observaciones.
-   Marcado automático si el cliente tiene deuda pendiente.

### Gestión de vehículos

-   Asociación de vehículos a clientes.
-   Registro de patente, marca, modelo y observaciones.

### Servicios ofrecidos

-   Carga de servicios con descripción y precio base.
-   Asociación de múltiples servicios a una reparación.

### Control de productos

-   Gestión de stock, precio de costo, disponibilidad y observaciones.
-   Asociación de productos a cada servicio.

### Reparaciones

-   Registro de reparaciones con kilometraje, fecha, observaciones y seguimiento de mantenimiento futuro.
-   Indicación de si el vehículo fue retirado y cuándo.
-   Reparaciones con múltiples servicios y productos.

### Pagos

-   Registro de pagos por reparación.
-   Control de forma de pago, monto, fecha y saldo restante.

### Turnero

-   Agenda de turnos por cliente y vehículo.
-   Visualización de turnos del día desde el dashboard.
-   Motivo del turno, estado (pendiente, confirmado, cancelado, atendido) y observaciones.

---

## Requisitos

-   PHP 8.4+
-   Laravel 10+
-   MySQL o PostgreSQL
-   Composer
-   Node.js + npm (para assets opcionales)
-   Laravel Filament

---

## ⚙️ Instalación

```bash
git clone https://github.com/tuusuario/taller-mecanico.git
cd taller-mecanico

# Instalar dependencias
composer install

# Variables de entorno
cp .env.example .env
php artisan key:generate

# Configurar base de datos en .env
php artisan migrate

# Crear usuario para Filament
php artisan make:filament-user

```

# 🚀 Blog System - Laravel 10

Sistema de blog moderno desarrollado con **Laravel 10**, basado en el curso de Coders Free y mejorado con una arquitectura más robusta, funcionalidades avanzadas y buenas prácticas de desarrollo profesional.

---

## 📌 Descripción

Este proyecto es una evolución de un sistema base aprendido en Coders Free, mejorado con un enfoque práctico y profesional, incorporando:

* Arquitectura escalable
* Código limpio y mantenible
* Interactividad moderna
* Control de acceso avanzado
* Panel administrativo completo

---

## 🛠️ Stack Tecnológico

* ⚙️ PHP 8.1+
* 🚀 Laravel 10
* ⚡ Livewire (componentes reactivos)
* 🧩 Alpine.js (interactividad ligera)
* 🔐 Laravel Jetstream (autenticación completa)
* 🗄️ PostgreSQL / MySQL
* 🎨 Blade + Vite

---

## 🧱 Arquitectura del Proyecto

El sistema sigue buenas prácticas de desarrollo backend:

* **MVC (Model - View - Controller)**
* **Services Layer** → lógica de negocio desacoplada
* **Repositories (opcional)** → abstracción de datos
* **Componentes Livewire** → UI dinámica sin SPA

### Beneficios:

* Código escalable y mantenible
* Separación clara de responsabilidades
* Fácil extensión del sistema

---

## ✨ Características

* ✅ Autenticación completa con Jetstream
* ✅ Sistema de roles y permisos
* ✅ Dashboard administrativo
* ✅ CRUD completo de publicaciones (posts)
* ✅ Gestión de categorías
* ✅ Sistema de etiquetas (tags)
* ✅ Componentes dinámicos con Livewire
* ✅ Interactividad con Alpine.js
* ✅ Formularios reactivos
* ✅ Migraciones y seeders
* ✅ Arquitectura preparada para producción

---

## 🔐 Control de acceso

El sistema implementa control de acceso basado en roles y permisos:

* Administración de usuarios
* Restricción de funcionalidades según rol
* Seguridad en rutas y controladores

---

## 📊 Dashboard

Incluye un panel administrativo que permite:

* Visualización general del sistema
* Gestión de contenido
* Administración de usuarios, roles y permisos
* Navegación eficiente para operaciones CRUD

---

## 📂 Estructura del proyecto

```bash id="c9x2lq"
app/
 ├── Models/
 ├── Http/
 │    ├── Controllers/
 │    └── Requests/
 ├── Livewire/
 ├── Services/
 └── Repositories/

database/
 ├── migrations/
 └── seeders/

resources/
 ├── views/
 └── js/
```

---

## ⚙️ Instalación

```bash id="4h3kzn"
# Clonar repositorio
git clone https://github.com/tu-usuario/tu-repo.git

# Entrar al proyecto
cd tu-repo

# Instalar dependencias
composer install
npm install

# Configurar entorno
cp .env.example .env

# Generar clave
php artisan key:generate

# Configurar base de datos en .env

# Migraciones
php artisan migrate

# Seeders (opcional)
php artisan db:seed

# Ejecutar servidor
php artisan serve

# Compilar assets
npm run dev
```

---

## ⚡ Interactividad (Livewire + Alpine.js)

El sistema combina:

* **Livewire** → lógica reactiva desde el servidor
* **Alpine.js** → comportamiento dinámico en frontend

Esto permite una experiencia fluida sin necesidad de frameworks complejos.

---

## 🧠 Mejoras implementadas

Respecto al proyecto original del curso:

* 🔥 Refactorización de controladores
* 🔥 Implementación de Services
* 🔥 Integración de Livewire y Alpine.js
* 🔥 Autenticación robusta con Jetstream
* 🔥 Sistema de roles y permisos
* 🔥 Dashboard administrativo
* 🔥 Optimización de consultas (Eloquent)
* 🔥 Mejor diseño de base de datos
* 🔥 Código preparado para entorno real

---

## 🚀 Posibles mejoras futuras

* API REST (Laravel API Resources)
* Integración con frontend SPA (React)
* Tests automatizados (PHPUnit)
* CI/CD (GitHub Actions)
* Deploy en servidor Linux (Ubuntu)

---

## 🤝 Contribuciones

1. Fork del proyecto
2. Crear una rama (`feature/nueva-funcionalidad`)
3. Commit de cambios
4. Push a la rama
5. Pull Request

---

## 📄 Licencia

Licencia MIT.

---

## 👨‍💻 Autor

**Alex Uma**
Proyecto basado en el curso de Coders Free, mejorado con un enfoque profesional orientado a portafolio y desarrollo real.

---

## ⭐ Apoya el proyecto

Si este proyecto te resulta útil, dale una ⭐ en GitHub.

---

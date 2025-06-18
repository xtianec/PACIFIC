# Instrucciones para agentes

Este repositorio implementa un sistema con arquitectura MVC en PHP.

## Organización
- `controlador/`: archivos de controladores (`*Controller.php`).
- `modelos/`: modelos de base de datos.
- `vistas/`: vistas asociadas a cada entidad.
- `config/`: contiene la conexión y utilidades.
- `app/`: recursos estáticos utilizados por las vistas.
- `index.php`: punto de entrada que resuelve la URL y carga el controlador y método solicitados.
- Los errores se registran en `logs/errors.log` mediante `logError()`.

## Contribuir
- Mantén el estilo existente y comentarios en español.
- Al crear una nueva funcionalidad sigue el patrón MVC: modelo, controlador y vista.
- Reutiliza la conexión definida en `config/Conexion.php` y usa `logError()` para registrar errores.

## Scripts útiles
- `scripts/generate_views.php` genera las vistas y archivos JS para un controlador cuando no existen.

## Pruebas
- Para validar la sintaxis de los archivos PHP modificados, ejecuta:
  ```
  php -l <archivo.php>
  ```
- Si `php` no está disponible, indica dicha limitación en la sección de pruebas.

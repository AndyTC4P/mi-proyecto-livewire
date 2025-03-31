# 📄 CHANGELOG - CV Book

Este archivo documenta los cambios realizados por versión en el proyecto [CV Book](https://cvbook.online).

---
## [v1.1.2] - 2025-03-27

🛠 Cambios técnicos
Se actualizó el archivo .htaccess para prevenir problemas de redirección almacenados en caché por navegadores que visitaron el dominio antes del despliegue del sistema Laravel.

Se forzaron cabeceras Cache-Control para evitar que versiones anteriores del sitio redirijan incorrectamente al usuario.

Se actualizó el modelo CV (App\Models\CV) para incluir los nuevos campos en $fillable y $casts.

Se crearon nuevas migraciones para agregar los campos pais, ciudad, habilidades e idiomas a la tabla cvs.

Se ajustó el componente CvForm para cargar y guardar correctamente todos los nuevos campos.

✅ Mejoras en la interfaz
Se mejoró el diseño de la vista Mis CVs en dispositivos móviles, asegurando que los botones no se desborden y se mantengan alineados verticalmente.

En la vista pública del CV:

Se agregaron los campos de correo electrónico y número de teléfono justo debajo del título profesional.

Se mostraron con un estilo limpio y profesional (sin íconos).

✨ Nuevas funcionalidades
Se agregaron los campos País y Ciudad al formulario de CV.

Se añadió una sección dinámica para ingresar múltiples Habilidades.

Se implementó la selección múltiple de Idiomas conocidos.

En la sección de Experiencia Laboral, se incorporó el campo Tareas, Responsabilidades y Logros (máx. 500 caracteres por entrada).

La vista de edición del CV (edit.blade.php) ahora precarga correctamente todos los campos, incluidos los nuevos.

La vista de visualización del CV (show.blade.php) ahora muestra:

Información de contacto y ubicación.

Lista de habilidades.

Idiomas seleccionados.

Descripción de tareas en cada experiencia laboral.

## [v1.1.0] - 2025-03-27

### 🔧 Corregido
- El checkbox "Hacer CV público" en el formulario de edición ahora refleja correctamente el estado actual del CV.
- Se solucionó el problema con la visualización de la imagen de perfil en producción: se ejecutó `php artisan storage:link` para permitir el acceso público a las imágenes subidas.

- Se corrigió un error que causaba que el modal de confirmación de eliminación se mostrara brevemente al cargar la vista de “Mis CVs”.

- ### 💄 Mejorado
- Se reemplazó el mensaje de sistema `alert()` al copiar enlace por un mensaje visual tipo toast usando AlpineJS, integrado al botón de “Copiar Enlace”.
- Se eliminó el uso del evento Livewire `copiar-enlace` en favor de una solución más directa y moderna.
- Se reemplazó el cuadro `confirm()` del navegador al eliminar un CV por un modal personalizado y estilizado con AlpineJS.
- Ahora la navegación móvil muestra correctamente las opciones:
  - 📄 Mis CVs
  - ✍️ Crear CV
  - 👤 Perfil
  - 🚪 Cerrar sesión
- Se añadió `x-init="showModal = false"` y `x-cloak` al modal para evitar que se muestre brevemente al navegar.
- Se añadió una ruta POST para `/logout` para compatibilidad con el nuevo formulario de cierre de sesión.
Vista de lista de CVs optimizada para dispositivos móviles. Los botones ahora se muestran en una cuadrícula 2x2 y se adaptan correctamente a pantallas pequeñas. (2025-03-27 11:38)




### 🔜 En proceso
- Revisión general de validaciones visuales
- Mejoras en presentación para formularios y vista del CV
---

## [v1.0.0] - 2025-03-26

### 🆕 Agregado
- Publicación inicial del sistema CV Book en producción (`cvbook.online`)
- Formulario de creación y edición de CVs con campos:
  - Nombres, Apellidos, Título/Profesión, Perfil Profesional
  - Imagen de perfil
  - Correo, Teléfono, Dirección
  - Experiencia laboral dinámica
  - Estudios superiores dinámicos
  - Checkbox de visibilidad pública del CV (`publico`)
- Subida del proyecto a servidor cPanel con PHP 8.2
- Configuración del dominio a `/cvbook_app/public`
- Soporte para assets generados por Vite (`public/build`)


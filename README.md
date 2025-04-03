# APP-SUBIRIMAGENES

**APP-SUBIRIMAGENES** es una aplicación web que permite a los usuarios configurar una conexión a una base de datos, probar la conexión y, posteriormente, subir imágenes junto con datos personalizados a la base de datos.

---

## 📂 Estructura del Proyecto

```bash
APP-SUBIRIMAGENES/
│
├── index.php               # Página principal de la aplicación
│
├── css/                    # Estilos CSS
│   ├── style-margin-adjusters.css
│   ├── main-style.css
│   └── bootstrap/          # Archivos descargados de Bootstrap
│
├── js/                     # Scripts de JavaScript
│   ├── script-functions.js
│   ├── registry.js
│   ├── main-script.js
│   └── bootstrap/          # Archivos descargados de Bootstrap
│
├── php/                    # Scripts PHP
│   ├── db.php              # Gestión de conexión a la base de datos
│   └── submit_table.php     # Manejo del envío de datos e imágenes a la base de datos
│
├── images/                 # Carpeta de imágenes de la app
│   └── CuerpoPerfecto_Pic.ico
│
└── views/                  # Vistas de la aplicación
    ├── delete-connection.php  # Eliminar configuración de conexión
    ├── db-config.php          # Página de configuración de la base de datos
    └── tb-config.php          # Configuración de la tabla donde se almacenarán las imágenes
```

---

## 🚀 Funcionalidades

- **Configuración de la Base de Datos**  
  - Permite establecer los datos de conexión (host, usuario, contraseña, base de datos).
  - Prueba la conexión antes de proceder.

- **Subida de Imágenes con Datos Personalizados**  
  - El usuario puede definir cuántos campos tendrá la tabla en la base de datos.
  - Se generan inputs dinámicos para ingresar los datos personalizados.
  - Se selecciona una imagen y se sube junto con los datos a la base de datos.

- **Gestión de Conexión**  
  - Se puede eliminar o modificar la conexión a la base de datos.
  - Se mantiene la seguridad en el almacenamiento de credenciales.

---

## 🛠️ Tecnologías Utilizadas

- **PHP**: Manejo del backend y conexión a la base de datos.
- **MySQL**: Base de datos para almacenar las imágenes y sus datos.
- **HTML, CSS, JavaScript**: Desarrollo del frontend interactivo.
- **Bootstrap**: Diseño responsivo y estilos predefinidos.

---

## 📌 Instalación y Configuración

### 1️⃣ Clonar el repositorio  
```bash
git clone https://github.com/tu_usuario/APP-SUBIRIMAGENES.git
```

### 2️⃣ Configurar la base de datos  
- Crea una base de datos en MySQL:
  ```sql
  CREATE DATABASE tu_base_de_datos;
  ```

### 3️⃣ Ejecutar la aplicación  
- Asegúrate de tener un servidor local con PHP y MySQL (como XAMPP o MAMP).
- Abre `index.php` en tu navegador.

---

## 🏗️ Cómo Usarlo

1. **Abre la aplicación y configura la conexión a la base de datos.**  
2. **Prueba la conexión** para verificar que todo esté correctamente configurado.  
3. **Regresa al menú principal** y selecciona la opción de "Subir Imagen".  
4. **Define los campos** de la base de datos y asigna valores personalizados.  
5. **Selecciona una imagen** y haz clic en "Subir".  
6. **Verifica que la imagen y los datos se hayan almacenado correctamente.**  

---

## 📌 Contribución

Si deseas contribuir, sigue estos pasos:

1. **Haz un fork de este repositorio.**  
2. **Crea una nueva rama:**  
   ```bash
   git checkout -b nueva-caracteristica
   ```
3. **Realiza tus cambios y haz commit:**  
   ```bash
   git commit -m "Agregada nueva funcionalidad"
   ```
4. **Sube los cambios a tu fork:**  
   ```bash
   git push origin nueva-caracteristica
   ```
5. **Abre un Pull Request en este repositorio.**  

---

## 📄 Licencia

Este proyecto está bajo la **Licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más detalles.

---

## 📞 Contacto

Si tienes preguntas o sugerencias, contáctame en [gercermagden@gmail.com].

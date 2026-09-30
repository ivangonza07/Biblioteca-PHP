# Biblioteca-PHP

## 📖 Descripción

Aplicación web de gestión de librería desarrollada en **PHP** con base de datos **MySQL**. El sistema permite a los usuarios registrarse, iniciar sesión, navegar por un catálogo de libros, realizar pedidos y gestionar el carrito de compras. Incluye un panel de administración para gestionar productos, stock y pedidos. La interfaz está en **euskera**.

## 🚀 Características

### 👤 Usuarios (Bezeroak)
- Registro e inicio de sesión
- Catálogo de productos (libros)
- Carrito de compras (orgatxoa)
- Realización de pedidos
- Historial de pedidos

### 🔧 Administración (Administrazioa)
- Gestión de productos (crear, editar, eliminar)
- Control de stock
- Visualización de pedidos de usuarios
- Gestión de usuarios

## 📋 Requisitos

- **PHP** 7.4 o superior
- **MySQL** 5.7+ o **MariaDB**
- Servidor web (Apache, Nginx o XAMPP/WAMP)

## 🛠️ Tecnologías

- **PHP** - Lógica del servidor
- **MySQL** - Base de datos
- **HTML5** - Estructura de las vistas
- **CSS3** - Estilos

## 📁 Estructura del Proyecto

```
Biblioteca-PHP/
├── index.php                    # Página principal
├── login.php                    # Inicio de sesión
├── loginegin.php                # Procesamiento de login
├── logout.php                   # Cierre de sesión
├── erregistroa.php              # Registro de usuarios
├── DBconexioa.php               # Conexión a base de datos
├── produktuak.php               # Catálogo de productos
├── eskaerak.php                 # Pedidos del usuario
├── eskaerak_egin.php            # Crear nuevo pedido
├── eskaerak_ikusi.php           # Ver pedidos (admin)
├── eskaeratik_kendu.php         # Eliminar pedido
├── eskaera_historiala.php       # Historial de pedidos
├── historiala.php               # Historial del usuario
├── orgatxora_gehitu.php         # Añadir al carrito
├── administrazioa.php           # Panel de administración
├── produktu_gehitu.php          # Añadir producto (admin)
├── produktu_editatu.php         # Editar producto (admin)
├── produktu_kendu.php           # Eliminar producto (admin)
├── prod_edit.php                # Edición de productos
├── prod_edit_ikusi.php          # Ver edición de productos
├── stokeditatu.php              # Editar stock (admin)
├── stockactualizatu.php         # Actualizar stock
├── stockhanditu.php             # Gestionar stock
├── erab_edit.php                # Editar usuario
├── erabiltzaile_editatu.php     # Procesar edición de usuario
├── erabiltzaileneskaerak.php    # Pedidos de usuarios (admin)
├── izenaemate.php               # Asignar nombre
├── infoprod.php                 # Información de producto
├── estilos.css                  # Hoja de estilos
├── inbentarioa-ivan_SQLkode.sql # Script de base de datos
└── IRUDIAK/                     # Carpeta de imágenes
```

## 🗄️ Base de Datos

El sistema utiliza las siguientes tablas:

| Tabla | Descripción |
|-------|-------------|
| `erabiltzaileak` | Usuarios registrados |
| `produktuak` | Productos (libros) |
| `eskaera` | Pedidos |
| `eskaera_historiala` | Historial de pedidos |
| `orgatxoa` | Carrito de compras |
| `eskaera_has_produktuak` | Relación pedidos-productos |
| `produktuak_has_orgatxoa` | Relación productos-carrito |

### Importar la base de datos

```bash
mysql -u root -p < inbentarioa-ivan_SQLkode.sql
```

## 📖 Uso

1. **Configurar la base de datos**: Importa el archivo SQL en tu servidor MySQL
2. **Configurar conexión**: Edita `DBconexioa.php` con tus credenciales
3. **Iniciar servidor**: Coloca los archivos en tu servidor web
4. **Acceder**: Abre `http://localhost/Biblioteca-PHP/` en tu navegador

### Usuarios de prueba

| Usuario | Contraseña | Rol |
|---------|------------|-----|
| `ivan` | `1234` | Bezeroa (Cliente) |
| `admin` | `1234` | Admin (Administrador) |

## 👤 Autor

**Ivan Gonzalez**
- 📧 Email: ivangonzalez@gmail.com
- 📞 Teléfono: 943125468
- 🐦 Twitter: @inbentarioaivan

## 📄 Licencia

Este proyecto es de uso educativo.

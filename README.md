# ENTREGA FINAL - PROYECTO "ENCUÉNTRAME UGB"

**Facultad de Ciencia y Tecnología**  
**Universidad Gerardo Barrios, San Miguel**  
**Fecha:** 14 de junio de 2025

---

## 📜 Portada Oficial

- **Cátedra:** Programación Computacional IV  
- **Catedrático:** Willian Alexis Montes Girón  
- **Grupo:** B3 - Ingeniería en Sistemas y Redes Informáticos

### Equipo de Desarrollo:

| Nombre                                | Código       | Rol         |
|-------------------------------------|--------------|-------------|
| Lilian Amaraly Perla Arias           | SMSS180923   | Backend     |
| Katia Marilin Santos Avelar          | SMSS011422   | Frontend    |
| Flor Guadalupe Villatoro Vasquez     | SMSS125223   | Base de Datos|


## 🎯 Objetivo del Proyecto

"Encuéntrame UGB" es una plataforma web desarrollada en Laravel para la comunidad estudiantil de la UGB, diseñada para:

- Facilitar el reporte y recuperación de objetos perdidos en el campus.  
- Ofrecer un sistema seguro, intuitivo y accesible desde cualquier dispositivo.  
- Garantizar la gestión eficiente de publicaciones mediante permisos de usuario.

---

## 🚀 Funcionalidades Implementadas

### 🔹 Funciones Base (Consolidadas)

- Autenticación con dominio `@ugb.edu.sv`  
- CRUD completo para reportes de objetos perdidos  
- Soporte para imágenes en cada publicación  
- Dashboard personalizado con historial de reportes  

### ✨ Nuevas Funcionalidades (Entrega Final)

- Sistema de permisos avanzado:  
  - Botones de Editar/Eliminar visibles solo para el autor de la publicación  
  - Visualización del nombre del creador original para otros usuarios  

- Mejoras en UX/UI:  
  - Diseño 100% responsive (adaptable a móviles y tablets)  
  - Sección de FAQ integrada con preguntas frecuentes  
  - Notificaciones en tiempo real para actualizaciones importantes  

- Optimizaciones técnicas:  
  - Código documentado y estructura limpia para futuras actualizaciones  
  - Validación reforzada de formularios  

---

## 🛠️ Tecnologías Utilizadas

| Área            | Tecnologías                    |
|-----------------|-------------------------------|
| Frontend        | HTML5, CSS3, JavaScript, Bootstrap 5 |
| Backend         | PHP, Laravel 9, Eloquent ORM  |
| Base de Datos   | MySQL (Migraciones Laravel)   |
| Autenticación   | Laravel Sanctum               |

---

## 📂 Estructura del Proyecto

```bash
├── app/               # Lógica de backend
├── database/          # Migraciones y seeds
├── public/            # Assets y archivos subidos
├── resources/         # Vistas y componentes
├── routes/            # Definición de endpoints
└── tests/             # Pruebas automatizadas

# Aplicació de Gestió d'Articles

He creat una mena d'aplicació que permet gestionar una sèrie d'articles d'una base de dades. Aquesta conté 3 columnes: `ID`, `títol` i `cos`.
En aquest cas, he afegit una paginació al fitxer de 

## Estructura del Projecte

### Vista: Fitxers PHP

- **Formulari d'inserir**: Demana el títol i el cos per poder inserir-ho a la base de dades.
- **Formulari de modificar**: Demana l'ID del missatge, el títol i el cos per modificar l'article.
- **Formulari d'esborrar**: Demana l'ID de l'article i verifica si es vol esborrar finalment l'article.
- **Fitxer de consultar**: Mostra totes les entrades de la base de dades.

### Controlador: 
 - **En funcio de la opcio que hagi escollit l'usuari, va a una pagina o un altra**

### Model:
- **Querys SQL per gestionar a la base de dades**
## Eines Utilitzades

- **MySQL**
- **PHP**

## Base de Dades

La base de dades està exportada amb aquest fitxer.

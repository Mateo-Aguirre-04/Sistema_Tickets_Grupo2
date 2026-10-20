
CREATE DATABASE IF NOT EXISTS BD_Incidencias;


USE BD_Incidencias;

-- Tabla de usuarios
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL
);

-- Tabla de incidencias
CREATE TABLE incidencia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT NOT NULL,
    prioridad ENUM('alta', 'media', 'baja') NOT NULL,
    usuario_id INT NOT NULL,

    FOREIGN KEY (usuario_id)
        REFERENCES usuario(id)
        ON DELETE CASCADE
);

-- Usuario de prueba

INSERT INTO usuario (nombre, usuario, clave)
VALUES (
    'Pepe',
    'pepe',
    '123456'
);

INSERT INTO usuario (nombre, usuario, clave)
VALUES (
    'Martha',
    'martha',
    '123'
);


CREATE TABLE IF NOT EXISTS productos (
id_producto int(11) NOT NULL AUTO_INCREMENT,
nombre VARCHAR(100) NOT NULL,
descripcion VARCHAR(500) NOT NULL,
categoria VARCHAR(100) NOT NULL,
precio float NOT NULL,
PRIMARY KEY (id_producto));
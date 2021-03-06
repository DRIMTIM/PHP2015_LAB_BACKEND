/*Inserto las categorias*/
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Accesorios para Vehículos", "Accesorios para Vehículos");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Animales y Mascotas", "Animales y Mascotas");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Arte y Antigüedades", "Arte y Antigüedades");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Bebés", "Bebés");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Cámaras y Accesorios", "Cámaras y Accesorios");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Celulares y Telefonía", "Celulares y Telefonía");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Coleccionables", "Coleccionables");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Computación", "Computación");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Consolas y Videojuegos", "Consolas y Videojuegos");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Deportes y Fitness", "Deportes y Fitness");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Electrodomésticos y Aires Ac.", "Electrodomésticos y Aires Ac.");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Electrónica, Audio y Video", "Electrónica, Audio y Video");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Hogar, Muebles y Jardín", "Hogar, Muebles y Jardín");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Industrias y Oficinas", "Industrias y Oficinas");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Instrumentos Musicales", "Instrumentos Musicales");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Joyas y Relojes", "Joyas y Relojes");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Juegos y Juguetes", "Juegos y Juguetes");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Música, Libros y Películas", "Música, Libros y Películas");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Ropa, Calzados y Accesorios", "Ropa, Calzados y Accesorios");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Salud y Belleza", "Salud y Belleza");
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES ("Otras categorías", "Otras categorías");

/*Inserto las ofertas temporales*/
INSERT INTO OFERTAS (titulo, imagen, descripcion, descripcion_corta, precio, moneda, activa) VALUES ("TEMPORAL 1", "/FRONT/application/public/images/ofertaPrueba.jpg", "Descripcion de la oferta temporal del producto de venta 1", "Desc T 1", "123.4", "PESOS", true);
INSERT INTO OFERTAS (titulo, imagen, descripcion, descripcion_corta, precio, moneda, activa) VALUES ("TEMPORAL 2", "/FRONT/application/public/images/ofertaPrueba.jpg", "Descripcion de la oferta temporal del producto de venta 2", "Desc T 2", "134.4", "PESOS", true);
INSERT INTO OFERTAS (titulo, imagen, descripcion, descripcion_corta, precio, moneda, activa) VALUES ("TEMPORAL 3", "/FRONT/application/public/images/ofertaPrueba.jpg", "Descripcion de la oferta temporal del producto de venta 3", "Desc T 3", "145.4", "PESOS", true);
INSERT INTO OFERTAS (titulo, imagen, descripcion, descripcion_corta, precio, moneda, activa) VALUES ("TEMPORAL 4", "/FRONT/application/public/images/ofertaPrueba.jpg", "Descripcion de la oferta temporal del producto de venta 4", "Desc T 4", "156.4", "PESOS", true);
INSERT INTO OFERTAS (titulo, imagen, descripcion, descripcion_corta, precio, moneda, activa) VALUES ("TEMPORAL 5", "/FRONT/application/public/images/ofertaPrueba.jpg", "Descripcion de la oferta temporal del producto de venta 5", "Desc T 5", "167.4", "PESOS", true);

/*Inserto las ofertas por stock*/
INSERT INTO OFERTAS (titulo, imagen, descripcion, descripcion_corta, precio, moneda, activa) VALUES ("STOCK 1", "/FRONT/application/public/images/ofertaPrueba.jpg", "Descripcion de la oferta por stock del producto de venta 1", "Desc S 1", "123.4", "DOLARES", true);
INSERT INTO OFERTAS (titulo, imagen, descripcion, descripcion_corta, precio, moneda, activa) VALUES ("STOCK 2", "/FRONT/application/public/images/ofertaPrueba.jpg", "Descripcion de la oferta por stock del producto de venta 2", "Desc S 2", "133.4", "DOLARES", true);
INSERT INTO OFERTAS (titulo, imagen, descripcion, descripcion_corta, precio, moneda, activa) VALUES ("STOCK 3", "/FRONT/application/public/images/ofertaPrueba.jpg", "Descripcion de la oferta por stock del producto de venta 3", "Desc S 3", "143.4", "DOLARES", false);
INSERT INTO OFERTAS (titulo, imagen, descripcion, descripcion_corta, precio, moneda, activa) VALUES ("STOCK 4", "/FRONT/application/public/images/ofertaPrueba.jpg", "Descripcion de la oferta por stock del producto de venta 4", "Desc S 4", "153.4", "DOLARES", true);
INSERT INTO OFERTAS (titulo, imagen, descripcion, descripcion_corta, precio, moneda, activa) VALUES ("STOCK 5", "/FRONT/application/public/images/ofertaPrueba.jpg", "Descripcion de la oferta por stock del producto de venta 5", "Desc S 5", "163.4", "DOLARES", false);

/*Inserto las relaciones entre ofertas y ofertas temporales*/
/*Estas fechas se deben modificar para hacer pruebas segun la fecha actual*/
INSERT INTO OFERTAS_TEMPORALES (id, fecha_inicio, fecha_fin) VALUES (1, "2015-06-27 00:00:00", "2015-06-28 00:00:00");
INSERT INTO OFERTAS_TEMPORALES (id, fecha_inicio, fecha_fin) VALUES (2, "2015-06-27 00:00:00", "2015-07-10 00:00:00");
INSERT INTO OFERTAS_TEMPORALES (id, fecha_inicio, fecha_fin) VALUES (3, "2015-06-28 00:00:00", "2015-06-28 12:00:00");
INSERT INTO OFERTAS_TEMPORALES (id, fecha_inicio, fecha_fin) VALUES (4, "2015-06-29 00:00:00", "2015-07-10 00:00:00");
INSERT INTO OFERTAS_TEMPORALES (id, fecha_inicio, fecha_fin) VALUES (5, "2015-06-29 00:00:00", "2015-07-10 00:00:00");

/*Inserto las relaciones entre ofertas y ofertas por stock*/
INSERT INTO OFERTAS_STOCK (id, stock) VALUES (6, 10);
INSERT INTO OFERTAS_STOCK (id, stock) VALUES (7, 20);
INSERT INTO OFERTAS_STOCK (id, stock) VALUES (8, 30);
INSERT INTO OFERTAS_STOCK (id, stock) VALUES (9, 40);
INSERT INTO OFERTAS_STOCK (id, stock) VALUES (10, 50);

/*Inserto las relaciones entre ofertas y las categorias, las ofertas solo pueden tener una categoria*/
INSERT INTO CATEGORIAS_OFERTAS (id_categoria, id_oferta) VALUES (1, 1);
INSERT INTO CATEGORIAS_OFERTAS (id_categoria, id_oferta) VALUES (2, 2);
INSERT INTO CATEGORIAS_OFERTAS (id_categoria, id_oferta) VALUES (2, 3);
INSERT INTO CATEGORIAS_OFERTAS (id_categoria, id_oferta) VALUES (3, 4);
INSERT INTO CATEGORIAS_OFERTAS (id_categoria, id_oferta) VALUES (3, 5);
INSERT INTO CATEGORIAS_OFERTAS (id_categoria, id_oferta) VALUES (6, 6);
INSERT INTO CATEGORIAS_OFERTAS (id_categoria, id_oferta) VALUES (5, 7);
INSERT INTO CATEGORIAS_OFERTAS (id_categoria, id_oferta) VALUES (8, 8);
INSERT INTO CATEGORIAS_OFERTAS (id_categoria, id_oferta) VALUES (6, 9);
INSERT INTO CATEGORIAS_OFERTAS (id_categoria, id_oferta) VALUES (6, 10);

/* ADMINISTRADORES */
INSERT INTO ADMINISTRADORES (apellido, email, nick, nombre, pass)
VALUES ("Potter", "pelupotter@gmail.com", "pelupotter", "Pelu", MD5("nachoreol"));

/* USUARIOS */
INSERT INTO USUARIOS (nick, nombre, apellido, email, fechaNac, 
						timeZone, celular, password, edad) 
VALUES ("pelupotter","Nacho", "Tejeira", "n.tejeira69@gmail.com", "1986-12-28 00:00:00", "URU", "099953574",
		MD5("potter"), "28");

INSERT INTO USUARIOS (nick, nombre, apellido, email, fechaNac, 
						timeZone, celular, password, edad) 
VALUES ("pepe","Fabian", "Oabierto", "pelu@gmail.com", "1988-02-12 00:00:00", "URU", "099214578",
		MD5("pepe"), "23");

INSERT INTO USUARIOS (nick, nombre, apellido, email, fechaNac, 
						timeZone, celular, password, edad) 
VALUES ("popi","Sela", "Lastra", "selalastra@gmail.com", "1990-04-2 00:00:00", "URU", "09741586",
		MD5("popi"), "32");

INSERT INTO USUARIOS (nick, nombre, apellido, email, fechaNac, 
						timeZone, celular, password, edad) 
VALUES ("sabelo","Alpha", "Chino", "alpachino@gmail.com", "1986-05-03 00:00:00", "URU", "099365685",
		MD5("popi"), "45");

INSERT INTO USUARIOS (nick, nombre, apellido, email, fechaNac, 
						timeZone, celular, password, edad) 
VALUES ("resorry","Redis", "Culp Ame", "redisculpame@gmail.com", "1975-10-28 00:00:00", "URU", "097744774",
		MD5("popi"), "55");


/* COMPRAS */
/* USUARIO  1 */
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (3,1,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (1,1,"jjsdljsdjlsjdlj");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (2,1,"sscscscscscscsc");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (7,1,"ewewewewewewewe");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (10,1,"ttytytytytytyt");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (8,1,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (8,1,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (8,1,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (3,1,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (1,1,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (3,1,"ahlasdlasldhals");


/* USUARIO  2 */
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (3,2,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (1,2,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (2,2,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (8,2,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (10,2,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (8,2,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (7,2,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (7,2,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (7,2,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (10,2,"ahlasdlasldhals");
INSERT INTO `COMPRAS`(`id_oferta`, `id_usuario`, `ticket`) VALUES (10,2,"ahlasdlasldhals");
DELIMITER $$
--
-- Procedimientos
--
CREATE PROCEDURE `deleteEmployee`(IN id int(10))
BEGIN
	DELETE FROM employee WHERE id=id;
END$$

CREATE PROCEDURE `deleteProduct`(IN id int(10))
BEGIN
	DELETE FROM product WHERE id=id;
END$$

CREATE  PROCEDURE `insertBrand`(IN name varchar(50))
BEGIN
	INSERT INTO brand VALUES(NULL,name);
END$$

CREATE PROCEDURE `insertCategory`(IN description varchar(50))
BEGIN
	INSERT INTO category VALUES(NULL,description);
END$$

CREATE PROCEDURE `insertColor`(IN name varchar(50))
BEGIN
	INSERT INTO color VALUES(NULL,name);
END$$

CREATE PROCEDURE `insertEmployee`(IN name varchar(50),IN lastname varchar(50),IN email varchar(80),IN username varchar(20),IN password varchar(20),IN dni int(8))
BEGIN
	INSERT INTO employee VALUES(NULL,name,lastname,email,username,password,dni);
END$$

CREATE PROCEDURE `insertProduct`(IN rack varchar(50),IN box_prod varchar(50),IN location_box varchar(50))
BEGIN
	INSERT INTO product VALUES(NULL,rack,box_prod,location_box);
END$$

CREATE PROCEDURE `insertcode`(IN code_cod varchar(50),IN description_cod varchar(200),IN stock varchar(9999))
BEGIN
	INSERT INTO code VALUES(NULL,code_cod,description_cod,stock);
END$$


CREATE PROCEDURE `insertRack`(IN name varchar(50))
BEGIN
	INSERT INTO rack VALUES(NULL,name);
END$$

CREATE PROCEDURE `insertRole`(IN description varchar(50))
BEGIN
	INSERT INTO role VALUES(NULL,description);
END$$

CREATE PROCEDURE `insertSize`(IN name varchar(3))
BEGIN
	INSERT INTO size VALUES(NULL,name);
END$$

CREATE PROCEDURE `insertTransaction`(IN typetransaction varchar(20),IN idFkEmployee int(10),IN idFkProduct int(10), IN amountOfUnits int(10))
BEGIN
	INSERT INTO transaction VALUES(NULL,typetransaction,(select NOW()),amountOfUnits,idFkEmployee,idFkProduct);
	UPDATE product SET stock=IF(STRCMP('INGRESO',typetransaction),stock+amountOfUnits,stock-amountOfUnits)
	WHERE id=idFkProduct;
END$$

CREATE PROCEDURE `updateBrand`(IN id int(10),IN name varchar(50))
BEGIN
	UPDATE `brand` SET `name`=name
	WHERE `id`=id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brand`
--

CREATE TABLE `brand` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'ADIDAS'),
(2, 'NIKE'),
(3, 'REEBOK'),
(4, 'GUESS'),
(5, 'PUMA'),
(6, 'RALPH LAUREN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `description`) VALUES
(1, 'Polo'),
(2, 'Pantalón'),
(3, 'Zapatillas'),
(4, 'Sandalias'),
(5, 'Zapatos'),
(6, 'Camiseta'),
(7, 'Casadora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'PERSONALIZADO'),
(2, 'BLANCO'),
(3, 'MARRÓN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE `employee` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



-- -------------------------------------------------------
--
-- Volcado de datos para la tabla `employee`
--

INSERT INTO `employee` (`id`, `name`, `lastname`, `email`, `username`, `password`) VALUES
(1, 'ELDER', 'ALMORIN TORREJON', 'ealmorin@gmail.com', 'EALMORIN', 'intelcore2duo'),
(2, 'SEGUNDO ÓSCAR', 'ÁLVAREZ ROMERO', 'salvarez@gmail.com', 'SALVAREZ', 'intelcore2duo'),
(3, 'ERROL', 'APONTE GUERRERO', 'eaponte@gmail.com', 'EAPONTE', 'intelcore2duo'),
(4, 'SANTOS', 'CCORAHUA AYTE', 'sccorahua@gmail.com', 'SCCORAHUA', 'intelcore2duo'),
(5, 'JOSÉ CARLOS', 'ECHE LLENQUE', 'jeche@gmail.com', 'JECHE', 'intelcore2duo'),
(6, 'SANTIAGO', 'ELIZALDE DIOSES', 'selizalde@gmail.com', 'SELIZALDE', 'intelcore2duo'  ),
(7, 'JOSÉ MARIA', 'SONO CABRERA', 'jsono@gmail.com', 'JSONO', 'intelcore2duo');

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `code` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `code_cod` varchar(50) NOT NULL,
    `description_cod` varchar(400) NOT NULL,
    `stock` varchar(9999) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE key code_cod (`code_cod`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `proveedor` varchar(200) NOT NULL,
  `box_prod` varchar(9999) NOT NULL,
  `location_box` varchar(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  `date_create` date,
  `code_cod` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`code_cod`) 
      REFERENCES code(`code_cod`)
      ON DELETE CASCADE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `role`
--
INSERT INTO `role` (`id`, `description`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'USUARIO');

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `size`
--

CREATE TABLE `size` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(1, 'S'),
(2, 'M'),
(3, '44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `typetransaction` varchar(20) NOT NULL,
  `datetransaction` date NOT NULL,
  `amountOfUnits` int(10) NOT NULL,
  `idFkEmployee` int(10) NOT NULL,
  `idFkProduct` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_ibfk_1` (`idFkEmployee`),
  KEY `transaction_ibfk_2` (`idFkProduct`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

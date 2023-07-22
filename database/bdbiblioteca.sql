-- BD
	CREATE DATABASE library;
	USE library;
	
-- BOOKS:
	-- TB N°1 categories
		CREATE TABLE categories(
			idcategorie 	 INT AUTO_INCREMENT PRIMARY KEY,
			categoryname	 VARCHAR(50) NOT NULL,
			registrationdate DATETIME NOT NULL DEFAULT NOW(),
			state CHAR(1) NOT NULL DEFAULT '1'
		)ENGINE=INNODB;
		
	-- REGISTRATION OF CATEGORIES:
		INSERT INTO categories (categoryname) VALUES
				('Biibliografia, Ciencias Puras'),	
				('Bibliografia, Filología Linguística'),
				('Biibliografia, literatura Latina')
					
	-- TB N°2 subcategories
		CREATE TABLE subcategories(
			idsubcategorie 	 INT AUTO_INCREMENT PRIMARY KEY,
			idcategorie	 INT NOT NULL,
			subcategoryname	 VARCHAR(100) NOT NULL,
			registrationdate DATETIME NOT NULL DEFAULT NOW(),
			state CHAR(1) NOT NULL DEFAULT '1'
			CONSTRAINT fk_idcategorie_subcategories FOREIGN KEY (idcategorie) REFERENCES categories (idcategorie)
		)ENGINE=INNODB;

	-- REGISTRATION OF SUBCATEGORIES:
		INSERT INTO subcategories (idcategorie, subcategoryname) VALUES
				(1,'Módulo Base Biblioteca para secundaria - Ciencias Puras'),
				(1,'Matemática/Secundaria'),
				(2,'Módulo Base Biblioteca para secundaria - Filología Linguistica'),
				(2,'Textos Ingles/Secundaria'),
				(2,'Enciclopedias Tematicas'),
				(3,'Módulo Base Biblioteca para secundaria - Literatura Latina'),
				(3,'Obras Literarias'),
				(3,'Lenguaje y Literatura')


	-- TB N°3 BOOKS
		CREATE  TABLE books(
			idbook			INT AUTO_INCREMENT PRIMARY KEY,
			idcategorie		INT NOT NULL,
			idsubcategorie		INT NOT NULL,
			codes			VARCHAR(30) NOT NULL,
			amount			VARCHAR(30) NOT NULL,
			descriptions		VARCHAR(150) NOT NULL,
			author			VARCHAR(150) NOT NULL,
			state			VARCHAR(30) NOT NULL,
			locationresponsible	VARCHAR(50) NOT NULL,
			url			VARCHAR(250) NULL,
			frontpage		VARCHAR(50) NULL,
			registrationdate 	DATETIME NOT NULL DEFAULT NOW(),
			state2 			CHAR(1) NOT NULL DEFAULT '1',
			summary			VARCHAR (1500) NULL,
			CONSTRAINT fk_idcategorie_categories FOREIGN KEY (idcategorie) REFERENCES categories (idcategorie),
			CONSTRAINT fk_idsubcategorie_subcategories FOREIGN KEY (idsubcategorie) REFERENCES subcategories (idsubcategorie)
			
		)ENGINE= INNODB;


	-- TB N°4 BOOKS chinchanos
		CREATE  TABLE BooksChinchanos(
			idbookchinchano		INT AUTO_INCREMENT PRIMARY KEY,
			descriptions		VARCHAR(150) NOT NULL,
			author			VARCHAR(150) NOT NULL,
			url			VARCHAR(250) NULL,
			frontpage		VARCHAR(50) NULL,
			registrationdate 	DATETIME NOT NULL DEFAULT NOW(),
			state 			CHAR(1) DEFAULT '1' 	
		)ENGINE= INNODB;
			

	-- PROCEDIMIENTOS ALMACENADOS
	-- VISTA ADMIN:
		-- N°1 list books admin view:
			DELIMITER $$
			CREATE PROCEDURE spu_books_list()
			BEGIN
				SELECT  b.idbook, b.idcategorie, ca.categoryname, c.subcategoryname, b.codes, b.amount, b.descriptions,
					b.author, b.state, b.locationresponsible, b.url, b.frontpage
					FROM books b
				INNER JOIN subcategories c ON c.idsubcategorie = b.idsubcategorie
				INNER JOIN categories ca ON ca.idcategorie = b.idcategorie
				WHERE b.state2 = "1";
			END $$

			CALL spu_books_list();
			
			SELECT * FROM loans;
			

		-- N°2 Register of books
			DELIMITER $$
				CREATE PROCEDURE spu_books_register
				(
					IN _idcategorie		INT,
					IN _idsubcategorie	INT,
					IN _amount 		VARCHAR(30),
					IN _descriptions 	VARCHAR(150),
					IN _author		VARCHAR(150),
					IN _state 		VARCHAR(30),
					IN _locationresponsible VARCHAR(50),
					IN _url			VARCHAR(150),
					IN _frontpage		VARCHAR(150)
				)
				
				BEGIN
					DECLARE maximo VARCHAR (30);	
					DECLARE num INT;
					DECLARE cod VARCHAR (30);	
					SET maximo = (SELECT MAX(codes) FROM books);
					SET num = (SELECT LTRIM(RIGHT(maximo,3)));
					
					IF num>=1 AND num<=8 THEN
					 SET num=num+1;
					 SET cod = (SELECT CONCAT('C00', CAST(num AS CHAR)));
					ELSEIF num>=9 AND num<=98 THEN
					 SET num=num+1;
					 SET cod = (SELECT CONCAT('C0', CAST(num AS CHAR)));
					ELSEIF num>=99 AND num<=998 THEN
					 SET num=num+1;
					 SET cod = (SELECT CONCAT('C', CAST(num AS CHAR)));
					ELSE 
					 SET cod = (SELECT 'C001');
					END IF;
					
					IF _url = '' THEN SET _url = NULL; END IF;
					IF _frontpage = '' THEN SET _frontpage = NULL; END IF;

					INSERT INTO books(idcategorie,idsubcategorie,codes,amount,descriptions,author,state,locationresponsible,url,frontpage)VALUES(_idcategorie,_idsubcategorie,cod,_amount,_descriptions,_author,_state,_locationresponsible,_url,_frontpage);
			END $$
			
			CALL spu_books_register('1','1','1','1','1','1','1','1','1');
			
		-- N°3 Delete book	
			DELIMITER $$
			CREATE PROCEDURE spu_books_delete(IN _idbook INT)
			BEGIN
				UPDATE books SET state2 = '0' WHERE idbook = _idbook;
			END $$
			
		-- N°4 obtain book
			DELIMITER $$
			CREATE PROCEDURE spu_books_obtain(
			IN _idbook INT
			)
			BEGIN
			SELECT  idbook,idcategorie,idsubcategorie,amount, descriptions,
					author, state, locationresponsible
					FROM books 
				WHERE state2 = "1" AND idbook = _idbook;
			END $$
			
			CALL spu_books_obtain(2);
		
		-- N°5 Edit book record
			DELIMITER $$
			CREATE PROCEDURE spu_books_update
			(
				IN _idbook		INT,
				IN _idcategorie		INT,
				IN _idsubcategorie	INT,
				IN _amount		VARCHAR(30),
				IN _descriptions	VARCHAR(150),
				IN _author		VARCHAR (150),
				IN _state		VARCHAR(30),
				IN _locationresponsible VARCHAR(50)
			)
			BEGIN

				UPDATE books SET
					idcategorie 		= _idcategorie,
					idsubcategorie 		= _idsubcategorie,
					amount 			= _amount,
					descriptions 		= _descriptions,
					author 			= _author,
					state 			= _state,
					locationresponsible 	= _locationresponsible
				WHERE idbook = _idbook;
			END $$
			
			CALL('1','1','1','02','Probabilidad y estadística como trabajar con niños y jóvenes','Ana P, de Bressan/Oscar Bogisic','B0','Biblioteca escolar');
				
			SELECT* FROM books;
			
		-- N°6 List categories
			DELIMITER $$
			CREATE PROCEDURE spu_categories_list()
			BEGIN
				SELECT idcategorie, categoryname,registrationdate
					FROM categories
				WHERE state = "1";
			END $$
			
			CALL spu_categories_list();
		
			
		-- N°7 List subcategories
			-- Editar
			DELIMITER $$
			CREATE PROCEDURE spu_subcategories2_list(
			)
			BEGIN
				SELECT idsubcategorie, subcategoryname
					FROM subcategories;
			END $$
			
			CALL spu_subcategories2_list();
			
			-- Registrar
			DELIMITER $$
			CREATE PROCEDURE spu_subcategories_list( IN _idcategorie INT
			)
			BEGIN
				SELECT idsubcategorie, subcategoryname
					FROM subcategories
					WHERE _idcategorie = idcategorie AND state = '1';
			END $$
			
			CALL spu_subcategories_list(1);

			
			-- Mostrar 
			DELIMITER $$
			CREATE PROCEDURE spu_subcategories3_list(
			)
			BEGIN
				SELECT sub.idsubcategorie, cat.categoryname,sub.subcategoryname,sub.registrationdate
					FROM subcategories sub
					INNER JOIN categories cat ON cat.idcategorie = sub.idcategorie
				WHERE sub.state = '1';
					
			END $$
			
			CALL spu_subcategories3_list();
			
			-- Reporte
			DELIMITER $$
			CREATE PROCEDURE  spu_report_subcategoria(
				IN _idcategorie VARCHAR(255)
			)
			BEGIN
				SELECT sub.idsubcategorie, cat.categoryname,sub.subcategoryname,sub.registrationdate
					FROM subcategories sub
					INNER JOIN categories cat ON cat.idcategorie = sub.idcategorie
					WHERE FIND_IN_SET (cat.idcategorie,_idcategorie) > 0
				ORDER BY sub.idsubcategorie ASC;
			END $$

			CALL spu_report_subcategoria('1,2,3,4');
			
			-- Eliminar Subcategorie	
			DELIMITER $$
			CREATE PROCEDURE spu_subcategorie_delete(IN _idsubcategorie INT)
			BEGIN
				UPDATE subcategories SET state = '0' WHERE idsubcategorie = _idsubcategorie;
			END $$
		-- N°8 list booksChinchanos admin view:
			DELIMITER $$
			CREATE PROCEDURE spu_bookChinchanos_list()
			BEGIN
				SELECT  idbookChinchano, descriptions, author, state, url, frontpage
					FROM BooksChinchanos
				WHERE state = "1";
			END $$

			CALL spu_bookChinchanos_list();
			
		-- N°9 obtain pdf/frontpage
			DELIMITER $$
			CREATE PROCEDURE spu_binarios_obtain(
			IN _idbook INT
			)
			BEGIN
			SELECT  idbook,frontpage,url
					FROM books 
				WHERE state2 = "1" AND idbook = _idbook;
			END $$
			
			CALL spu_binarios_obtain(2);
			
		-- N°10 update frontpage
			DELIMITER $$
			CREATE PROCEDURE spu_update_frontpage(
			    IN _idbook INT,
			    IN _frontpage VARCHAR(150)
			)
			BEGIN
			    UPDATE books
			    SET frontpage = _frontpage
			    WHERE idbook = _idbook;
			END $$

			CALL spu_update_frontpage(354, NULL);
		-- N°11 update pdf
			DELIMITER $$
			CREATE PROCEDURE spu_update_pdf(
			    IN _idbook INT,
			    IN _url VARCHAR(250)
			)
			BEGIN
			    UPDATE books
			    SET url = _url
			    WHERE idbook = _idbook;
			END $$

			CALL spu_update_pdf(354, NULL);
			
		-- N°12 Register categorie
			DELIMITER $$
				CREATE PROCEDURE spu_register_categorie(
					IN _categoryname VARCHAR(50)
				)
				BEGIN
					INSERT INTO categories(categoryname)
					VALUES(_categoryname);
			END$$
			
			CALL spu_register_categorie('pruebadb');
			
			-- N°12.1 Obtain categorie
			
				DELIMITER $$
					CREATE PROCEDURE spu_obtain_categorie(
						IN _idcategorie INT
					)
					BEGIN
						SELECT idcategorie, categoryname 
							FROM categories
						WHERE idcategorie = _idcategorie;
				END $$
			
				CALL spu_obtain_categorie(1);
			
			-- N°12.2 Edit categorie
				DELIMITER $$
					CREATE PROCEDURE spu_edit_categorie(
						IN _idcategorie INT,
						IN _categoryname VARCHAR(50)
					)
					BEGIN
						UPDATE categories SET
							idcategorie 	= _idcategorie,
							categoryname	= _categoryname
						WHERE idcategorie = _idcategorie; 	
				END $$
				
			-- N°12.3 Eliminar Categorie	
				DELIMITER $$
				CREATE PROCEDURE spu_categorie_delete(IN _idcategorie INT)
				BEGIN
					UPDATE categories SET state = '0' WHERE idcategorie = _idcategorie;
				END $$
		
		-- N°13 Register subcategories
			DELIMITER $$
				CREATE PROCEDURE spu_register_subcategorie(
					IN _idcategorie		INT,
					IN _subcategoryname 	VARCHAR(50)
				)
				BEGIN
					INSERT INTO subcategories(idcategorie, subcategoryname)
					VALUES(_idcategorie,_subcategoryname);
			END$$
			
			-- N°13.1 Obtain subcategorie
			
				DELIMITER $$
					CREATE PROCEDURE spu_obtain_subcategorie(
						IN _idsubcategorie INT
					)
					BEGIN
						SELECT idcategorie,idsubcategorie, subcategoryname 
							FROM subcategories
						WHERE idsubcategorie = _idsubcategorie;
				END $$
			
				CALL spu_obtain_subcategorie(1);
			
			-- N°13.2 Edit subcategorie
				DELIMITER $$
					CREATE PROCEDURE spu_edit_subcategorie(
						IN _idcategorie INT,
						IN _idsubcategorie INT,
						IN _subcategoryname VARCHAR(50)
					)
					BEGIN
						UPDATE subcategories SET
							idcategorie 	= _idcategorie,
							idsubcategorie 	= _idsubcategorie,
							subcategoryname	= _subcategoryname
						WHERE idsubcategorie = _idsubcategorie; 	
				END $$	
				
		-- N°14 Counter dashboard/books,categorie, sub categorie
			DELIMITER $$
			CREATE PROCEDURE spu_list_dashboard_books()
				SELECT 	COUNT(idbook) AS total_libros , 
					(SELECT COUNT(idcategorie) FROM categories) AS total_categorias, 
					(SELECT COUNT(idcategorie) FROM subcategories) AS total_subcategorias 
				FROM books
			END $$
			
			CALL spu_list_dashboard_books();
			
			-- N°14.1 Counter dashboard/users, docentes
				DELIMITER $$
				CREATE PROCEDURE spu_list_dashboard_users()

					SELECT  COUNT(idusers) AS total_usuarios,
						(SELECT COUNT(*) FROM users WHERE accesslevel LIKE 'D') AS total_docentes 
					FROM users
				END $$

				CALL spu_list_dashboard_users();
		-- N°15 Reporte libro
			DELIMITER $$
			CREATE PROCEDURE spu_reporte_libro(
			    IN _idcategorie INT,
			    IN _idsubcategorie INT    
			)
			BEGIN
			  IF _idsubcategorie IS NULL || _idsubcategorie = '' THEN
				SELECT  b.idbook, ca.categoryname, c.subcategoryname, b.codes, b.amount, b.descriptions,
					b.author, b.state, b.locationresponsible
					FROM books b
				INNER JOIN subcategories c ON c.idsubcategorie = b.idsubcategorie
				INNER JOIN categories ca ON ca.idcategorie = b.idcategorie
				WHERE b.state2 = "1" AND b.idcategorie = _idcategorie;
			ELSE
			
				SELECT  b.idbook, ca.categoryname, c.subcategoryname, b.codes, b.amount, b.descriptions,
					b.author, b.state, b.locationresponsible
					FROM books b
				INNER JOIN subcategories c ON c.idsubcategorie = b.idsubcategorie
				INNER JOIN categories ca ON ca.idcategorie = b.idcategorie
				WHERE b.state2 = "1" AND b.idcategorie = _idcategorie AND b.idsubcategorie = _idsubcategorie;
				 
			END IF;
			END $$
			
			DROP PROCEDURE spu_reporte_libro
			SELECT * FROM books;
			CALL spu_reporte_libro(1,1);
			
		-- N° 16 Obtener la stock disponible
			DELIMITER $$
				DROP PROCEDURE spu_stocklibro_libro(IN _idbook INT)
				BEGIN
					SELECT * FROM books
					WHERE _idbook = idbook;
			END $$
			
			CALL spu_stocklibro_libro(2);
		

	-- VISTA PRINCIPAL:
		-- N°1 list book

			DELIMITER $$
			CREATE PROCEDURE spu_booksmainview_list(
			)
			BEGIN
				SELECT  bs.idbook,bs.descriptions,bs.author,bs.frontpage, ROUND(SUM(cm.score) / COUNT(cm.idcommentary))  AS total
					FROM books bs
				LEFT JOIN commentaries cm ON cm.idbook = bs.idbook
				WHERE bs.state2 = 1 AND bs.idbook <= 6
				GROUP BY bs.idbook;
			END $$

			CALL spu_booksmainview_list();
		
		-- N°2 view summary		
			DELIMITER $$
				CREATE PROCEDURE spu_booksummaries_list(IN _idbook INT)
				BEGIN
					SELECT  bs.idbook,bs.summary, bs.author, bs.frontpage,bs.descriptions, bs.url, bs.amount,
						ROUND(SUM(cm.score) / COUNT(cm.idcommentary))  AS total
						FROM books bs
					LEFT JOIN commentaries cm ON cm.idbook = bs.idbook 
					WHERE bs.idbook = _idbook
					GROUP BY bs.idbook;		
			END $$
			CALL spu_booksummaries_list(2);
			SELECT * FROM users;
		
		-- N°3 List books subcategory
			DELIMITER $$
			CREATE PROCEDURE spu_bookssubcategory_list(
				IN _idsubcategorie INT
			)
			BEGIN
				SELECT  b.idbook,b.descriptions, b.author,b.frontpage,ROUND(SUM(cm.score) / COUNT(cm.idcommentary))  AS total
					FROM books b
				INNER JOIN subcategories c ON c.idsubcategorie = b.idsubcategorie
				LEFT JOIN commentaries cm ON cm.idbook = b.idbook
				WHERE _idsubcategorie = b.idsubcategorie
				GROUP BY b.idbook;
			END $$

			CALL spu_bookssubcategory_list(1);
			
		
			
		-- N°4 List categories
			DELIMITER $$
			CREATE PROCEDURE spu_mainviewcategories_list()
			BEGIN
				SELECT s.idcategorie, b.idsubcategorie, s.categoryname, b.subcategoryname
					FROM subcategories b
				INNER JOIN categories s ON s.idcategorie = b.idcategorie;
				
			END $$
			
			CALL spu_mainviewcategories_list();
		
			
		-- N°5 seeker
			DELIMITER $$
			CREATE PROCEDURE spu_books_lookfor(
				IN _type CHAR(1),
				IN _look VARCHAR(150)
			)
			BEGIN
				IF _type = "n" THEN
					SELECT b.idbook,b.frontpage, b.descriptions, b.author, ROUND(SUM(cm.score) / COUNT(cm.idcommentary))  AS total
					FROM books b
					LEFT JOIN commentaries cm ON cm.idbook = b.idbook
					WHERE descriptions LIKE CONCAT('%',_look,'%')
					GROUP BY b.idbook;
				END IF;
				
				IF _type = "a" THEN 
					SELECT b.idbook,b.frontpage,b.descriptions, b.author, ROUND(SUM(cm.score) / COUNT(cm.idcommentary))  AS total
					FROM books b
					LEFT JOIN commentaries cm ON cm.idbook = b.idbook
					WHERE author LIKE CONCAT('%',_look,'%')
					GROUP BY b.idbook;
				END IF;
			END $$

			CALL spu_books_lookfor("a","edi");

-- USERS:
	-- Tb users:
		CREATE TABLE users
		(
			idusers			INT AUTO_INCREMENT PRIMARY KEY,
			username 		VARCHAR(50)	NOT NULL
			surnames		VARCHAR(30) 	NOT NULL,
			namess			VARCHAR(30) 	NOT NULL,
			email			VARCHAR(100) 	NOT NULL,
			accesskey		VARCHAR(100) 	NOT NULL,
			accesslevel		CHAR(1) 	NOT NULL,
			creationdate		DATETIME 	NOT NULL DEFAULT NOW(),
			dischargedate		DATETIME 	NULL,
			state			CHAR(1) 	NOT NULL DEFAULT '1',
			
			CONSTRAINT uk_email_usu UNIQUE (email),
			CONSTRAINT uk_user_names UNIQUE (user_name) 
		)ENGINE = INNODB;
			
			
	-- PROCEDIMIENTO ALMACENADO:
	-- VISTA ADMIN:
		-- N°1 Register Users:
			DELIMITER $$
			CREATE PROCEDURE spu_users_register
			(
				IN _username		VARCHAR(50),
				IN _surnames		VARCHAR(30),
				IN _namess		VARCHAR(30),
				IN _email		VARCHAR(100),
				IN _accesskey		VARCHAR(100),	
				IN _accesslevel		VARCHAR(100)
				
			)
			BEGIN
				INSERT INTO users (username,surnames, namess, email, accesskey, accesslevel) VALUES
				(_username, _surnames, _namess, _email, _accesskey, _accesslevel);
			END $$
			
			
		-- N°2 Login:
			DELIMITER $$ 
			CREATE PROCEDURE spu_users_login(IN _email VARCHAR(100))
			BEGIN
				SELECT idusers, surnames, namess, email, accesskey, accesslevel
					FROM users
					WHERE email = _email AND state = '1';
			END $$
			
			CALL spu_users_login('geral@midominio.com');
			
			SELECT * FROM users
			
			DELIMITER $$ 
			CREATE PROCEDURE spu_users_contraseña(IN _email VARCHAR(100))
			BEGIN
				SELECT idusers, surnames, namess, email, accesskey, accesslevel
					FROM users
					WHERE email = _email AND state = '1';
			END $$
			
			
		-- N°3 List Users
			DELIMITER $$
			CREATE PROCEDURE spu_users_list()
			BEGIN
				SELECT  idusers, username, surnames, namess, email, accesslevel
					FROM users
					WHERE state = "1";
			END $$
			
			CALL spu_users_list();
			
		-- N°4 Disable Users
			DELIMITER $$
			CREATE PROCEDURE spu_users_disable(IN _idusers INT)
			BEGIN
				UPDATE users SET state = '0' WHERE idusers = _idusers;
			END $$
			
			SELECT * FROM users;
			
		-- N°5 Edit users 
			DELIMITER $$
			CREATE PROCEDURE spu_users_update
			(
				IN _idusers	INT,
				IN _namess	VARCHAR(30),
				IN _surnames	VARCHAR(100),
				IN _username	VARCHAR(50),
				IN _email	VARCHAR(100),
				IN _accesslevel	VARCHAR(100)
			)
			BEGIN

				UPDATE users SET
					namess 		= _namess,
					surnames 	= _surnames,
					username	= _username,
					email 		= _email,
					accesslevel 	= _accesslevel
					
				WHERE idusers = _idusers;
			END $$
			
			-- N°5.1 Edit password 
				DELIMITER $$
				CREATE PROCEDURE spu_users_password
				(
					IN _idusers	INT,
					IN _accesskey	VARCHAR(100)
				)
				BEGIN

					UPDATE users SET
						accesskey = _accesskey	
					WHERE idusers = _idusers;
				END $$
			
		-- N°6 obtain users
			DELIMITER $$
				CREATE PROCEDURE spu_users_obtain(
					IN _idusers INT
				)
				BEGIN
				SELECT  idusers, namess, username,surnames, accesslevel,email,accesskey
						FROM users 
					WHERE state = "1" AND idusers = _idusers;
			END $$
			CALL spu_users_obtain(1);
			
		-- N°7 Validate email
			DELIMITER $$
				CREATE PROCEDURE spu_validate_email(
					IN _email VARCHAR(100)
				)BEGIN
					SELECT email 
						FROM users
					WHERE email = _email;
			END $$ 
		CALL spu_validate_email('geral@midominio.com');
		
		-- N° 8 Actualizar contraseña
			DELIMITER $$
				CREATE PROCEDURE spu_update_users(
					IN _idusers INT,
					IN _accesskey VARCHAR(100)
				)
				BEGIN
					UPDATE users SET
					accesskey 	= _accesskey
					WHERE idusers = _idusers;
			END $$
					
	-- Tabla de validacioncorreo
	CREATE TABLE validacioncorreo(
		idvalidacion			INT AUTO_INCREMENT PRIMARY KEY,
		fechageneracion			DATETIME 	NOT NULL DEFAULT NOW(),
		email				VARCHAR(120) 	NOT NULL,	-- Email que se utilizó en ese momento
		clavegenerada			CHAR(4)	 	NOT NULL,
		estado				CHAR(1)	 	NOT NULL DEFAULT '1'
	)ENGINE = INNODB;
		-- PROCEDIMIENTO ALMACENADO
			-- N°1 Creacion del codigo para verificar correo
			DELIMITER $$
			CREATE PROCEDURE spu_registra_clavevalidacioncorreo(
				IN _email VARCHAR(120) CHARSET utf8mb4,
				IN _clavegenerada CHAR(4)
			)
			BEGIN
				UPDATE validacioncorreo SET estado = '0' WHERE email = _email;
				INSERT INTO validacioncorreo (email, clavegenerada) VALUES (_email, _clavegenerada);
			END $$
			
			-- N°2 verificacion de tiempo codigo
			DELIMITER $$
			CREATE PROCEDURE spu_correo_validartiempo(IN _email VARCHAR(120))
			BEGIN
			IF ((SELECT COUNT(*) FROM validacioncorreo WHERE email = _email) =0) THEN
				SELECT 'GENERAR' AS 'status';
				ELSE
					-- Buscamos el último estado del usuario . si es 0, entonces debe GENERAR el código
					IF ((SELECT estado FROM validacioncorreo WHERE email = _email ORDER BY 1 DESC LIMIT 1)= 0)THEN
						SELECT 'GENERAR' AS 'status';
					ELSE
						-- En esta sección, el último registro es '1', NO sabemos si está dentro de los 15min permitidos
						IF
						(
								(
									SELECT COUNT(*) FROM validacioncorreo 
									WHERE email = _email AND estado = '1' AND
									NOW()NOT BETWEEN fechageneracion AND DATE_ADD(fechageneracion,INTERVAL 15 MINUTE)
									ORDER BY fechageneracion DESC LIMIT 1						
								) = 1
							)THEN
								-- El usuario tiene estado 1, pero esta fuera de los 15 minutos
								SELECT 'GENERAR' AS 'status';
							ELSE
								SELECT 'DENEGAR' AS 'status';
						END IF;
					END IF;
				END IF;
			END$$


			-- Procedimiento que valida la clave ingresada
			DELIMITER $$
			CREATE PROCEDURE spu_correo_validarclave
				(
					IN _email VARCHAR(150) CHARSET utf8mb4,
					IN _clavegenerada CHAR(4)
				)
			BEGIN
			IF (
			   (
			   SELECT clavegenerada
			   FROM validacioncorreo
			   WHERE email = _email AND estado = '1'
			   LIMIT 1
			   ) = _clavegenerada
			   )
			THEN
			   SELECT 'PERMITIDO' AS 'status';
			ELSE
			   SELECT 'DENEGADO' AS 'status';
			END IF;
			END $$

			DELIMITER $$
			CREATE PROCEDURE spu_correo_validacioncompleta
			(
				IN _email VARCHAR(120) CHARSET utf8mb4
			)
			BEGIN
				UPDATE validacioncorreo SET estado = '0' WHERE email = _email;
			END $$

			SELECT * FROM loans;
			
			
			CREATE TABLE hzgstudentcodes(
				idcodes 	 INT AUTO_INCREMENT PRIMARY KEY,
				codes	 	 CHAR(8) NOT NULL,
				registrationdate DATETIME NOT NULL DEFAULT NOW(),
				state 		 CHAR(1) NOT NULL DEFAULT '1'
			)ENGINE=INNODB;


			DELIMITER $$
			CREATE PROCEDURE spu_insertorupdatecode()
			BEGIN
			    DECLARE codeexists INT;
			    DECLARE newcode CHAR(8);
			    DECLARE lastregistration DATETIME;

			    SET newcode = CONCAT('HZG-', FLOOR(RAND() * 9000) + 1000);
			    
			    -- Obtenemos el último registro en la tabla hzgstudentcodes
			    SELECT MAX(registrationdate) INTO lastregistration FROM hzgstudentcodes;
			    
			    IF lastregistration >= NOW() - INTERVAL 12 HOUR THEN
				-- Si ha pasado menos de 2 minutos desde el último registro, devolvemos "DENEGADO" y no generamos un nuevo código.
				SELECT '' AS result;
			    ELSE
				-- Si ha pasado al menos 2 minutos, procedemos a generar el nuevo código y actualizar la tabla.
				SELECT COUNT(*) INTO codeexists FROM hzgstudentcodes WHERE codes = newcode;
				
				IF codeexists > 0 THEN
				    -- Si el código ya existe, actualiza su estado a 0
				    UPDATE hzgstudentcodes SET state = '0' WHERE codes = newcode;
				ELSE
				    -- Si el código no existe, inserta un nuevo registro
				    INSERT INTO hzgstudentcodes (codes) VALUES (newcode);
				    -- Actualiza el estado de los códigos anteriores a 0
				    UPDATE hzgstudentcodes SET state = '0' WHERE codes <> newcode;
				END IF;

				-- Devuelve los registros activos
				SELECT 'PERMITIDO' AS result;
			    END IF;
			END $$
			
			DELIMITER $$
			CREATE PROCEDURE spu_listcode()
			BEGIN
				SELECT * FROM hzgstudentcodes WHERE state = 1;
			END $$
			
			CALL spu_listcode()

			CALL spu_insertorupdatecode()

			TRUNCATE TABLE hzgstudentcodes

			SELECT * FROM hzgstudentcodes


			DELIMITER $$
			CREATE PROCEDURE spu_validatecode(IN _code CHAR(8))
			BEGIN
			    DECLARE codeexists INT;
			    
			    SELECT COUNT(*) INTO codeexists FROM hzgstudentcodes WHERE codes = _code AND state = 1;
			    
			    IF codeexists > 0 THEN
				SELECT 'PERMITIDO' AS result; -- El código existe
			    ELSE
				SELECT 'DENEGADO' AS result; -- El código no existe
			    END IF;
			END $$

			CALL spu_validatecode('HZG-2011');

		
		
-- BOOK LOANS:
	-- Tb. Loans
		CREATE TABLE loans
		(
			idloan			INT AUTO_INCREMENT PRIMARY KEY,
			idbook 			INT 		NOT NULL,
			idusers			INT 		NOT NULL,
			amount			VARCHAR(30)	NOT NULL,
			registration_date	DATETIME 	NOT NULL DEFAULT NOW(),  -- Fecha de registro del prestamo
			pickup_date		DATETIME	NOT NULL,		 -- Posible fecha de recojo del libro
			return_date		DATETIME 	NOT NULL,		 -- Posible fecha de retorno
			cancellation_date 	DATETIME	NULL,			 -- Fecha de cancelacion
			observation		VARCHAR(200)	NULL,			 -- Comentario del usuario	
			acotacion 		VARCHAR(200)    NULL,			 -- Comentario del administrador	
			state			CHAR(1) 	DEFAULT '0',
			CONSTRAINT fk_idbook_idbook FOREIGN KEY (idbook) REFERENCES books (idbook),
			CONSTRAINT fk_idusers_idusers FOREIGN KEY (idusers) REFERENCES users (idusers)
		)ENGINE = INNODB;
		
-- ***************************************************************************************************************	

-- NUEVO 12/07 Procedimiento para registrar prestamo y actualizar las tablas 
	DELIMITER $$
	CREATE PROCEDURE spu_registration_date
	(
	    IN _idbook INT,
	    IN _idusers INT,
	    IN _amount VARCHAR(30),
	    IN _pickup_date DATETIME,
	    IN _return_date DATETIME,
	    IN _cancellation_date DATETIME,
	    IN _observation VARCHAR(200)
	)
	BEGIN
	    DECLARE v_book_amount INT;
	    -- Verificar si el libro existe y tiene una cantidad disponible mayor a 0
	    SELECT amount INTO v_book_amount
	    FROM books
	    WHERE idbook = _idbook;
	    
	    IF v_book_amount IS NULL THEN
		SIGNAL SQLSTATE '45000'
		    SET MESSAGE_TEXT = 'El libro no existe.';
	    ELSEIF v_book_amount < CAST(_amount AS INT) THEN
		SIGNAL SQLSTATE '45000'
		    SET MESSAGE_TEXT = 'No hay suficientes copias disponibles del libro.';
	    ELSE
		-- Realizar el préstamo y actualizar las tablas
		START TRANSACTION;
		
		-- Restar la cantidad prestada al campo "amount" de la tabla "books"
		UPDATE books
		SET amount = amount - CAST(_amount AS INT)
		WHERE idbook = _idbook;
		
		-- Insertar el préstamo en la tabla "loans"
		INSERT INTO loans (idbook, idusers, amount, registration_date, pickup_date, return_date, cancellation_date, observation, acotacion, state)
		VALUES (_idbook, _idusers, CAST(_amount AS INT), NOW(), _pickup_date, _return_date, _cancellation_date, _observation, NULL, '1');
		
		COMMIT;
	    END IF;
	END $$
	
-- NUEVO 13/07 Procedimiento para hacer entrega del libro al usuario
DELIMITER $$
CREATE PROCEDURE spu_pickup_date
(
	IN p_idloan INT,
	IN p_pickup_date DATETIME
)
BEGIN
    UPDATE loans
    SET pickup_date = p_pickup_date,
        state = '2'
    WHERE idloan = p_idloan;
END $$ 

-- NUEVO 14/07 Procedimiento almacenado para Cancelar un prestamo
DELIMITER $$
CREATE PROCEDURE spu_cancellation_date
(
    IN loan_id INT
)
BEGIN
    -- Variables para almacenar los valores del préstamo
    DECLARE loan_amount VARCHAR(30);
    DECLARE book_id INT;

    -- Obtener el monto y el ID del libro del préstamo
    SELECT amount, idbook INTO loan_amount, book_id
    FROM loans
    WHERE idloan = loan_id;

    -- Actualizar la fecha de cancelación y el estado en el préstamo
    UPDATE loans
    SET cancellation_date = NOW(),
        state = 3
    WHERE idloan = loan_id;

    -- Sumar el monto del préstamo al campo amount de la tabla books
    UPDATE books
    SET amount = amount + loan_amount
    WHERE idbook = book_id;
END $$

-- NUEVO 14/07 Procedimiento almacenado para devolver un libro
DELIMITER $$
CREATE PROCEDURE spu_return_date
(
	IN p_idloan INT, 
	IN p_acotacion VARCHAR(200)
)
BEGIN
    -- Actualizar la fecha de retorno y el estado del préstamo
    UPDATE loans
    SET return_date = NOW(),
        state = '4',
        acotacion = p_acotacion
    WHERE idloan = p_idloan;

    -- Sumar el amount del préstamo al amount de la tabla books
    UPDATE books
    SET amount = amount + (SELECT amount FROM loans WHERE idloan = p_idloan)
    WHERE idbook = (SELECT idbook FROM loans WHERE idloan = p_idloan);
END $$


-- NUEVO 14/07 Procedimiento para filtrar por estados
DELIMITER $$
CREATE PROCEDURE spu_filtrar_prestamo
(
	IN p_state CHAR(1)
)
BEGIN
    IF p_state = '0' THEN
        SELECT *
        FROM loans;
    ELSE
        SELECT *
        FROM loans
        WHERE state = p_state;
    END IF;
END $$



		
		
		-- Procedimiento para verificar si ya se tiene un prestamo
		DELIMITER $$
		CREATE PROCEDURE spu_search_users_loans(IN _idusers INT)
		BEGIN
		  DECLARE record_count INT;
		  DECLARE user_accesslevel CHAR(1);

		  -- Obtener el accesslevel del usuario
		  SELECT accesslevel INTO user_accesslevel
		  FROM users
		  WHERE idusers = _idusers;

		  IF user_accesslevel IN ('D', 'A') THEN
		    SELECT COUNT(*) INTO record_count
		    FROM loans
		    WHERE idusers = _idusers AND state IN (1, 2);

		    IF record_count < 6 THEN
		      SELECT 'PERMITIDO' AS result;
		    ELSE
		      SELECT 'DENEGADO' AS result;
		    END IF;

		  ELSEIF user_accesslevel = 'E' THEN
		    SELECT COUNT(*) INTO record_count
		    FROM loans
		    WHERE idusers = _idusers AND state IN (1, 2);

		    IF record_count < 1 THEN
		      SELECT 'PERMITIDO' AS result;
		    ELSE
		      SELECT 'NEGADO' AS result;
		    END IF;

		  ELSE
		    SELECT 'RECHAZADO' AS result; -- Si el accesslevel no es ni 'D', 'A' ni 'E', se deniega el acceso
		  END IF;
		END $$
		DELIMITER ;

		
		CALL spu_search_users_loans(3)
		
		SELECT * FROM loans
		
	-- PROCEDIMIENTOS ALMACENADOS
	-- VISTA ADMIN:
		-- N°1 list loans
		DELIMITER $$
		CREATE PROCEDURE spu_listar_prestamo(
			IN _idusers INT,
			IN _accesslevel CHAR(1),
			IN _estado CHAR(1)
		)
		BEGIN
		IF _accesslevel = 'D' THEN 
			IF _estado = '' THEN
				SET _estado = '1'; -- Si _estado está vacío, establece el valor predeterminado a '1'
			END IF;
			    SELECT loans.idloan,
				   books.descriptions AS Titulo,
				   users.username AS Usuario,
				   loans.amount AS Cantidad,
				   loans.registration_date AS `F. Registro`,
				   loans.pickup_date AS `F. Recojo`,
				   loans.return_date AS `F. Retorno`,
				   loans.cancellation_date AS `F. Cancelacion`,
				   loans.observation AS Observacion,
				   loans.acotacion AS Perdida,
				   loans.state AS Estado
			    FROM loans
			    JOIN books ON loans.idbook = books.idbook
			    JOIN users ON loans.idusers = users.idusers
			    WHERE loans.idusers = _idusers AND loans.state = _estado;
		 END IF;
		 
		 IF _accesslevel = 'E' THEN
			IF _estado = '' THEN
				SET _estado = '1'; -- Si _estado está vacío, establece el valor predeterminado a '1'
			END IF;
				SELECT loans.idloan,
				   books.descriptions AS Titulo,
				   users.username AS Usuario,
				   loans.amount AS Cantidad,
				   loans.registration_date AS `F. Registro`,
				   loans.pickup_date AS `F. Recojo`,
				   loans.return_date AS `F. Retorno`,
				   loans.cancellation_date AS `F. Cancelacion`,
				   loans.observation AS Observacion,
				   loans.acotacion AS Perdida,
				   loans.state AS Estado
				FROM loans
				JOIN books ON loans.idbook = books.idbook
				JOIN users ON loans.idusers = users.idusers
				WHERE loans.idusers = _idusers AND loans.state = _estado;
		   END IF;
		    
		    IF _accesslevel = 'A' THEN 
			IF _estado = '' THEN
				SET _estado = '1'; -- Si _estado está vacío, establece el valor predeterminado a '1'
			END IF;
			    SELECT loans.idloan,
				   books.descriptions AS Titulo,
				   users.username AS Usuario,
				   loans.amount AS Cantidad,
				   loans.registration_date AS `F. Registro`,
				   loans.pickup_date AS `F. Recojo`,
				   loans.return_date AS `F. Retorno`,
				   loans.cancellation_date AS `F. Cancelacion`,
				   loans.observation AS Observacion,
				   loans.acotacion AS Perdida,
				   loans.state AS Estado
			    FROM loans
			    JOIN books ON loans.idbook = books.idbook
			    JOIN users ON loans.idusers = users.idusers 
			    WHERE loans.state = _estado;
			    END IF;    
		END $$
		
		SELECT * FROM loans;
		SELECT * FROM users;
		
		CALL spu_listar_prestamo('','A',1);

		-- N°2 List users loans
			DELIMITER $$
				CREATE PROCEDURE spu_usersloans_list()
				BEGIN
					SELECT idusers, CONCAT(namess, ' ' , surnames)AS Users
					FROM users;
			END $$
			CALL spu_usersloans_list();
			
		-- N°3 Register loans
			DELIMITER $$
				CREATE PROCEDURE spu_loans_register(
					IN _idbook		INT,
					IN _idusers		INT,
					IN _observation		VARCHAR(100),
					IN _loan_date		DATETIME,
					IN _return_date		DATETIME,
					IN _amount		VARCHAR(30)
				)
				BEGIN
					INSERT INTO loans(idbook,idusers,observation,loan_date,return_date,amount)
					VALUES(_idbook,_idusers,_observation,_loan_date,_return_date,_amount);	
			END $$
			
			CALL spu_loans_register('1','25','muy poco','2023-05-26','2023-05-27','1');
			
		-- N°4 list loans by user	
			DELIMITER $$
			CREATE PROCEDURE spu_listloans_user(IN _idusers INT)
			BEGIN
				SELECT 	ls.idloan,bs.idbook,ls.idusers,
					bs.descriptions,
					ls.loan_date,
					ls.return_date,
					observation
				FROM loans ls
				INNER JOIN books bs ON bs.idbook = ls.idbook
				WHERE idusers = _idusers;
			END $$

			CALL spu_listloans_user(1);
		-- ***************************************************************************************************************	
		-- N°5 Reporte Préstamo
		DELIMITER $$
		CREATE PROCEDURE spu_reporte_prestamos
		(
		    IN _idbook INT,
		    IN _anio CHAR(4),
		    IN _mes CHAR(2),
		    IN _estado CHAR(1)
		)
		BEGIN
		    IF _anio IS NOT NULL AND _mes IS NOT NULL AND _estado IS NOT NULL AND _anio != '' AND _mes != '' AND _estado != '' THEN
			SELECT loans.idloan,
			   books.descriptions AS Titulo,
			   users.username AS Usuario,
			   loans.amount AS Cantidad,
			   loans.registration_date AS `F_Registro`,
			   loans.pickup_date AS `F_Recojo`,
			   loans.return_date AS `F_Retorno`,
			   loans.cancellation_date AS `F_Cancelacion`,
			   loans.observation AS Observacion,
			   loans.acotacion AS Perdida,
			   loans.state AS Estado
			FROM loans
			JOIN books ON loans.idbook = books.idbook
			JOIN users ON loans.idusers = users.idusers
			WHERE loans.idbook = _idbook
			AND YEAR(loans.registration_date) = _anio
			AND MONTH(loans.registration_date) = _mes
			AND loans.state = _estado;
			
		    ELSEIF _anio IS NOT NULL AND _mes IS NOT NULL AND _anio != '' AND _mes != '' THEN
			SELECT loans.idloan,
			   books.descriptions AS Titulo,
			   users.username AS Usuario,
			   loans.amount AS Cantidad,
			   loans.registration_date AS `F_Registro`,
			   loans.pickup_date AS `F_Recojo`,
			   loans.return_date AS `F_Retorno`,
			   loans.cancellation_date AS `F_Cancelacion`,
			   loans.observation AS Observacion,
			   loans.acotacion AS Perdida,
			   loans.state AS Estado
			FROM loans
			JOIN books ON loans.idbook = books.idbook
			JOIN users ON loans.idusers = users.idusers
			WHERE loans.idbook = _idbook
			AND YEAR(loans.registration_date) = _anio
			AND MONTH(loans.registration_date) = _mes;
			
		   ELSEIF _estado IS NOT NULL AND _estado != '' THEN
			SELECT loans.idloan,
			   books.descriptions AS Titulo,
			   users.username AS Usuario,
			   loans.amount AS Cantidad,
			   loans.registration_date AS `F_Registro`,
			   loans.pickup_date AS `F_Recojo`,
			   loans.return_date AS `F_Retorno`,
			   loans.cancellation_date AS `F_Cancelacion`,
			   loans.observation AS Observacion,
			   loans.acotacion AS Perdida,
			   loans.state AS Estado
			FROM loans
			JOIN books ON loans.idbook = books.idbook
			JOIN users ON loans.idusers = users.idusers
			WHERE loans.idbook = _idbook
			AND loans.state = _estado;
			
		    ELSE
			SELECT loans.idloan,
			   books.descriptions AS Titulo,
			   users.username AS Usuario,
			   loans.amount AS Cantidad,
			   loans.registration_date AS `F_Registro`,
			   loans.pickup_date AS `F_Recojo`,
			   loans.return_date AS `F_Retorno`,
			   loans.cancellation_date AS `F_Cancelacion`,
			   loans.observation AS Observacion,
			   loans.acotacion AS Perdida,
			   loans.state AS Estado
			FROM loans
			JOIN books ON loans.idbook = books.idbook
			JOIN users ON loans.idusers = users.idusers
			WHERE loans.idbook = _idbook;
		    END IF;
		END $$
		
		-- lista estados
		DELIMITER $$
			CREATE PROCEDURE spu_list_estado()
			BEGIN
			SELECT state FROM loans
			GROUP BY state;
		END $$
		

		
		SELECT * FROM loans WHERE state = 1
		
			DROP PROCEDURE spu_reporte_prestamos
			
		CALL spu_reporte_prestamos(16,'2023','07','1');
		
		SELECT * FROM loans
		
		

		-- idlibro / mes
		CALL spu_obtener_libros_meses(1, 7);
				
-- ZONA SOCIAL:
	-- tb. social
		CREATE TABLE commentaries
		(
			idcommentary		INT	AUTO_INCREMENT PRIMARY KEY ,
			idbook				INT NOT NULL,
			idusers				INT NOT NULL,
			commentary			VARCHAR(500) NOT NULL,
			score				INT NOT NULL,
			commentary_date		DATE NOT NULL DEFAULT NOW(),
			commentary_delete	DATETIME NULL, 
			state 				CHAR(1) NOT NULL DEFAULT '1',
					
			CONSTRAINT fk_idbook FOREIGN KEY (idbook) REFERENCES books (idbook),
			CONSTRAINT fk_idusers FOREIGN KEY (idusers) REFERENCES users (idusers)
		)ENGINE = INNODB;
		
DELIMITER $$
CREATE PROCEDURE spu_obtener_Comentario
(
    IN p_idcomentario INT
)
BEGIN
    SELECT idcommentary, idusers, idbook, commentary
    FROM commentaries
    WHERE idcommentary = p_idcomentario
        AND commentary_delete IS NULL
        AND state = '1';
END $$
DELIMITER ;



CALL spu_obtener_Comentario(1);

-- COMENTARIOS:	
-- Procedimiento Almacenado para Listar los comentarios (usuario/comentario/fecha)
	DELIMITER $$
	CREATE PROCEDURE spu_commentaries_list(
	    IN _idusers INT,
	    IN _accesslevel CHAR(1)
	)
	BEGIN
	    IF _accesslevel = 'D' THEN
		SELECT
		    commentaries.idcommentary AS idcomentario,
		    CONCAT(users.namess, ' ', users.surnames) AS datos,
		    books.descriptions AS descriptions,
		    commentaries.commentary_date,
		    commentaries.commentary,
		    commentaries.state AS estado
		FROM commentaries
		INNER JOIN users ON commentaries.idusers = users.idusers
		INNER JOIN books ON commentaries.idbook = books.idbook
		WHERE commentaries.state = 1 AND (users.idusers = _idusers OR users.accesslevel = 'E');
	    END IF;

	    IF _accesslevel = 'E' THEN
		SELECT
		    commentaries.idcommentary AS idcomentario,
		    CONCAT(users.namess, ' ', users.surnames) AS datos,
		    books.descriptions AS descriptions,
		    commentaries.commentary_date,
		    commentaries.commentary,
		    commentaries.state AS estado
		FROM commentaries
		INNER JOIN users ON commentaries.idusers = users.idusers
		INNER JOIN books ON commentaries.idbook = books.idbook
		WHERE commentaries.state = 1 AND users.idusers = _idusers;
	    END IF;

	    IF _accesslevel = 'A' THEN
		SELECT
		    commentaries.idcommentary AS idcomentario,
		    CONCAT(users.namess, ' ', users.surnames) AS datos,
		    books.descriptions AS descriptions,
		    commentaries.commentary_date,
		    commentaries.commentary,
		    commentaries.state AS estado
		FROM commentaries
		INNER JOIN users ON commentaries.idusers = users.idusers
		INNER JOIN books ON commentaries.idbook = books.idbook
		WHERE commentaries.state = 1;
	    END IF;
	END $$
	
	CALL spu_commentaries_list(25,'D')

	
	-- Eliminar comentario
	DELIMITER $$
		CREATE PROCEDURE spu_delete_commentaries
		(
			 IN _idcomentario INT
		)
		BEGIN
		 UPDATE commentaries
		 SET state = 0
		 WHERE idcommentary = _idcomentario;
	END $$
	
	-- Reporte comentario
	DELIMITER $$
	CREATE PROCEDURE spu_reporte_comentario(
	    IN _idbook INT,
	    IN _anio CHAR(4),
	    IN _mes CHAR(2),
	    IN _accesslevel CHAR(1)    
	)
	BEGIN
	  IF _anio IS NOT NULL AND _mes IS NOT NULL AND _anio != '' AND _mes != '' THEN
		IF _accesslevel = 'D' THEN 
		    SELECT
			    commentaries.idcommentary AS idcomentario,
			    CONCAT(users.namess, ' ', users.surnames) AS datos,
			    books.descriptions AS descriptions,
			    commentaries.commentary_date,
			    commentaries.commentary,
			    commentaries.state AS estado
			FROM commentaries
			INNER JOIN users ON commentaries.idusers = users.idusers
			INNER JOIN books ON commentaries.idbook = books.idbook
		    WHERE commentaries.idbook  = _idbook AND commentaries.state = '1'
			AND YEAR(commentaries.commentary_date) = _anio
			AND MONTH(commentaries.commentary_date) = _mes
			AND users.accesslevel = 'E';

		  ELSEIF _accesslevel = 'A' THEN
			SELECT
			    commentaries.idcommentary AS idcomentario,
			    CONCAT(users.namess, ' ', users.surnames) AS datos,
			    books.descriptions AS descriptions,
			    commentaries.commentary_date,
			    commentaries.commentary,
			    commentaries.state AS estado
			FROM commentaries
			INNER JOIN users ON commentaries.idusers = users.idusers
			INNER JOIN books ON commentaries.idbook = books.idbook
		    WHERE commentaries.idbook  = _idbook AND commentaries.state = '1'
			AND YEAR(commentaries.commentary_date) = _anio
			AND MONTH(commentaries.commentary_date) = _mes;
		END IF;
	ELSE
		IF _accesslevel = 'D' THEN 
		    SELECT
			    commentaries.idcommentary AS idcomentario,
			    CONCAT(users.namess, ' ', users.surnames) AS datos,
			    books.descriptions AS descriptions,
			    commentaries.commentary_date,
			    commentaries.commentary,
			    commentaries.state AS estado
			FROM commentaries
			INNER JOIN users ON commentaries.idusers = users.idusers
			INNER JOIN books ON commentaries.idbook = books.idbook
		    WHERE commentaries.idbook  = _idbook AND commentaries.state = '1'
			AND users.accesslevel = 'E';

		  ELSEIF _accesslevel = 'A' THEN
			SELECT
			    commentaries.idcommentary AS idcomentario,
			    CONCAT(users.namess, ' ', users.surnames) AS datos,
			    books.descriptions AS descriptions,
			    commentaries.commentary_date,
			    commentaries.commentary,
			    commentaries.state AS estado
			FROM commentaries
			INNER JOIN users ON commentaries.idusers = users.idusers
			INNER JOIN books ON commentaries.idbook = books.idbook
		    WHERE commentaries.idbook  = _idbook AND commentaries.state = '1';
		END IF;
	END IF;
	END $$
	
	DROP PROCEDURE spu_reporte_comentario
	SELECT * FROM commentaries;
	CALL spu_reporte_comentario(1,2023,06,'A')
	

	
	-- PROCEDIMIENTO ALMACENADO	
	-- VISTA ZONA SOCIAL:
		-- N°1 Register comments
			DELIMITER $$
				CREATE PROCEDURE spu_register_commentaries(
					IN _idbook 		INT,
					IN _idusers		INT,
					IN _commentary	VARCHAR(250),
					IN _score		INT	
				)
				BEGIN
					INSERT INTO commentaries(idbook,idusers,commentary,score)
					VALUES(_idbook,_idusers,_commentary,_score);
			END $$

			SELECT * FROM users
			
			CALL spu_register_commentaries('3','1','Muy buen libro.','4');
			CALL spu_register_commentaries('1','1','No me gustó el libro.','1');
			CALL spu_register_commentaries('1','3','Buen contenido.','5');
			CALL spu_register_commentaries('2','3','Muy buen contenido del libro','5')
			
		-- N°2 List comments
			DELIMITER $$
				CREATE PROCEDURE spu_list_commentaries( IN _idbook INT)
				BEGIN 
					SELECT b.idbook, CONCAT(u.namess, ' ', u.surnames) AS Usuario,
						c.commentary, c.score, c.commentary_date
					FROM commentaries c
						INNER JOIN	books b ON b.idbook = c.idbook
						INNER JOIN	users u ON u.idusers = c.idusers
					WHERE b.idbook = _idbook AND c.state =spu_order_user 1;			
			END	$$
			
			CALL spu_list_commentaries(2);
			
	-- VISTA ADMINISTRATIVA
		-- N°1 list all comentaries
			DELIMITER $$
				CREATE PROCEDURE spu_list_commentaries( IN _idbook INT )
				BEGIN 
					SELECT c.idcommentary, b.idbook, CONCAT(u.namess, ' ', u.surnames) AS Usuario,
						c.commentary, c.score, c.commentary_date
					FROM commentaries c
						INNER JOIN	books b ON b.idbook = c.idbook
						INNER JOIN	users u ON u.idusers = c.idusers
					WHERE b.idbook = _idbook AND c.state = 1
					ORDER BY c.idcommentary DESC
					LIMIT 5;
			END	$$
		
			CALL spu_list_commentaries (1)
			SELECT * FROM commentaries
			
-- Recuperar contraseña
	-- Tabla de recuperarclave
	   CREATE TABLE recuperarclave(
		idrecuperar			INT AUTO_INCREMENT PRIMARY KEY,
		idusuario			INT 		NOT NULL,
		fechageneracion			DATETIME 	NOT NULL DEFAULT NOW(),
		email				VARCHAR(120) 	NOT NULL,	-- Email que se utilizó en ese momento
		clavegenerada			CHAR(4)	 	NOT NULL,
		estado				CHAR(1)	 	NOT NULL DEFAULT '1',
		CONSTRAINT fk_idusuario_rcl FOREIGN KEY (idusuario) REFERENCES users(idusers)	
	   )ENGINE = INNODB;
	   
	   DELIMITER $$
	   CREATE PROCEDURE spu_registra_claverecuperacion(
			IN _idusers INT, 
			IN _email VARCHAR(120),
			IN _clavegenerada CHAR(4)
		)
	   BEGIN
		UPDATE recuperarclave SET estado = '0' WHERE idusers = _idusers;
		INSERT INTO recuperarclave (idusers, email, clavegenerada) VALUES (_idusers, _email, _clavegenerada);
	   END$$
	   
	   DELIMITER $$
	   CREATE PROCEDURE spu_usuario_validartiempo(IN _idusers INT)
	   BEGIN
		IF ((SELECT COUNT(*) FROM recuperarclave WHERE idusers = _idusers) =0) THEN
			SELECT 'GENERAR' AS 'status';
			ELSE
				-- Buscamos el último estado del usuario . si es 0, entonces debe GENERAR el código
				IF ((SELECT estado FROM recuperarclave WHERE idusers = _idusers ORDER BY 1 DESC LIMIT 1)= 0)THEN
					SELECT 'GENERAR' AS 'status';
				ELSE
					-- En esta sección, el último registro es '1', NO sabemos si está dentro de los 15min permitidos
					IF
					(
							(
								SELECT COUNT(*) FROM recuperarclave 
								WHERE idusers = _idusers AND estado = '1' AND
								NOW()NOT BETWEEN fechageneracion AND DATE_ADD(fechageneracion,INTERVAL 15 MINUTE)
								ORDER BY fechageneracion DESC LIMIT 1						
							) = 1
						)THEN
							-- El usuario tiene estado 1, pero esta fuera de los 15 minutos
							SELECT 'GENERAR' AS 'status';
						ELSE
							SELECT 'DENEGAR' AS 'status';
					END IF;
				END IF;
			END IF;
		END$$
	   
		-- Procedimiento que valida la clave ingresada
		   DELIMITER $$
		   CREATE PROCEDURE spu_usuario_validarclave
		   (
		       IN _idusers INT,
		       IN _clavegenerada CHAR(4)
		   )
		   BEGIN
		       IF (
			   (
			   SELECT clavegenerada
			   FROM recuperarclave
			   WHERE idusers = _idusers AND estado = '1'
			   LIMIT 1
			   ) = _clavegenerada
		       )
		       THEN
			   SELECT 'PERMITIDO' AS 'status';
		       ELSE
		   	   SELECT 'DENEGADO' AS 'status';
		       END IF;
		   END $$
		
		-- PROCEDIMIENTO QUE FINALMENTE ACTUALIZARA LA CLAVE DESPUES DE TODAS LAS VALIDACIONES
		   DELIMITER $$
		   CREATE PROCEDURE spu_usuario_actualizarpasssword
		   (
		       IN _idusers INT,
		       IN _accesskey VARCHAR(100)
		   )
		   BEGIN
		       UPDATE users SET accesskey = _accesskey WHERE idusers = _idusers;
		       UPDATE recuperarclave SET estado = '0' WHERE idusers = _idusers;
		   END $$

SELECT * FROM users
	   
	-- Procedimientos almacenados
	
	DELIMITER $$
	CREATE PROCEDURE spu_searchuser(IN _username VARCHAR(150))
	BEGIN
	  SELECT 
		idusers,
		username,
		surnames,
		namess
		email
		FROM users
		WHERE username = _username AND state = '1';
	 END $$
	 CALL spu_searchuser('Diego10');
	 
	 SELECT * FROM users
	 
	 
	 
-- DASHBOARD
-- Procedimiento almacenado (count)
	DELIMITER $$
	CREATE PROCEDURE spu_list_dashboard_books()
	    SELECT  COUNT(idbook) AS total_libros ,
		(SELECT COUNT(idcategorie) FROM categories) AS total_categorias,
		(SELECT COUNT(idcategorie) FROM subcategories) AS total_subcategorias,
		(SELECT COUNT(*) AS total_autores
			FROM (SELECT author FROM books GROUP BY author) AS Total) AS total_autores
	    FROM books
	END $$

	CALL spu_list_dashboard_books();	

	DELIMITER $$
	CREATE PROCEDURE spu_list_dashboard_users()
	    SELECT  COUNT(idusers) AS total_users,
		(SELECT COUNT(*) FROM users WHERE accesslevel LIKE 'D') AS total_docentes,
		(SELECT COUNT(*) FROM loans WHERE state = 1) AS total_prestamos
	    FROM users
	END $$
	SELECT * FROM books;
	
	CALL spu_list_dashboard_users()
	
	
-- GRAFICOS
	-- N1. Grafico de Prestamos
	DELIMITER $$
	CREATE PROCEDURE sp_grafico_reporte
	(
	    IN _mes INT,
	    IN _anio INT
	)
	BEGIN
	    SELECT b.descriptions AS Titulo, COUNT(*) AS Cantidad
	    FROM loans l
	    INNER JOIN books b ON l.idbook = b.idbook
	    WHERE l.state = '4'
	    AND MONTH(l.return_date) = _mes
	    AND YEAR(l.return_date) = _anio
	    GROUP BY b.descriptions;
	END $$

	CALL sp_grafico_reporte(7, 2023);
	


-- SCRIPT CONTINUIDAD DE ID EN TABLAS -> agregar las tablas necesarias
SET @nuevo_autoincremento = (SELECT MAX(idloan) FROM loans) + 1;
SET @sql = CONCAT('ALTER TABLE loans AUTO_INCREMENT = ', @nuevo_autoincremento);
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

SELECT * FROM books;


-- DATA:	
-- categoria 1 data:
CALL spu_books_register ('1','1','02','Probalidad y estadística como trabajar con niños y jóvenes','Ana P, de Bressan/Oscar Bogisic','B','Biblioteca escolar');
CALL spu_books_register  ('1','1','02','Razones para enseñar geometría en la educación básica','Ana P, de Bressan/Beatriz Bogic','B','Biblioteca escolar');
CALL spu_books_register  ('1','1','02','Juegos y problemas para construir ideas matemáticas','Stella Ricotti','B','Biblioteca escolar');
CALL spu_books_register  ('1','1','02','Física conceptual','Paul G, Hewitt','B','Biblioteca escolar');
CALL spu_books_register  ('1','1','02','La crisis planetaria del calendario global y cómo afrontarlo','Editorial Gedisa','B','Biblioteca escolar');
CALL spu_books_register  ('1','1','02','Enciclopedia didáctica de las ciencias naturales','Editorial océano','B','Biblioteca escolar');
CALL spu_books_register  ('1','1','08','Atlas del cuerpo humano','Editorial Ars Medica','B','Biblioteca escolar');
CALL spu_books_register  ('1','1','08','Atlas del cielo,un viaje entre las estrellas y planeta para conocer el universo','Ediciones V, D-SAC','B','Biblioteca escolar');
CALL spu_books_register  ('1','1','02','Matemáticas para el c´álculo, pre cálculo N°06','James, Stewart/Lother Redlin','B','Biblioteca escolar');
CALL spu_books_register  ('1','1','08','La biblia de la física y la química','Editorial Lexus','B','Biblioteca escolar');
CALL spu_books_register  ('1','1','08','Economía para todos','Instituto Apoyo','B','Biblioteca escolar');
CALL spu_books_register  ('1','1','08','NEXUS/ciencias para el mundo contemporáneo','Editorial océano','B','Biblioteca escolar');
CALL spu_books_register ('1','1','08','Cuentos de matemáticas','J,C Hervás/A.M Benavente','B','Biblioteca escolar');
CALL spu_books_register ('1','1','02','Ciencia/la guía visual definitica','Adam hart - davis','B','Biblioteca escolar');
CALL spu_books_register ('1','1','08','Mentor de las matemáticas con ejercicios resueltos','Editorial Oceano','B','Biblioteca escolar');
CALL spu_books_register ('1','1','16','Economía para principiantes','Alejandro Gorvie/Sanyo','B','Biblioteca escolar');
CALL spu_books_register ('1','1','08','La biblia de las ciencias anturales','Editoral Lexus','B','Biblioteca escolar');
CALL spu_books_register ('1','1','02','Atlas National Geographic la tierra y el Universo','National Geographic','B','Biblioteca escolar');

CALL spu_books_register ('1','2','01','Las Matemáticas en la vida cotidiana','Universal Autónoma de Madrid','B','C.R.E');
CALL spu_books_register ('1','2','01','La Enseñanza de la matemática','Juan Carlos Sánchez','B','C.R.E');
CALL spu_books_register ('1','2','04','Proyecto de matemática','Tulio Ozejo-Zenobia Zenobia Lapa','B','C.R.E');
CALL spu_books_register ('1','2','01','Historia e historias de matemáticas','Mariano Perero','B','C.R.E');
CALL spu_books_register ('1','2','02','Matemáticas 08','E.G.B Santillana','B','C.R.E');
CALL spu_books_register ('1','2','02','Matemáticas 07','E.G.B Santillana','B','C.R.E');
CALL spu_books_register ('1','2','01','Frutal,Matemática 2°','Fernando Alvarez - Vicens - vives','B','C.R.E');
CALL spu_books_register ('1','2','01','Calculo numérico','Vicens - vives','B','C.R.E');
CALL spu_books_register ('1','2','01','ABACO 2 Matemática','Santillana','R','C.R.E');
CALL spu_books_register ('1','2','01','Las matemáticas en tus manos','Luisa coreaga - Margarita cos','R','C.R.E');
CALL spu_books_register ('1','2','01','Matemática moderna 1°','Campos villavicencio','M','C.R.E');
CALL spu_books_register ('1','2','02','Matemáticas 1°','Máximo de la cruz Solórzano','M','C.R.E');
CALL spu_books_register ('1','2','03','Matemática moderna 2°','Máximo de la cruz Solórzano','M','C.R.E');
CALL spu_books_register ('1','2','02','Matemáticas 1°','Rubén Romero Méndez','R','C.R.E');
CALL spu_books_register ('1','2','02','Matemáticas 1°','Placentinos camilo rodríguez','R','C.R.E');
CALL spu_books_register ('1','2','01','Matemáticas 1°','Flavio vega Villanueva','M','C.R.E');
CALL spu_books_register ('1','2','01','Aritmética 1°','Repetto Linskens, Fesquet','M','C.R.E');
CALL spu_books_register ('1','2','01','Matemáticas 1°','Felipe E, Sebastiáni','M','C.R.E');
CALL spu_books_register ('1','2','01','Matemáticas 1°','Virgilio Gutiérrez','R','C.R.E');
CALL spu_books_register ('1','2','01','Matemáticas 2°','Máximo de la cruz Solórzano','R','C.R.E');
CALL spu_books_register ('1','2','02','Matemática teoría y práctica 5°','Gustavo Rojas Gasco','R','C.R.E');
CALL spu_books_register ('1','2','02','Matemáticas 3°','Máximo de la cruz Solórzano','R','C.R.E');
CALL spu_books_register ('1','2','01','Matemáticas para todos los niveles, vol. 9','Simón Mochón','R','C.R.E');
CALL spu_books_register ('1','2','02','Geometría del espacio, trigonometría 5°','Flavio vega Villanueva','R','C.R.E');
CALL spu_books_register ('1','2','01','Geometría del espacio, trigonometría 5°','Máximo de la cruz Solórzano','R','C.R.E');
CALL spu_books_register ('1','2','01','Razonamiento lógico matemático 2°','Rubén Romero Mendez','B','C.R.E');


-- category 2 data:
SELECT * FROM books;
SELECT * FROM categories;

CALL spu_books_register('02','5','02','Educar la mirada/políticas y pedagogías de la imagen','Inés Dusal/Daniela Gutiérrez','B','Biblioteca escolar');
CALL spu_books_register('02','5','02','Didáctica de la lengua castellana y la literatura','Uri, Ruiz Bikandi','B','Biblioteca escolar');
CALL spu_books_register('02','5','02','Enseñar literatura en secundaria, la formación de lectores críticos motivados y cultos','G, Bordons. A Díaz Plaja','B','Biblioteca escolar');
CALL spu_books_register('02','5','02','09 ideas clave, educar en la adolescencia','Jaume Funes Artiaga','B','Biblioteca escolar');
CALL spu_books_register('02','5','02','PNL para profesores; mejora tu conocimiento y tus relaciones','Albert Serrat','B','Biblioteca escolar');
CALL spu_books_register('02','5','02','El cultivo del discernimiento ensayos sobre ética ciudadana y educación','Susana Frisancho/Gonzalo Gamio','B','Biblioteca escolar');
CALL spu_books_register('02','5','02','Sistematización de la práctica docente','Carlos A. Audirac Camarena','B','Biblioteca escolar');
CALL spu_books_register('02','5','02','Educación convivencia y agresión escolar','Enrique, Chaux','B','Biblioteca escolar');
CALL spu_books_register('02','5','08','Dinámica de grupos y autoconciencia emocional','Jesús M, canto Ortiz/Verónica Montilla Bervel','B','Biblioteca escolar');
CALL spu_books_register('02','5','08','Basic Gramman in use','Raymond Murphy','B','Biblioteca escolar');
CALL spu_books_register('02','5','08','Pocket Longman/Diccionario ingles Español','Ediciones Pearson','B','Biblioteca escolar');
CALL spu_books_register('02','5','08','The Heinle Picture Dictionary','Cengale Learnig','B','Biblioteca escolar');
CALL spu_books_register('02','5','02','Procedimiento en historia un punto de vista didáctico','Cristófol-A. Trepat','B','Biblioteca escolar');
CALL spu_books_register('02','5','02','Técnicas de aprendizaje colaborativo','Elizabeth F. Barkley/K.Patricia Cross/Claire.Howell Major','B','Biblioteca escolar');
CALL spu_books_register('02','5','02','Aprender a resolver conflictos/programa para mejorar la convivencia escolar','David Álvarez P/José Carlos Núñez Pérez','B','Biblioteca escolar');
CALL spu_books_register('02','5','08','Las lagunas del Perú','Luis Andrade Ciudad/Jorge Iván,P','B','Biblioteca escolar');

CALL spu_books_register('02','3','15','Romeo and Julieta','William Shakes peare','B','C.R.E');
CALL spu_books_register('02','3','01','One, Two . teni book 2°','Santillana','B','C.R.E');
CALL spu_books_register('02','3','02','One, Two . teni book 3°','Santillana','B','C.R.E');
CALL spu_books_register('02','3','02','One, Two . teni book 4°','Santillana','B','C.R.E');
CALL spu_books_register('02','3','03','One, Two . teni book 6°','Santillana','B','C.R.E');
CALL spu_books_register('02','3','02','One, Two . teni book 8°','Santillana','R','C.R.E');
CALL spu_books_register('02','3','03','One, Two . teni book 9°','Santillana','R','C.R.E');
CALL spu_books_register('02','3','03','One, Two . teni book 10°','Santillana','R','C.R.E');
CALL spu_books_register('02','3','02','My english book 2°','Bertha Suarez de Mayandia','M','C.R.E');
CALL spu_books_register('02','3','02','My english task 7°','Bertha Suarez de Mayandia','M','C.R.E');
CALL spu_books_register('02','3','01','English course book three 3° 4°','Vince Quispe Andia','R','C.R.E');
CALL spu_books_register('02','3','15','The x -files, Squeeze','Ellen steiber','B','C.R.E');
CALL spu_books_register('02','3','01','Back to school','Armando Salinas Acosta','M','C.R.E');
CALL spu_books_register('02','3','05','English course','Vince Quispe Andia','B','C.R.E');
CALL spu_books_register('02','3','15','Súper Computerman','Jeremy Taylor','B','C.R.E');
CALL spu_books_register('02','3','01','Diccionario Universal español-ingles','Larousse','R','C.R.E');
CALL spu_books_register('02','3','01','Dictionary-para estudiantes de ingles','Richmond-Santillana','B','C.R.E');
CALL spu_books_register('02','3','01','Dictionary-CONCISE','Richmond-Santillana','B','C.R.E');
CALL spu_books_register('02','3','08','El umbral del milenio I,II,III,VI','Prom Perú(donación)','B','C.R.E');
CALL spu_books_register('02','3','02','Perú An, Economy ford the list century','B.C.P(donations)','B','C.R.E');

CALL spu_books_register('02','4','12','El arte y los estilos','Editorial Sopena','R','C.R.E');
CALL spu_books_register('02','4','04','Taller de manualidades','Editorial parramon','R','C.R.E');
CALL spu_books_register('02','4','06','Taller carpintería','Editorail Daly','B','C.R.E');
CALL spu_books_register('02','4','14','Enciclipedias temáticas','Editorial Richards','B','C.R.E');
CALL spu_books_register('02','4','08','Geografía del Perú Naturaleza y hombre','Editorial Manfer','B','C.R.E');
CALL spu_books_register('02','4','06','Atlas del Perú y del mundo','M.D.E','B','C.R.E');
CALL spu_books_register('02','4','02','El Perú y sus recursos','Editorial cobol','R','C.R.E');
CALL spu_books_register('02','4','01','Atlas del Perú y del mundo','Editorial Bruño','R','C.R.E');
CALL spu_books_register('02','4','01','Gran atlas de historia universal','Colin MC, evedy','B','C.R.E');
CALL spu_books_register('02','4','02','Primeras planas de siglo XX','Editorial el comercio','B','C.R.E');
CALL spu_books_register('02','4','02','Atlas Histórico','Joan, Roig Obiol','R','C.R.E');
CALL spu_books_register('02','4','07','Historial del humanidad','Larousse','R','C.R.E');
CALL spu_books_register('02','4','01','Atlas del Perú y del mundo','Julio R, Villanueva','B','C.R.E');
CALL spu_books_register('02','4','01','Atlas compacto','Peters','B','C.R.E');
CALL spu_books_register('02','4','01','Atlas universal del Perú','Editorial Bruño','B','C.R.E');
CALL spu_books_register('02','4','01','El territorio del cóndor','Ediciones PEISA','B','C.R.E');
CALL spu_books_register('02','4','01','El territorio del jaguar','Ediciones PEISA','B','C.R.E');
CALL spu_books_register('02','4','01','Filosofía 3°','Santillana','R','C.R.E');
CALL spu_books_register('02','4','01','Enciclopedia familiar de la medicina y la salud','Morris Fishbein','R','C.R.E');
CALL spu_books_register('02','4','01','Psicología Social','David Krech','B','C.R.E');
CALL spu_books_register('02','4','01','Tradciones peruanas','Ricardo Palma','R','C.R.E');
CALL spu_books_register('02','4','09','Enciclopedia de la historia general del Perú I,II,III,IV,V,VI,VII,VIII,IX','Margarita, Guerra Martiniéri','B','C.R.E');
CALL spu_books_register('02','4','03','Diccionario Ilustrado','Nuevo Sopena','M','C.R.E');
CALL spu_books_register('02','4','05','Diccionario palabras','Editorial escuela nueva, M.D.E','M','C.R.E');
CALL spu_books_register('02','4','02','Diccionario enciclopédico','Navarrete','B','C.R.E');
CALL spu_books_register('02','4','03','Mi diccionario','Andrés bello','R','C.R.E');
CALL spu_books_register('02','4','02','La enciclo','Editorial anaya','B','C.R.E');
CALL spu_books_register('02','4','01','Diccionario escolar infantil','Editorial Norma','B','C.R.E');
CALL spu_books_register('02','4','01','Enciclopedia del Perú','Editorial Océano','B','C.R.E');
CALL spu_books_register('02','4','01','Diccionario enciclopedia','Editorial visor','B','C.R.E');
CALL spu_books_register('02','4','01','La enciclopedia V-1','Editorial Salvat','B','C.R.E');
CALL spu_books_register('02','4','01','Diccionario escolar lengua española','Editorial','B','C.R.E');
CALL spu_books_register('02','4','01','La región Humana','Alberto Valdivia','R','C.R.E');


-- category 3 data:
SELECT * FROM books;

CALL spu_books_register('03','6','08','Pedro Páramo','José Carlos, Gonzales/Juan Rulfo','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Los perros hambrientos','Ciro Alegría','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Un mundo para Julios','Alfredo Bryce Echenique','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Cuentos de antología','Julio Ramón Ribeyro','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','El viejo saurio se retira','Miguel Gutiérrez','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','La casa de cartón','Martín Adán','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','País de jaula','Edgardo Rivera Martínez','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Los 7 hábitos de lso adolescentes altamente efectivos','Sean Covey','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Poetas peruanas','Ricardo Gonzales Vigil','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','El quijote de la Mancha','Miguel de Cervantes','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Yawar fiesta(fiesta de sangre)','José María Arguedas','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Los inocentes','Oswaldo Reinoso','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Antología didáctica, Agua, oda al Jet','José María Arguedas','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','La leyenda del cid','Agustín Sánchez Aguilar','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Tragedias, Edipo Rey, Antígona','Sófocles','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','El principito','Antonie de saint-Exupéry','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','24 poetas latinoamericanas','Coedición Latinoamericana','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Historia de la literatura hispanoamericana T-I,II,III,IV','José Miguel Oviedo','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Cien años de soledad','Gabriel García Márquez','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Cuentos de té y otros árboles','Mónica Rodríguez Suárez','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','El cristo de Villenas','Carlos Eduardo Zavaleta','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Poesía Peruana,Antología general de vallejo a nuestros días T III','Ricardo, Gonzáles Vigil','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Tragedias','William Shakespeare','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','La llamada de lo salvaje','Jack Londón','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','El túnel','Ernesto Sábato','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Mitos leyendas y cuentos peruanos','José María Arguedas/Francisco Izquierdo Ríos','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Los jefes/los cachorros','Mario Vargas Llosa','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Cuentos reunidos','Abraham Valdelomar','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','El señor de las moscas','William Golding','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Obra poética','Cesar Vallejo','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Tradiciones Peruanas','Ricardo Palma','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Poesías completas','José María, Eguren','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Cuentos inolvidables','Julio Cortazar','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Ética para amador','Fernando Savater','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','La cocina de la escritura','Daniel Cassany','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','17 Narradoras latinoamericanass','Coedición latinoamericana','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Historia de las cosas','Annie Leonard','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','El principe que todo lo aprendio en los libros','Jacinto Benavente','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','La ciudad y los perros','Mario Vargas Llosa','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','El guardián entre el centeno','J.D Salinger','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Diccionario Panhispánico de dudas','Real academia Española','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','Diccionario sinónimos y antónimos','María Moliner','B','Biblioteca escolar');
CALL spu_books_register('03','6','08','100 poemas en homenaje a la vida','Hugo García Castellano','B','Biblioteca escolar');


CALL spu_books_register('03','7','01','Guía para preparar monografías','Pablo Valle, Ezequiel Ander','R','C.R.E');
CALL spu_books_register('03','7','01','Literatura 4°','R, Barrenechea N','R','C.R.E');
CALL spu_books_register('03','7','01','Obra Completa','Juan del Valle y Cabiedes','B','C.R.E');
CALL spu_books_register('03','7','01','Literatura peruana tomo I','Luis Alberto Sánchez','B','C.R.E');
CALL spu_books_register('03','7','01','Literatura peruana tomo II','Luis Alberto Sánchez','B','C.R.E');
CALL spu_books_register('03','7','01','Literatura peruana tomo III','Luis Alberto Sánchez','B','C.R.E');
CALL spu_books_register('03','7','01','Literatura peruana tomo IV','Luis Alberto Sánchez','B','C.R.E');
CALL spu_books_register('03','7','01','Literatura peruana tomo V','Luis Alberto Sánchez','B','C.R.E');
CALL spu_books_register('03','7','01','Viajes de Gulliver','Jonathan Swift','R','C.R.E');
CALL spu_books_register('03','7','01','El tungsteno','Cesar Vallejo','R','C.R.E');
CALL spu_books_register('03','7','18','Documental del Perú','Pedro Felipa Cortázar','R','C.R.E');
CALL spu_books_register('03','7','01','Experiencia sobre Morir','Hohn Minton','R','C.R.E');
CALL spu_books_register('03','7','01','Mecanoscrito del segundo origen','Manuel de pedrosa','R','C.R.E');
CALL spu_books_register('03','7','01','Mody Dick','Hernán Nevilla','R','C.R.E');
CALL spu_books_register('03','7','01','Ollanta','Editoral Mercurio','R','C.R.E');
CALL spu_books_register('03','7','01','Todas las sangres','José María Arguedas','R','C.R.E');

CALL spu_books_register('03','7','02','Doña flor y sus dos meridos','Jorge Amado','B','C.R.E');
CALL spu_books_register('03','7','02','Canto general','Pablo Neruda','B','C.R.E');
CALL spu_books_register('03','7','02','Cambio de Piel','Carlos Fuentes','B','C.R.E');
CALL spu_books_register('03','7','02','Doña Bárbara','Rómulo Gallegos','B','C.R.E');
CALL spu_books_register('03','7','02','Martín Fierro','José Hernández','B','C.R.E');
CALL spu_books_register('03','7','03','Un mundo para Julios','Alfredo Bryce Echenique','B','C.R.E');
CALL spu_books_register('03','7','02','La habana para un infante difunto','Guillermo Cabrera','B','C.R.E');
CALL spu_books_register('03','7','02','Yo, él supremo','Augusto Roa Bastos','B','C.R.E');
CALL spu_books_register('03','7','03','Cien años de soledad','Gabriel García Márquez','B','C.R.E');
CALL spu_books_register('03','7','02','Obra poética','Cesar Vallejo','B','C.R.E');
CALL spu_books_register('03','7','01','Cartas 1° selección','J Ramón Jiménez','B','C.R.E');
CALL spu_books_register('03','7','01','Don Quijote de la mancha','Miguel de Cervantes Saavedra','B','C.R.E');
CALL spu_books_register('03','7','01','Barrio de Broncas','José Antoni Bravo','B','C.R.E');
CALL spu_books_register('03','7','01','Historia de dos ciudades','Charles Dickens','B','C.R.E');
CALL spu_books_register('03','7','04','Relatos Fantásticos','Vicens Vives','B','C.R.E');
CALL spu_books_register('03','7','01','Per Ibañez y el comendador de Ocaña','Lope de vega','B','C.R.E');
CALL spu_books_register('03','7','01','Edipo Rey','Sófocles','B','C.R.E');
CALL spu_books_register('03','7','01','La palabra del Mundo (Antología)','Julio Ramón Ribeyro','B','C.R.E');
CALL spu_books_register('03','7','01','Los Ríos profundos','José María Arguedas','B','C.R.E');
CALL spu_books_register('03','7','01','Charlie y la Fábrica de chocolate','Roald Dahl','B','C.R.E');
CALL spu_books_register('03','7','01','Un joven una sombra','C.E. Zavaleta','B','C.R.E');
CALL spu_books_register('03','7','01','Fiesta prohibida','Jesús cabel','B','C.R.E');
CALL spu_books_register('03','7','01','Ollanta - Drama Inca','Anónimo','B','C.R.E');

CALL spu_books_register('03','7','01','Casa de muñecas','Henrik Ibsen','B','C.R.E');
CALL spu_books_register('03','7','01','Romancero gitano - poeta en Nueva York','Federico García Lorca','B','C.R.E');
CALL spu_books_register('03','7','01','Antes de la edad de oro','Isaac Asimov','B','C.R.E');
CALL spu_books_register('03','7','01','Cuerpos y almas','Maxence Vande Heersch','B','C.R.E');
CALL spu_books_register('03','7','01','La ciudad y los perros','Mario Vargas Llosa','B','C.R.E');
CALL spu_books_register('03','7','01','Lo mejor de la ciencia ficcion del siglo XX','Isaac Asimov','B','C.R.E');
CALL spu_books_register('03','7','01','¡Hagan sitio! ¡Hagan sitio!','Harry Harrison','B','C.R.E');
CALL spu_books_register('03','7','01','Los alucinados/Vinzenz y la amiga de los hombres importantes','Robert Husil','B','C.R.E');
CALL spu_books_register('03','7','01','Nueva narraciones extraordinarias','Edgar Allan Poe','B','C.R.E');
CALL spu_books_register('03','7','01','7 ensayos de intepretación de la realidad peruana','José Carlos Mariátegui','B','C.R.E');
CALL spu_books_register('03','7','01','Almas muertas','Nicolal Gogol','B','C.R.E');
CALL spu_books_register('03','7','01','El mantón negro y otros cuentos','Luigi Pirandello','B','C.R.E');
CALL spu_books_register('03','7','01','Historia de la civilización antigua','Thadee Zielinski','B','C.R.E');
CALL spu_books_register('03','7','01','La comedia humana I','Honoré de Balzac','B','C.R.E');
CALL spu_books_register('03','7','01','La brevedad de la vida','Séneca','B','C.R.E');
CALL spu_books_register('03','7','01','Nada','Carmen Laforet','B','C.R.E');
CALL spu_books_register('03','7','01','Ana Karenina I, II','León Tolstoi','B','C.R.E');
CALL spu_books_register('03','7','01','La casa de cartón','Martín Adán','B','C.R.E');
CALL spu_books_register('03','7','01','La divina comedia','Dante Alighieri','B','C.R.E');
CALL spu_books_register('03','7','01','Romeo y julieta','William Shakespeare','B','C.R.E');
CALL spu_books_register('03','7','01','Momo','Michael Ende','B','C.R.E');
CALL spu_books_register('03','7','01','Tres novelas ejemplares','Miguel de cervantes','B','C.R.E');

CALL spu_books_register('03','7','01','La palabra del mundo','Julio Ramón Ribeyro(antología)','B','C.R.E');
CALL spu_books_register('03','7','01','Los jefes/los cachorros','Mario Vargas llosa','B','C.R.E');
CALL spu_books_register('03','7','01','El azar y la necesidad','Jacques monod','R','C.R.E');
CALL spu_books_register('03','7','01','Espejos educadores','Saturnino gallego','R','C.R.E');
CALL spu_books_register('03','7','01','Todos los cuentos','Gabriel Garcia Marquez','R','C.R.E');
CALL spu_books_register('03','7','01','Tradicones peruanas','Ricardo palma','B','C.R.E');
CALL spu_books_register('03','7','01','Historia de cronopios y de famas','Julio Cortázar','B','C.R.E');
CALL spu_books_register('03','7','01','Pedro páramo y el llano en llamas','Juan Rulfo','B','C.R.E');
CALL spu_books_register('03','7','01','Medea, Electra','Eurípides','B','C.R.E');
CALL spu_books_register('03','7','01','Prometeo encadenado/los persas','Esquilo','B','C.R.E');
CALL spu_books_register('03','7','01','Eso no me lo quita nadie','Ana María Machado','B','C.R.E');
CALL spu_books_register('03','7','01','Un marido para mamá','Christine Nostlinger','B','C.R.E');
CALL spu_books_register('03','7','01','Un muchacho que inventaba historias','Margaret mahy','B','C.R.E');
CALL spu_books_register('03','7','01','Experiencias sobre morir','John Hinton','R','C.R.E');
CALL spu_books_register('03','7','01','El gran enigma de los platillos volantes','Antonio Ribera','M','C.R.E');
CALL spu_books_register('03','7','01','La Ilíada','Homero','R','C.R.E');
CALL spu_books_register('03','7','03','Raimondi y llona','Teresa María Llonba','R','C.R.E');
CALL spu_books_register('03','7','01','Itinerarios de Lima','Héctor velarde','R','C.R.E');
CALL spu_books_register('03','7','01','El mercader y marqués','Bernard Lavalle','R','C.R.E');
CALL spu_books_register('03','7','01','Madre, e hijo cruzando el río','Erneto Zierer','R','C.R.E');
CALL spu_books_register('03','7','01','Puñales escondidos','Pilar Dughi','B','C.R.E');
CALL spu_books_register('03','7','01','Ultimo capitulo','Irma de águila','R','C.R.E');
CALL spu_books_register('03','7','01','El zorro y la luna','José Antonio Mazzotti','R','C.R.E');

CALL spu_books_register('03','7','05','Relatos selectos','Antología Didáctica','R','C.R.E');
CALL spu_books_register('03','7','01','Puruchuco','Arturo jiménez borja','R','C.R.E');
CALL spu_books_register('03','7','01','La embestida del carnero y otro cuentos','Teodoro Garcés','R','C.R.E');
CALL spu_books_register('03','7','01','Comas y su historia','Santiago Tucumán Bonifacio','R','C.R.E');
CALL spu_books_register('03','7','03','El general en su laberinto','Gabriel García Márquez','R','C.R.E');
CALL spu_books_register('03','7','01','Siempre hay camino','Ciro Alegría','R','C.R.E');
CALL spu_books_register('03','7','01','Pasión por Vallejo','J, Castañon','R','C.R.E');
CALL spu_books_register('03','7','01','Llanto sagrado de la América meridional','Fray Francisco Romero','R','C.R.E');
CALL spu_books_register('03','7','01','Biografía de Martín Adán','José Antonio Bravo','R','C.R.E');
CALL spu_books_register('03','7','01','Alicia en el País de las maravillas','Lewis Carroll','R','C.R.E');
CALL spu_books_register('03','7','01','El faro del fin del mundo','Julio Verne','R','C.R.E');
CALL spu_books_register('03','7','01','El fantasma de caterville y otro cuentos','Oscar Wide','R','C.R.E');
CALL spu_books_register('03','7','01','El escarabajo, los crímenes de la calle morgue','Edgar Allan Poe','R','C.R.E');
CALL spu_books_register('03','7','01','Poesía Indiana','José Luis Millones','R','C.R.E');
CALL spu_books_register('03','7','01','Cesar Vallejo','Ricardo Gonzales Vigil','R','C.R.E');
CALL spu_books_register('03','7','01','Mateo Puamaccahua, cacique de chinchero','Luz peralta, Miguel pinto','R','C.R.E');
CALL spu_books_register('03','7','01','La poética de la poesía póstuma de Vallejo','Carlos Henderson','R','C.R.E');
CALL spu_books_register('03','7','02','Ángeles apócrifos en la América virreinal','Ramón mujica padilla','B','C.R.E');
CALL spu_books_register('03','7','02','Pensamiento y Acción','Ramón Remolina','B','C.R.E');
CALL spu_books_register('03','7','01','Ayacucho, tradiciones peruanas de ricardo palma','Tomas Santillana Cantella','B','C.R.E');













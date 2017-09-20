CREATE DEFINER=`root`@`localhost` PROCEDURE `user_register`(IN `i_email` VARCHAR(255), IN `i_pass` VARCHAR(255), IN `i_username` VARCHAR(255))
BEGIN

DECLARE provera INT;
DECLARE jaka_lozinka VARCHAR(255);
DECLARE super_lozinka VARCHAR(255);

SELECT COUNT(user_id) FROM users WHERE email = i_email INTO provera;

IF provera > 0 THEN
	SELECT 'Vec postoji korisnik sa unetim emailom!' as 'ODGOVOR';
ELSE
    SET jaka_lozinka = concat(i_pass, '9:3785G11i|Cn2u');
	SET super_lozinka = PASSWORD(jaka_lozinka);
	INSERT INTO users VALUES (null, i_email, super_lozinka, i_username, 0);
    SELECT 'Uspesna registracija!' as 'ODGOVOR';
END IF;

END
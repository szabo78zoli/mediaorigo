Telepítés lépései:

Az adatbázis táblák létrehozhatóak migrációval is a már korábban létrehozott üres adatbásisban, a: my_domain/index.php/migrate url meghívásával.

Ebben az esetben egy teljesen üres adattáblákkal teli adatbásist kapunk.
Itt a mediaorigo_type_of_cars és a mediaorigo_driving_license táblákat manuálisan kell feltölteni.

Másik módszer, ha a repóban található mediaorigo.sql file insertálásának segítségével hozzuk létre az adattáblákat, a már előre létrehozott adatbásisba. Ebben az esetben az adatbázi adatokat is tartalmaz.

Az application/config/database.php file-ban van lehetőség az adatbázis eléréshez szükséges paraméterek megadására.

A site a mydomain/index.php/home oldallal indu, ahol ugyan csakegy menü van, de innen minden funkció elérhető.

A domain az application/config/config.php file-ban állítható be a 26. sorban:

$config['base_url'] = 'http://dev.mediaorigo.hu';

Ezek után az oldal elérhetővé válik.

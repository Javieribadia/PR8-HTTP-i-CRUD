# PR8 Mètodes HTTP i CRUD en una aplicació PHP

## CREATE
	Indicarem amb els parametres id el nom del fitxer i amb name el contingut
		curl --REQUEST PUT --DATA "id=3&name=fulano" http://localhost/M8UF1/PR8/crud.php
## READ
	Per llegir podem fer-ho amb dos mètodes.
		*A partir de id (retornara el contingut del fitxer)
			curl --REQUEST GET http://localhost/M8UF1/PR8/crud.php?id=1
		*Sense parametres (retornara tots els ditxers .txt del directori)
			curl --REQUEST GET http://localhost/M8UF1/PR8/crud.php

## UPDATE
	Amb l'update indicarem el id del fitxer i el contingut que tindre
		curl --REQUEST POST --DATA "id=3&name=fulano" http://localhost/M8UF1/PR8/crud.php
	
## DELETE
	Indiquem el id del fitxer a borrar
		curl --REQUEST DELETE --DATA "id=3" http://localhost/M8UF1/PR8/crud.php
	
	


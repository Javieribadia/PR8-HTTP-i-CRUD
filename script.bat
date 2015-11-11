curl --REQUEST GET http://localhost/M8UF1/PR8/crud.php?id=1
::El fitxer no existeix
curl --REQUEST PUT --DATA "id=1&name=robert" http://localhost/M8UF1/PR8/crud.php
::Fitxer creat
curl --REQUEST GET http://localhost/M8UF1/PR8/crud.php?id=1
::id: 1
::name: robert
curl --REQUEST PUT --DATA "id=2&name=fulano" http://localhost/M8UF1/PR8/crud.php
::Fitxer creat
curl --REQUEST GET http://localhost/M8UF1/PR8/crud.php
::1.txt 2.txt
curl --REQUEST DELETE --DATA "id=1" http://localhost/M8UF1/PR8/crud.php
::Fitxer eliminat
curl --REQUEST GET http://localhost/M8UF1/PR8/crud.php
:2.txt
curl --REQUEST POST --DATA "id=2&name=zutano" http://localhost/M8UF1/PR8/crud.php
:Fitxer acutalitzat
curl --REQUEST GET http://localhost/M8UF1/PR8/crud.php?id=2
::id: 2
::name: zutano
pause
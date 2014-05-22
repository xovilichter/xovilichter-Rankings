# Xovilichter Rankings Archiv 1.1

Dieses Projekt speichert zu Archivzwecken die Xovi & Dynapso Ranking Auswertung als Tabulator getrennte Datei. Als Basis dienen der [Xovi](https://github.com/xovilichter/xovi) und [Dynapso](https://github.com/xovilichter/dynapso) Scraper sowie die freie JSON Datei von aus.gerech.net.

# Installation

* Repository herunterladen
* Aktuelle [Xovi](https://github.com/xovilichter/xovi) und [Dynapso](https://github.com/xovilichter/dynapso) Funktion in den "include" Ordner laden
* Ggf. Schreibrechte für die Ordner archive/xovi & archive/dynapso setzen
* Cronjob einrichten oder Dateien manuell aufrufen

```no-highlight
crontab -e
*/30     *      *     *    *    php /var/www/code/archive/save_xovi_rankings.php
*/30     *      *     *    *    php /var/www/code/archive/save_dynapso.php
*/30     *      *     *    *    php /var/www/code/archive/save_aus.gerech.net.php
```

# Dynapso Ausgabe

```no-highlight
last_update:0000-00-00 00:00
position	url	type	google_plus_name	google_plus_short_url
1	http://www.xovi.de/xovilichter/	organic		
2	http://www.habbo.cx/xovilichter	organic		
3	http://www.dynapso.de/xovilichter/	organic	Nicolas Sacotte	http://dynap.so/21C
4	http://ronny-marx.de/xovilichter/	organic	Ronny Marx	http://dynap.so/9M4
4	http://www.stock-world.de/nachrichten/ausland/DGAP-News-OMSAG-nutzt-Xovilichter-SEO-Contest-als-Ideenplattform-fuer-eigenen-Fortschritt-deutsch-n5721349.html	news		
5	http://aus.gerech.net/xovilichter/	organic	Ingo Henze	http://dynap.so/y
```

# Xovi Ausgabe

```no-highlight
last_update:0000-00-00 00:00
position	url
1	http://www.xovi.de/xovilichter/
2	http://www.habbo.cx/xovilichter
3	http://www.dynapso.de/xovilichter/
4	http://ronny-marx.de/xovilichter/
5	http://www.xovilichter-smx.de/
```

# aus.gerech.net Ausgabe

```no-highlight
last_update:2014-05-22 03:00
position	url	type	google_plus_name
1	http://www.xovi.de/xovilichter/	txt	
2	http://www.habbo.cx/xovilichter	txt	
3	http://www.dynapso.de/xovilichter/	txt	Nicolas Sacotte
4	http://ronny-marx.de/xovilichter/	txt	Ronny Marx
5	http://www.xovilichter-smx.de/	txt	
```

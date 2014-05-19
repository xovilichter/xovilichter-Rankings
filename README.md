# Xovilichter Rankings Archiv

Dieses Projekt speichert zu Archivzwecken die Xovi & Dynapso Ranking Auswertung als Tabulator getrennte Datei. Als Basis dienen der [Xovi](https://github.com/xovilichter/xovi) und [Dynapso](https://github.com/xovilichter/dynapso) Scraper 

# Installation

* PHP Dateien herunterladen
* Ggf. Schreibrechte für die Ordner xovi & dynapso setzen
* Cronjob einrichten oder Dateien manuell aufrufen

	crontab -e
	*/30     *      *     *    *    php /var/www/code/archive/save_xovi_rankings.php
	*/30     *      *     *    *    php /var/www/code/archive/save_dynapso.php
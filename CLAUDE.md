# delete-commenters-data-on-approval

## Zweck

PHP-Snippet für WordPress. Löscht beim manuellen Freigeben eines Kommentars im Backend die IP-Adresse, den Browser-User-Agent und (bei Gastkommentatoren) die E-Mail-Adresse aus der Datenbank – zum Schutz der Privatsphäre der Kommentatoren.

## Verwendete Technologien

- PHP
- WordPress

## Wichtige Dateien

- `delete_commenters_data_on_approval.php` – Haupt-Snippet

## Einbindung

**Möglichkeit a)** Code in die `functions.php` des aktiven Themes kopieren.

**Möglichkeit b)** Datei als „Must Use"-Plugin in `wp-content/mu-plugins/` ablegen (Ordner ggf. anlegen).

## Hinweis

Funktioniert nur, wenn Kommentare manuell im WordPress-Backend freigegeben werden (nicht bei automatischer Freigabe).

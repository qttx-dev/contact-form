# 📧 Kontaktformular

Ein einfaches und effektives Kontaktformular, das es Benutzern ermöglicht, Nachrichten zu senden und Dateien anzuhängen.

## 🌟 Übersicht

Dieses PHP-Script ermöglicht es Benutzern, über ein benutzerfreundliches Kontaktformular Nachrichten zu senden. Es unterstützt das Hochladen mehrerer Dateien und bietet eine einfache Möglichkeit, mit den Website-Betreibern in Kontakt zu treten.

## 🚀 Funktionen

- 📬 **Nachrichtensendung**: Benutzer können Nachrichten an die angegebene E-Mail-Adresse senden.
- 📁 **Datei-Uploads**: Unterstützt das Hochladen mehrerer Dateien mit verschiedenen Formaten.
- ✅ **Eingabevalidierung**: Überprüft die Eingaben des Benutzers, um sicherzustellen, dass alle erforderlichen Felder ausgefüllt sind.
- ⚠️ **Fehlerbehandlung**: Informiert den Benutzer über ungültige Eingaben oder Probleme beim Senden der Nachricht.
- 🎨 **Benutzerfreundliches Design**: Ein ansprechendes und responsives Design für eine optimale Benutzererfahrung.

## 📋 Voraussetzungen

- 🖥️ PHP 7.0 oder höher
- 📦 Composer (für die Installation von PHPMailer)
- 📨 SMTP-Server für den E-Mail-Versand

## 🛠️ Installation

1. Klonen Sie dieses Repository oder laden Sie die Dateien herunter.
2. Führen Sie `composer require phpmailer/phpmailer` aus, um PHPMailer zu installieren.
3. Passen Sie die Einstellungen in der `mail.php`-Datei an.

## ⚙️ Konfiguration

Bearbeiten Sie die `mail.php`, um folgende Einstellungen anzupassen:

```php
$mailserver = 'mail.server.de';
$username = 'max@muster.de';
$password = 'password';
$mailport = 465;
$from_mail = 'max@muster.de';
$from_name = 'Absendername';
$to_mail = 'max@muster.de';
```

### 🔗 SMTP-Server-Einstellungen

- **`$mailserver`**: Geben Sie den SMTP-Server an.
- **`$username`**: Geben Sie die E-Mail-Adresse für die Authentifizierung an.
- **`$password`**: Geben Sie das Passwort für die E-Mail-Adresse an.
- **`$mailport`**: Geben Sie den Port für den SMTP-Server an (üblicherweise 465 für SSL).
- **`$from_mail`**: Die Absender-E-Mail-Adresse.
- **`$from_name`**: Der Name, der als Absender angezeigt wird.
- **`$to_mail`**: Die E-Mail-Adresse des Empfängers.

## 🚀 Verwendung

Um das Kontaktformular zu verwenden, laden Sie die Dateien auf Ihren Webserver hoch und stellen Sie sicher, dass die `mail.php`-Datei korrekt konfiguriert ist. Benutzer können das Formular ausfüllen und Nachrichten senden.

## ⚠️ Sicherheitshinweis

Stellen Sie sicher, dass Sie keine sensiblen Informationen in der `mail.php`-Datei veröffentlichen. Verwenden Sie Umgebungsvariablen oder andere Methoden zur sicheren Speicherung von Zugangsdaten.

## 🆘 Unterstützung

Bei Problemen, Fragen oder Beiträgen öffnen Sie bitte ein Issue in diesem GitHub-Repository.

## 📄 Lizenz

Dieses Projekt steht unter der MIT-Lizenz. Weitere Details finden Sie in der [LICENSE](LICENSE) Datei.
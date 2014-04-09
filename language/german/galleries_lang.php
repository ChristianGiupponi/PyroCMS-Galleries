<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 * @author      Marco Grüter - Healthworld (Schweiz) AG
 * @link 	    http://www.healthworld.ch
 * @package 	PyroCMS
 * @subpackage  Galleries
 * @category	module
 */

//Sections 
$lang['galleries:shortcuts:galleries'] 	= "Galerien";
$lang['galleries:shortcuts:categories'] = "Kategorien";

//Shortcuts
$lang['galleries:shortcuts:categories:create']  = "Kategorie erstellen";
$lang['galleries:shortcuts:create']				= "Galerie erstellen";

//Stream
$lang['galleries:streams:galleries:name'] 			= "Galerien";
$lang['galleries:streams:galleries:description'] 	= "Foto-Galerien erstellen und verwalten.";
$lang['galleries:streams:categories:name'] 			= "Kategorien";
$lang['galleries:streams:categories:description'] 	= "Kategorien für das Galerie-Modul erstellen und verwalten.";

//Folder
$lang['galleries:folder:name'] = "Galerien Ordner";

//Install - Fields
$lang['galleries:fields:name'] 				= "Name";
$lang['galleries:fields:slug'] 				= "Slug";
$lang['galleries:fields:description'] 		= "Beschreibung";
$lang['galleries:fields:category'] 			= "Kategorie";
$lang['galleries:fields:enable_comments'] 	= "Kommentare";
$lang['galleries:fields:published']			= "Veröffentlichen";
$lang['galleries:fields:folder']			= "Ordner";
$lang['galleries:fields:cover']				= "Cover";
$lang['galleries:fields:intro']				= "Einführung";
$lang['galleries:fields:seo_title']			= "Titel";
$lang['galleries:fields:seo_keywords'] 		= "Keywörter";
$lang['galleries:fields:seo_description']	= "Beschreibung";

//Install - Fields - Instructions
$lang['galleries:fields:instr:name'] 			= "Galerie-Namen eingeben.";
$lang['galleries:fields:instr:slug'] 			= "Link zur Galerie. Wird automatisch erstellt.";
$lang['galleries:fields:instr:description'] 	= "Ausführliche Galerie-Beschreibung.";
$lang['galleries:fields:instr:category'] 		= "Kategorie wählen.";
$lang['galleries:fields:instr:enable_comments'] = "Möchten Sie Kommentare aktivieren?";
$lang['galleries:fields:instr:folder']			= "Von welchem Ordner möchten Sie die Bilder einfügen?";
$lang['galleries:fields:instr:published']		= "Möchten Sie die Galerie veröffentlichen?";
$lang['galleries:fields:instr:intro']			= "Kurze Einführung zur Galerie.";
$lang['galleries:fields:instr:seo_title']		= "Geben Sie den SEO Titel ein.";
$lang['galleries:fields:instr:seo_keywords']	= "Fügen Sie SEO Keywörter ein.";
$lang['galleries:fields:instr:seo_description']	= "Fügen SIe eine SEO Beschreibung ein.";
$lang['galleries:fields:instr:cover']			= "Deckblatt-Bild auswählen.";


//Install - Fields - Categories
$lang['galleries:categories:fields:name'] = "Name";
$lang['galleries:categories:fields:slug'] = "Slug";

//Install - Fields - Categories - Instructions
$lang['galleries:categories:fields:instr:name'] = "Geben Sie einen Namen für die Kategorie ein.";
$lang['galleries:categories:fields:instr:slug'] = "Link zur Galerie. Wird automatisch erstellt.";


//Categories - Session
$lang['galleries:categories:new:success'] 		= "Die Kategorie wurde erfolgreich erstellt.";
$lang['galleries:categories:new:failure'] 		= "Während der Erstellung der Kategorie ist ein Fehler aufgetreten.";
$lang['galleries:categories:new:title'] 		= "Neue Kategorie";
$lang['galleries:categories:edit:success'] 		= "Die Kategorie wurde erfolgreich bearbeitet.";
$lang['galleries:categories:edit:failure'] 		= "Während der Bearbeitung der Kategorie ist ein Fehler aufgetreten.";
$lang['galleries:categories:edit:title'] 		= "Kategorie bearbeiten";
$lang['galleries:categories:delete:failure'] 	= "Während dem Löschvorgang der Kategorie '%s' und den %d verbundenen Galerien ist ein Fehler aufgetreten.";
$lang['galleries:categories:delete:success'] 	= "Die Kategorie '%s' und die %d verbundenen Galerien wurden gelöscht.";

//Galleries - Session
$lang['galleries:new:success'] 		= "Die Galerie wurde erstellt.";
$lang['galleries:new:failure'] 		= "Während der Erstellung der Galerie ist ein Fehler aufgetreten.";
$lang['galleries:new:title'] 		= "Neue Galerie";
$lang['galleries:edit:success'] 	= "Die Galerie wurde erfolgreich bearbeitet.";
$lang['galleries:edit:failure'] 	= "Während der Bearbeitung der Galerie ist ein Fehler aufgetreten.";
$lang['galleries:edit:title'] 		= "Galerie bearbeiten";
$lang['galleries:delete:failure'] 	= "Während dem Löschvorgang der Galerie '%s' ist ein Fehler aufgetreten.";
$lang['galleries:delete:success'] 	= "Die Galerie '%s' wurde gelöscht.";


//Categories - View - Index
$lang['galleries:view:categories:index:title']	 = "Kategorie Liste";
$lang['galleries:view:categories:index:no_data'] = "Es gibt keine Kategorien. <a href=\"admin/galleries/categories/create\">Erstellen Sie eine</a>.";

//Galleries - View - Index
$lang['galleries:view:index:title']	 = "Galerie Liste";
$lang['galleries:view:index:no_data'] = "Es gibt keine Galerien. <a href=\"admin/galleries/create\">Erstellen Sie eine</a>.";


//Categories - View - Confirm
$lang['galleries:view:categories:confirm:title'] 	= "Achtung!";
$lang['galleries:view:categories:confirm:text'] 	= "Es gibt <b>'%s'</b> Galerien, die mit der Kategorie <b>'%s'</b> verbunden sind. Sind sie sicher, dass Sie fortfahren möchten? Alle verbundenen Galerien werden gelöscht!<br><br>";

//Delete message
$lang['galleries:view:categories:index:delete:popup'] = "Sind Sie sicher, dass Sie diese Kategorie löschen möchten? Das kann nicht rückgängig gemacht werden.";
$lang['galleries:view:index:delete:popup'] = "Sind Sie sicher, dass Sie diese Galerie löschen möchten? Das kann nicht rückgängig gemacht werden.";

//Error messages
$lang['galleries:error:no_numeric'] = "Nicht-numerische ID";

//Tabs
$lang['galleries:tabs:general'] = "Allgemein";
$lang['galleries:tabs:text'] = "Text";
$lang['galleries:tabs:extra'] = "Optionen";
$lang['galleries:tabs:seo'] = "SEO";

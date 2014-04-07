<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 * @author      Christian Giupponi STILOGO
 * @link		http://www.stilogo.it
 * @package 	PyroCMS
 * @subpackage  Galleries
 * @category	module
 */

//Sections 
$lang['galleries:shortcuts:galleries'] 	= "Gallerie";
$lang['galleries:shortcuts:categories'] = "Categorie";

//Shortcuts
$lang['galleries:shortcuts:categories:create']  = "Crea Categoria";
$lang['galleries:shortcuts:create']				= "Crea Galleria";

//Stream
$lang['galleries:streams:galleries:name'] 			= "Gallerie";
$lang['galleries:streams:galleries:description'] 	= "Modulo per la creazione e gestione di Gallerie fotografiche.";
$lang['galleries:streams:categories:name'] 			= "Categorie";
$lang['galleries:streams:categories:description'] 	= "Gestione della categorie per il modulo Gallerie";

//Folder
$lang['galleries:folder:name'] = "Cartelle Gallerie";

//Install - Fields
$lang['galleries:fields:name'] 				= "Nome";
$lang['galleries:fields:slug'] 				= "Slug";
$lang['galleries:fields:description'] 		= "Descrizione";
$lang['galleries:fields:category'] 			= "Categoria";
$lang['galleries:fields:enable_comments'] 	= "Commenti";
$lang['galleries:fields:published']			= "Pubblicazione";
$lang['galleries:fields:folder']			= "Cartella";
$lang['galleries:fields:cover']				= "Copertina";
$lang['galleries:fields:intro']				= "Introduzione";
$lang['galleries:fields:seo_title']			= "Titolo";
$lang['galleries:fields:seo_keywords'] 		= "Keywords";
$lang['galleries:fields:seo_description']	= "Descrizione.";

//Install - Fields - Instructions
$lang['galleries:fields:instr:name'] 			= "Indica il nome della galleria.";
$lang['galleries:fields:instr:slug'] 			= "Campo automatico.";
$lang['galleries:fields:instr:description'] 	= "Descrizione completa della galleria";
$lang['galleries:fields:instr:category'] 		= "Indica la categoria di appartenenza.";
$lang['galleries:fields:instr:enable_comments'] = "Vuoi consentire agli utenti di commentare la galleria?";
$lang['galleries:fields:instr:folder']			= "Da quale cartella vuoi recuperare le immagini?";
$lang['galleries:fields:instr:published']		= "Vuoi pubblicare questa galleria?";
$lang['galleries:fields:instr:intro']			= "Breve introduzione alla galleria.";
$lang['galleries:fields:instr:seo_title']		= "Indica il titolo per il SEO.";
$lang['galleries:fields:instr:seo_keywords']	= "Inserisci le parole chiave per il SEO.";
$lang['galleries:fields:instr:seo_description']	= "Inserisci la descrizione per il SEO.";
$lang['galleries:fields:instr:cover']			= "Scegli l'immagine di copertina.";


//Install - Fields - Categories
$lang['galleries:categories:fields:name'] = "Nome";
$lang['galleries:categories:fields:slug'] = "Slug";

//Install - Fields - Categories - Instructions
$lang['galleries:categories:fields:instr:name'] = "Indica il nome della Categoria.";
$lang['galleries:categories:fields:instr:slug'] = "Campo automatico.";


//Categories - Session
$lang['galleries:categories:new:success'] 		= "Categoria creata con successo.";
$lang['galleries:categories:new:failure'] 		= "Non e' stato possibile creare la Categoria.";
$lang['galleries:categories:new:title'] 		= "Nuova categoria";
$lang['galleries:categories:edit:success'] 		= "Categoria modificata con successo.";
$lang['galleries:categories:edit:failure'] 		= "Non e' stato possibile modificare la Categoria.";
$lang['galleries:categories:edit:title'] 		= "Modifica categoria";
$lang['galleries:categories:delete:failure'] 	= "Non e' stato possibile cancellare la Categoria '%s' e le %d Gallerie associate.";
$lang['galleries:categories:delete:success'] 	= "La Categoria '%s' e le %d Gallerie associate sono state cancellate.";

//Galleries - Session
$lang['galleries:new:success'] 		= "Galleria creata con successo.";
$lang['galleries:new:failure'] 		= "Non e' stato possibile creare la Galleria.";
$lang['galleries:new:title'] 		= "Nuova Galleria";
$lang['galleries:edit:success'] 	= "Galleria modificata con successo.";
$lang['galleries:edit:failure'] 	= "Non e' stato possibile modificare la Galleria.";
$lang['galleries:edit:title'] 		= "Modifica Galleria";
$lang['galleries:delete:failure'] 	= "Non e' stato possibile cancellare la Galleria '%s'";
$lang['galleries:delete:success'] 	= "La Galleria '%s' e' stata cancellata.";


//Categories - View - Index
$lang['galleries:view:categories:index:title']	 = "Elenco categorie";
$lang['galleries:view:categories:index:no_data'] = "Non ci sono ancora categorie. <a href=\"admin/galleries/categories/create\">Inseriscine</a> una.";

//Galleries - View - Index
$lang['galleries:view:index:title']	 = "Elenco Gallerie";
$lang['galleries:view:index:no_data'] = "Non ci sono ancora Gallerie. <a href=\"admin/galleries/create\">Inseriscine</a> una.";
$lang['galleries:view:index:copertina'] = "Copertina";


//Categories - View - Confirm
$lang['galleries:view:categories:confirm:title'] 	= "Attenzione!";
$lang['galleries:view:categories:confirm:text'] 	= "Ci sono <b>'%s'</b> Gallerie associate a alla Categoria <b>'%s'</b>, sei sicuro di voler procedere? Se Procedi verranno cancellate tutte le Gallerie associate!<br><br>";

//Delete message
$lang['galleries:view:categories:index:delete:popup'] = "Sei sicuro di voler cancellare la categoria? Questa operazione non pu˜ essere annullata.";
$lang['galleries:view:index:delete:popup'] = "Sei sicuro di voler cancellare questa Galleria? L'operazione non pu˜ essere annullata.";

//Error messages
$lang['galleries:error:no_numeric'] = "ID non numerico";

//Tabs
$lang['galleries:tabs:general'] = "Generale";
$lang['galleries:tabs:text'] = "Testi";
$lang['galleries:tabs:extra'] = "Extra";
$lang['galleries:tabs:seo'] = "SEO";
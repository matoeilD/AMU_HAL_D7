# AMU_HAL_D7
module drupal 7 d'interfacage avec l'archive ouverte HAL pour l'affichage de publications  sous forme de blocs multiinstanciables et multiconfigurables

Fonctionnalités
• Collecte des publications selon l'identifiant de collection ou de structure,
• Collecte d'une liste finie de documents précis (liste de docIds)
• Collecte de publications depuis des forme-auteurs ou un idHal de chercheur
• Affichage des publications significatives pour un labo ou un utilisateur d'après une liste de docIDs
• Tri des publications
• Filtres par type de document (docType)
• Sélection possible des champs à afficher
• Choix du mode d'affichage.

Ajouter un nouveau bloc HAL
• Chaque bloc HAL représentant une "instance", il s'agit d'ajouter une nouvelle instance pour chaque nouveau
bloc HAL en allant dans Structure > Blocs > Instances > Add instance
• Donner un titre à l'instance dans "instance title" et choisissez Publications HAL dans la liste déroulante "Bloc
type". Enregistrez.
• Configurez votre bloc en allant dans Structure – Blocs


Publications significatives
• Pour afficher les publications significatives d’une structure ou collection, sélectionnez la méthode d’importation
Liste de publications déterminées
• Listez les docIds dans le champ Publications significatives
• Pour trouver un docid d'après un hal_id (identifiant visible du document dans HAL au format hal-0000000 :
Rendez vous sur https://api.archives-ouvertes.fr/search/?wt=xml&q=halId_s: ʺhal-00455477ʺ
Collez votre hal_id à la fin de l'URL, entre "" après halId_s:, en enlevant le numéro de version. Si par exemple l'HAL_id
est hal-00455477v2, ne collez que hal-00455477. Le doc_id apparaît dans la notice


Choix du type de documents
• Si vous choisissez d’afficher les publications par structure ou par collection, vous pouvez ajouter un filtre par type de
publication, par exemple pour dissocier les articles, les ouvrages, les thèses etc.
• La liste des types de publications est la suivante :
Identifiant HAL du champ Champ correspondant
ART Article dans une revue
COMM Communication dans un congrès
POSTER Poster
OUV Ouvrage
COUV Chapitre d’ouvrage
DOUV Direction d’ouvrage
PATENT Brevet
OTHER Autre publication
UNDEFINED Prépublication, doc de travail
REPORT Rapport
THESE Thèse
HDR HDR
MEM Mémoire d’étudiant
LECTURE COurs
IMG Image
VIDEO Vidéo
SON Son
Identifiant HAL du champ Champ correspondant
MAP Carte
MINUTES Compte rendu de table ronde
NOTE Note de lecture
SYNTHESE Notes de synthèse
PRESCONF Document associé à des manifestation scientifiques
OTHERREPORT Autre rapport, séminaire, workshop
REPACT Rapport d’activité

Publications par auteur
• Dans une fiche auteur.e, renseignez l’idHAL, les différentes formes auteur.e ou listez les publications
significatives. (voir paragraphe Publications significatives par auteur ci dessus)
• Lorsque l'option Publications par auteur est choisie dans un bloc HAL, chaque fiche auteur affiche ce bloc
listant ses publications soit en fonction de son idHAL s'il est renseigné, soit en fonction des différentes
formes auteurs si elles sont renseignées, soit, à défaut, en fonction d'un nom généré par le système d'après
les informations dont il dispose (couple nom-prénom). Si l'auteur renseigne une liste de publications
significatives, ce sont ces dernières qui s'affichent dans le bloc.

Publications par auteur – l’idHAL
• Nous encourageons vivement les auteur.e.s à créer leur idHAL, seule solution leur garantissant l'affichage
correct de leurs publications. L’idHAL sera renseigné dans sa forme numérique. Pour retrouver cet
identifiant, vous pouvez vous connecter à aurehal et faire une recherche par auteur. L’idHAL apparaît dans la
colonne idHAL

Publications significatives par auteur
• Pour afficher les publications significatives des auteur.e.s, sélectionnez la méthode d’importation Publications par
auteur.e.s
• La liste des publications significatives de l’auteur.e doivent être renseignées par l’auteur.e dans sa fiche auteur.e
• Pour positionner le bloc sur toutes les fiches auteur.e.s, renseignez users/* dans la partie Visibility settings
• Pour positionner le bloc sur des fiches en particulier, listez les alias des personnes, un par ligne


Publications d’une structure / collection
• L'identifiant de la collection est le HAL halId_s. Ce champ prévaut sur la champ Structure. Si ce champ est renseigné,
l'identifiant HAL de la structure ne sera pas considéré. L’identifiant de la collection peut être retrouvé sur https://halamu.
archives-ouvertes.fr/page/les-collections-des-laboratoires-damu
• L'identifiant de la structure est le HAL structId_i. Il est au format numérique. Si le champ identifiant de la collection, est
renseigné, l'identifiant HAL de la structure ne sera pas considéré. L’identifiant de structure peut être retrouvé sur
aurehal.archives-ouvertes.fr



Choix des champs à afficher
• Pour chaque bloc de publications vous pouvez décider des champs à afficher
• La liste des champs disponibles est la suivante
Identifiant HAL du champ Champ correspondant
title_s Titre
en_title_s Titre anglais
docid
Identifiant unique interne du
document
label_s
Référence bibliographique du
document
en_label_s
Référence bibliographique du
document en anglais
docType_s Type de document
authIdHal_s Auteur
halId_s Identifiant HAL du dépôt
structId_i Identifiant de la structure
uri_s URI
keyword_s Mots-clés
en_keyword_s Mots-clés en anglais
authLastNameFirstName_s Auteur : Nom de famille, Prénom
journalTitle_s Revue : Titre
abstract_s Résumé
en_abstract_s Résumé en anglais

Attention, les champ halId_s, docid et label_s sont obligatoires.

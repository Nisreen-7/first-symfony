# Premier exo twig syntaxe de base


	
Dans le FirstController, créer une nouvelle Route sur "/exo-twig", créer également un nouveau template exo-twig.html.twig et en faire un render
	
Dans le render, ajouter une variable "names" à laquelle vous associerait un tableau de noms (par exemple ["Nom 1", "Nom 2", "Nom 3"] )
	
Côté template twig, utiliser cette variable names pour faire une boucle et afficher chaque nom dans un paragraphe
	
Rajouter un if dans le template pour faire en sorte d'afficher un message seulement si le tableau names contient plus de 3 noms


## Exo support de cours Symfony :


	
Créer une entité Course dans le dossier src/Entity avec ses propriétés et getters/setters
	
Récupérer le Database.php et le mettre dans le dossier Repository de ce projet
	
Faire un CourseRepository exactement comme on l'a déjà fait et pour le moment faire juste la méthode findAll et findById
	
Créer un nouveau contrôleur CourseController et dedans créer une route sur /courses, dans cette route, utiliser le CourseRepository pour récupérer la liste de tous les cours et l'exposer au template
	
Créer un template courses.html.twig et dedans faire une boucle pour afficher les cours avec bootstrap (de la manière que vous voulez, tant que sont affichés au moins le title et le subject du cours)
	
Dans le même contrôleur créer une nouvelle route sur /course/{id} et utiliser l'id en paramètre pour faire un findById et exposer ça au template
	
Faire un fichier single-course.html.twig dans lequel on affichera le cour qui a été récupéré
	
Modifier le courses.html.twig pour rajouter le lien et faire que quand on click sur un cours ça nous emmène vers sa page

# Petite aide pour le repository :
Si vous avez mis votre published en \DateTime dans votre entity Course, alors dans la boucle/le if où on fait le new Course, il faudra lui donner un new \DateTime($line["published"]) en argument sous peine d'erreur à l'exécution

## Bonus : Paginer le twig/contrôleur


## 20-6-2023
## Formuaire d'ajout de cours


	
Dans le CourseRepository, rajouter la méthode persist exactement sur le même modèle de ce qu'on a déjà fait
	
Dans le CourseController, créer une nouvelle route sur "/add-course" avec un template qui contiendra un formulaire avec 3 input (pour le title, le content et le subject)
	
Côté contrôleur, utiliser l'objet Request comme dans l'example pour récupérer les valeurs et faire une instance de Course à laquelle on assignera un new \DateTime() comme valeur de published puis faire persister l'instance en question
	
Il faudra faire un petit if dans le contrôleur pour ne lancer le persist et tout que si on a bien des valeurs dans notre formulaire

# Pour info, vous pouvez faire un $request->request->all() pour récupérer toutes les valeurs du formulaire sous forme de tableau associatif (dans mon exemple je pourrais faire $formData = $request->request->all(); et récupérer la valeur de mon input avec $formData['truc']  ) 

## Mise à jour d'un cours


	
Créer une nouvelle route sur "/update-course/{id}" qui va pour le moment faire exactement comme le "/course/{id}"
	
Dans le template de ce update-course, reprendre le formulaire du add, mais assigner dans les value de chaque input la valeur correspondante du course (par exemple <input name="bloup" value="{{course.bloup}}">)
	
Modifier le template single-course pour y ajouter un lien qui pointera sur le update-course
	
Dans le repository, créer une méthode update pour notre course
	
Dans la méthode du update-course, rajouter un peu tout ce qu'on a fait dans le add-course pour le traitement du formulaire, mais cette fois au lieu de faire un new Course on fait des setTitle/setContent/setSubject sur le course récupéré par le findById et ensuite on fait un update dessus (ou alors on fait pareil que dans le add et on rajoute juste l'id dans l'instance, ça fait plus ou moins pareil)

Bonus : Pour la route update et pour la route /course/{id} trouver un moyen de renvoyer une erreur 404 s'il n'y a pas de course à l'id entrée

##La suppression d'un cours


	
Créer une méthode delete dans le repository (par son id, exactement comme on a déjà fait, juste le nom de la table qui change)
	
Créer une nouvelle route dans le CourseController sur /remove-course/{id} qui va récupérer l'id, déclencher la méthode delete puis faire une redirection vers la route /course ensuite.
	
Dans le template du single-course, rajouter un nouveau lien vers /remove-course avec l'id du course en question
	
c'est tout (pour de vrai cette fois)
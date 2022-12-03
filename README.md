# Énoncé
## TP1

- Avoir une view pour gérer les erreurs http 404. (Pas besoin de la traduire)
- Avoir une view pour gérer les erreurs http 500. (Pas besoin de la traduire)
- Avoir une entrée de type "debug" dans le log pour chaque route exécutée. On veut le message "Route <url> demandée". (voir Logging - Laravel - The PHP Framework For Web Artisans)
- Ajouter un test d'intégration (Feature) pour chacune des routes qui test: Le status http (200, 302, ...) et qui valide chaque variables passées aux vues
- Ajouter une route "/{lang}/erreur" qui lance un exception de votre choix.
- Ajouter un gestionnaire d'erreur qui capte votre exception et qui retourne une "response" ou une vue.
- Vous devez utilisée le système component de Blade pour faire votre interface.
- Pour la route equipe, vous devez créer une classe Modèle Equipe, pour représenter un membre de l'équipe, qui implémente les méthodes suivantes:
1. findAll() (retourne un tableau d'instance de classe Equipe)
2. findOne($id) (retourne une instance de classe Equipe en fonction de l'id)
3. findRandom() (retourne une instance de classe Equipe choisie au hasard).
---
- La classe Equipe doit avoir les propriété suivantes: id, nom, prenom, bio, poste.
- ­La route équipe doit présenter une liste des membres en affichant le nom et le poste uniquement.
- Faire une nouvelle route '/{lang}/equipe/{id}' qui va afficher toutes les propriétés d'un membre en particulier.
- Faire une classe de test unitaire (Unit) pour chaque méthode de la classe Equipe. On test au minimum les 3 méthodes: on a donc un minimum de 3 méthodes de test. 
- On veut aussi avoir l'information sur le modèle Équipe en format json. On va donc ajouter des routes dans le fichier api.php (supprimer la route existante du fichier).

**Routes :**
1. /api/{lang}/equipe : Retourne tous les membres dans un tableau json
2. /api/{lang}/equipe/{id} : Retourne les informations sur un membre en particulier en objet JSON.
3. /api/{lang}/equipe/random : Retourne la même chose que la route par id, mais retournant un modèle au hasard.
- Écrire des tests d'intégration (Feature) qui teste le status (200) des routes de l'api ainsi que les valeurs de retours (voir HTTP Tests - Laravel - The PHP Framework For Web Artisans)
const express = require("express");
const fs = require("fs");
const path = require("path");
const server = express();
const cors = require("cors");
const bodyParser = require("body-parser");
const port = 5003;
const mysql = require('mysql2');

server.use(cors());

class FoodList {
  static foodsList = new Map();

  constructor(title, type, image, ingredients, description, prix) {
    this.id = FoodList.getNextId();
    this.title = title;
    this.type = type;
    this.image = image;
    this.ingredients = ingredients;
    this.description = description;
    this.prix = prix;
    if (FoodList.foodsList.has(this.id)) {
      throw new Error("une recette avec cette ID existe déja.");
    }
    FoodList.foodsList.set(this.id, this);
  }
  static getNextId() {
    console.log(FoodList.foodsList.size + 1);
    return FoodList.foodsList.size + 1;
  }
}

server.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "public", "index.html"));
});

//Afficher tous les plats
server.get("/list-food", (req, res) => {
  fs.readFile("listOfFood.json", "utf8", (err, data) => {
    if (err) {
      console.error(err);
      console.log("le serveur n'a pas pu se connecter au fichier json");
      res.status(500).send("Erreur serveur");
      return;
    }
    const plats = JSON.parse(data).foodList;
    res.send(plats);
  });
});

//Afficher tous les plats par type
server.get("/list-food/:type", (req, res) => {
  const type = req.params.type;
  fs.readFile("listOfFood.json", "utf8", (err, data) => {
    if (err) {
      console.error(err);
      console.log(err);
      res.status(500).send("Erreur serveur");
      return;
    }
    const plats = JSON.parse(data).foodList;
    const platsByType = plats.filter((plat) => plat.type === type);
    if (platsByType.length === 0) {
      res.status(404).send("Aucun plat de ce type trouvé");
      return;
    }
    res.send(platsByType);
  });
});

//Afficher tous les plats par type
server.get("/list-food/n/:id", (req, res) => {
  const id = parseInt(req.params.id); // Convertir l'ID en nombre

  fs.readFile("listOfFood.json", "utf8", (err, data) => {
    // Gestion des erreurs si la lecture du fichier échoue
    if (err) {
      console.error(err);
      res.status(500).send("Erreur serveur");
      return;
    }

    // Parsing des données JSON à partir du fichier
    const plats = JSON.parse(data).foodList;

    // Recherche de l'élément alimentaire avec l'ID spécifié
    const platById = plats.find((plat) => plat.id === id);

    // Si l'élément alimentaire n'est pas trouvé, renvoyer une réponse 404
    if (!platById) {
      res.status(404).send("Aucun plat avec cet ID trouvé");
      return;
    }

    // Envoi de l'élément alimentaire trouvé en tant que réponse
    res.send(platById);
  });
});


const connection = mysql.createConnection({
  host: 'localhost',
  user: 'elpatio',
  password: 'mexicano1234*',
  database: 'elpatiomexicano'
});

server.get('/api/data/plats', (req, res) => {
  const sql = 'SELECT * FROM plats';
  connection.query(sql, (err, results) => {
    if (err) {
      res.status(500).json({ error: 'Database error' });
      return;
    }
    res.json(results);
  });
});
server.listen(port, () =>
  console.log(`Server lancé sur : http://localhost:${port}`)
);

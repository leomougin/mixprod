<?php
require 'db-config-bd.php';

/**
 * @var PDO $pdo
 */


function checkMailExists(string $mail)
{
    $pdo = getConnexion();
    $requete = $pdo->prepare('SELECT count(*)
            FROM `client`
            WHERE mail = :mail');
    $requete->bindValue(':mail', $mail);
    $requete->execute();
    $result = (int)$requete->fetchColumn();
    return $result;
}
function isValidMDP(string $mdp)
{
    return preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,14}$/', $mdp)  ;
}

function addProduitPanier(int $id_produit,int $id_client,$date_cmd,int $qte):void
{
    $pdo = getConnexion();
    $requete = $pdo->prepare(query: "INSERT INTO acheter (id_produit,id_client,date_commande,quantite) 
                        VALUES (?,?,?,?)");
    $requete->execute(array($id_produit,$id_client,$date_cmd,$qte));
}
function addClient($nom,$prenom,$adresse,$cp,$ville,$email,$pseudo,$mdpHash):void
{
    $pdo = getConnexion();
    $requete = $pdo->prepare(query: "INSERT INTO client (nom_client,prenom_client,adresse,cp,ville,mail,pseudo,mot_de_passe) 
                        VALUES (?,?,?,?,?,?,?,?)");
    $requete->execute(array($nom,$prenom,$adresse,$cp,$ville,$email,$pseudo,$mdpHash));
}

function getUser():array
{
     $pdo = getConnexion();
    $requete = $pdo->prepare(query: "SELECT * FROM client  ");
    $requete ->execute();
    return $requete->fetchAll(mode: PDO::FETCH_ASSOC);
}
function getProduit():array
{
    $pdo = getConnexion();
    $requete = $pdo->prepare(query: "SELECT * FROM produit  ");
    $requete ->execute();
    return $requete->fetchAll(mode: PDO::FETCH_ASSOC);
}

function getPseudoFromId(int $id_user):array
{
    $pdo = getConnexion();
    $requete = $pdo->prepare(query: "SELECT pseudo FROM client WHERE id_user LIKE '$id_user' ");
    $requete ->execute();
    return $requete->fetchAll(mode: PDO::FETCH_ASSOC);
}

function getIdFromPseudo( $pseudo):array
{
    $pdo = getConnexion();
    $requete = $pdo->prepare(query: "SELECT id_user FROM client WHERE pseudo LIKE '$pseudo' ");
    $requete ->execute();
    return $requete->fetchAll(mode: PDO::FETCH_ASSOC);
}
function getUserFromEmail($email):array
{
    $pdo = getConnexion();
    $requete = $pdo->prepare(query: "SELECT * FROM client WHERE mail LIKE '$email'");
    $requete ->execute();
    return $requete->fetchAll(mode: PDO::FETCH_ASSOC);
}






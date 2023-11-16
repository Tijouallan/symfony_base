<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class BurgerController extends AbstractController
{

    public $burgers = [
        ['id' => '1', 'name' => "Classic", 'description' => "Steak haché de boeuf, cheddar, emmental, bacon, cornichons, oignons grillés, sauce poivre et mayonnaise", 'price' => 10.99],
        ['id' => '2', 'name' => "Auvergnat", 'description' => "Steak haché de boeuf, fourme d'Ambert, cheddar, emmental, bacon, oignons grillés, cornichons, sauce poivre et mayonnaise", 'price' => 11.99],
        ['id' => '3', 'name' => "Végétarien", 'description' => "Galette de pomme de terre, cheddar, emmental, tomate, oignons grillés, salade, sauce moutarde et miel", 'price' => 9.99],
        ['id' => '4', 'name' => "Double", 'description' => "Deux steaks hachés de boeuf, cheddar, emmental, bacon, cornichons, oignons grillés, sauce poivre et mayonnaise", 'price' => 13.99],
        ['id' => '5', 'name' => "Poulet BBQ", 'description' => "Filet de poulet croustillant, cheddar, emmental, salade, tomate, oignons grillés, sauce barbecue", 'price' => 10.99]

    ];
    #[Route('/burgers', name: 'burgers')]
    public function home()
    {
        return $this->render('liste_burger.html.twig', [
            'burgers' => $this->burgers,
            'title' => 'Burgers',
        ]);
    }
    #[Route('/burgers/{id}', name: 'burger')]
    public function burger($id)
    {
        foreach ($this->burgers as $burger) {
            if ($burger['id'] === $id) {
                return $this->render("burger.html.twig", ['burger' => $burger]);
            }
        }
    }
}
